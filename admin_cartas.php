<?php
session_start();

// Solo el admin puede entrar
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: login.php');
    exit;
}

require_once('db.php');

$msg = '';

// ---- ELIMINAR ----
if (isset($_GET['eliminar'])) {
    $id = (int)$_GET['eliminar'];
    $conn->query("DELETE FROM platos WHERE id = $id");
    $msg = 'Plato eliminado correctamente.';
}

// ---- GUARDAR (nuevo o editar) ----
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {

    $nombre      = trim($_POST['nombre']);
    $precio      = (float)$_POST['precio'];
    $imagen      = trim($_POST['imagen']) ?: 'img/platos/default.jpg';
    $categoria   = (int)$_POST['categoria_id'];
    $activo      = isset($_POST['activo']) ? 1 : 0;
    $sucursales  = isset($_POST['sucursales']) ? $_POST['sucursales'] : [];

    if ($_POST['accion'] === 'nuevo') {
        $stmt = $conn->prepare("INSERT INTO platos (nombre, precio, imagen, categoria_id, activo) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sdsii", $nombre, $precio, $imagen, $categoria, $activo);
        $stmt->execute();
        $plato_id = $stmt->insert_id;
        $stmt->close();

        // Asignar sucursales
        foreach ($sucursales as $sid) {
            $sid = (int)$sid;
            $conn->query("INSERT IGNORE INTO plato_sucursal (plato_id, sucursal_id) VALUES ($plato_id, $sid)");
        }
        $msg = 'Plato creado correctamente.';

    } elseif ($_POST['accion'] === 'editar') {
        $id = (int)$_POST['plato_id'];
        $stmt = $conn->prepare("UPDATE platos SET nombre=?, precio=?, imagen=?, categoria_id=?, activo=? WHERE id=?");
        $stmt->bind_param("sdsiis", $nombre, $precio, $imagen, $categoria, $activo, $id);  // fixed: 6 params
        // Corrección de tipos: s d s i i i → 6 valores
        $stmt->close();

        // Re-hacer con tipos correctos
        $stmt = $conn->prepare("UPDATE platos SET nombre=?, precio=?, imagen=?, categoria_id=?, activo=? WHERE id=?");
        $stmt->bind_param("sdsiii", $nombre, $precio, $imagen, $categoria, $activo, $id);
        $stmt->execute();
        $stmt->close();

        // Actualizar sucursales: borrar y reinsertar
        $conn->query("DELETE FROM plato_sucursal WHERE plato_id = $id");
        foreach ($sucursales as $sid) {
            $sid = (int)$sid;
            $conn->query("INSERT INTO plato_sucursal (plato_id, sucursal_id) VALUES ($id, $sid)");
        }
        $msg = 'Plato actualizado correctamente.';
    }
}

// ---- Cargar datos para mostrar ----
$categorias = $conn->query("SELECT * FROM categorias ORDER BY id");
$sucursales = $conn->query("SELECT * FROM sucursales ORDER BY id");

// Platos con su categoría
$platos_res = $conn->query("
    SELECT p.*, c.nombre AS categoria_nombre
    FROM platos p
    JOIN categorias c ON c.id = p.categoria_id
    ORDER BY c.id, p.nombre
");

// Plato a editar (si viene ?editar=id)
$plato_editar = null;
$suc_del_plato = [];
if (isset($_GET['editar'])) {
    $id = (int)$_GET['editar'];
    $r  = $conn->query("SELECT * FROM platos WHERE id = $id");
    $plato_editar = $r->fetch_assoc();
    $r2 = $conn->query("SELECT sucursal_id FROM plato_sucursal WHERE plato_id = $id");
    while ($row = $r2->fetch_assoc()) $suc_del_plato[] = $row['sucursal_id'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estiloencabezado.css">
    <title>Admin - Cartas</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { background: #eeeeee; font-family: sans-serif; }

        .admin-wrap {
            max-width: 1100px;
            margin: 0 auto;
            padding: 180px 20px 80px;
        }

        .admin-titulo {
            color: #00336c;
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 1.5px;
            border-bottom: 3px solid #00336c;
            padding-bottom: 8px;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        .msg-ok {
            background: #d4edda;
            color: #155724;
            padding: 12px 18px;
            margin-bottom: 20px;
            font-size: 14px;
            border-left: 4px solid #28a745;
        }

        /* ---- Formulario ---- */
        .form-box {
            background: #d1dce5;
            padding: 30px;
            margin-bottom: 40px;
        }

        .form-box h3 {
            color: #00336c;
            margin-bottom: 20px;
            font-size: 16px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-group.full { grid-column: 1 / -1; }

        .form-group label {
            font-size: 12px;
            font-weight: bold;
            color: #00336c;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .form-group input,
        .form-group select {
            padding: 10px 12px;
            border: 1px solid #aab8c4;
            background: #fff;
            font-size: 14px;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus { border-color: #00336c; }

        .check-suc { display: flex; flex-wrap: wrap; gap: 12px; }

        .check-suc label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: #333;
            font-weight: normal;
            text-transform: none;
            letter-spacing: 0;
            cursor: pointer;
        }

        .form-actions { margin-top: 20px; display: flex; gap: 12px; align-items: center; }

        .btn-guardar {
            background: #00336c;
            color: #fff;
            border: none;
            padding: 11px 30px;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 1px;
            cursor: pointer;
            text-transform: uppercase;
            transition: background 0.3s;
        }
        .btn-guardar:hover { background: #00254d; }

        .btn-cancelar {
            background: transparent;
            border: 2px solid #00336c;
            color: #00336c;
            padding: 9px 20px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-transform: uppercase;
        }

        /* ---- Tabla ---- */
        .tabla-platos {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            font-size: 13px;
        }

        .tabla-platos th {
            background: #00336c;
            color: #fff;
            padding: 12px 14px;
            text-align: left;
            font-size: 12px;
            letter-spacing: 0.8px;
            text-transform: uppercase;
        }

        .tabla-platos td {
            padding: 10px 14px;
            border-bottom: 1px solid #e0e0e0;
            color: #333;
            vertical-align: middle;
        }

        .tabla-platos tr:hover td { background: #f5f8fb; }

        .tabla-platos img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border: 1px solid #ddd;
        }

        .badge-activo {
            background: #28a745;
            color: #fff;
            padding: 2px 8px;
            font-size: 11px;
            border-radius: 2px;
        }

        .badge-inactivo {
            background: #999;
            color: #fff;
            padding: 2px 8px;
            font-size: 11px;
            border-radius: 2px;
        }

        .acciones a {
            color: #00336c;
            font-weight: bold;
            text-decoration: none;
            margin-right: 10px;
            font-size: 12px;
        }
        .acciones a.eliminar { color: #c0392b; }
        .acciones a:hover { text-decoration: underline; }

        .nav-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .nav-top a {
            color: #00336c;
            font-size: 13px;
            text-decoration: none;
            font-weight: bold;
        }
        .nav-top a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <?php include('encabezado.php'); ?>

    <div class="admin-wrap">

        <div class="nav-top">
            <h2 class="admin-titulo">⚙ Panel Admin — Cartas</h2>
            <div>
                <a href="cartas.php">← Volver a Cartas</a>
                &nbsp;&nbsp;
                <a href="logout.php">Cerrar sesión</a>
            </div>
        </div>

        <?php if ($msg): ?>
            <div class="msg-ok"><?= htmlspecialchars($msg) ?></div>
        <?php endif; ?>

        <!-- ===================== FORMULARIO ===================== -->
        <div class="form-box">
            <h3><?= $plato_editar ? 'Editar Plato' : 'Agregar Nuevo Plato' ?></h3>

            <form method="POST">
                <input type="hidden" name="accion"   value="<?= $plato_editar ? 'editar' : 'nuevo' ?>">
                <?php if ($plato_editar): ?>
                    <input type="hidden" name="plato_id" value="<?= $plato_editar['id'] ?>">
                <?php endif; ?>

                <div class="form-grid">

                    <div class="form-group full">
                        <label>Nombre del plato</label>
                        <input type="text" name="nombre" required
                               value="<?= $plato_editar ? htmlspecialchars($plato_editar['nombre']) : '' ?>">
                    </div>

                    <div class="form-group">
                        <label>Precio (S/)</label>
                        <input type="number" name="precio" step="0.01" min="0" required
                               value="<?= $plato_editar ? $plato_editar['precio'] : '' ?>">
                    </div>

                    <div class="form-group">
                        <label>Categoría</label>
                        <select name="categoria_id" required>
                            <?php
                            $categorias->data_seek(0);
                            while ($cat = $categorias->fetch_assoc()):
                                $sel = ($plato_editar && $plato_editar['categoria_id'] == $cat['id']) ? 'selected' : '';
                            ?>
                                <option value="<?= $cat['id'] ?>" <?= $sel ?>><?= htmlspecialchars($cat['nombre']) ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="form-group full">
                        <label>Ruta de imagen (ej: img/platos/pollo.jpg)</label>
                        <input type="text" name="imagen"
                               placeholder="img/platos/default.jpg"
                               value="<?= $plato_editar ? htmlspecialchars($plato_editar['imagen']) : '' ?>">
                    </div>

                    <div class="form-group full">
                        <label>Sucursales donde aparece</label>
                        <div class="check-suc">
                            <?php
                            $sucursales->data_seek(0);
                            while ($suc = $sucursales->fetch_assoc()):
                                $checked = in_array($suc['id'], $suc_del_plato) ? 'checked' : '';
                            ?>
                                <label>
                                    <input type="checkbox" name="sucursales[]"
                                           value="<?= $suc['id'] ?>" <?= $checked ?>>
                                    <?= htmlspecialchars($suc['nombre']) ?>
                                </label>
                            <?php endwhile; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="activo" value="1"
                                <?= (!$plato_editar || $plato_editar['activo']) ? 'checked' : '' ?>>
                            &nbsp;Plato activo (visible en la carta)
                        </label>
                    </div>

                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-guardar">
                        <?= $plato_editar ? 'Guardar Cambios' : 'Agregar Plato' ?>
                    </button>
                    <?php if ($plato_editar): ?>
                        <a href="admin_cartas.php" class="btn-cancelar">Cancelar</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <!-- ===================== TABLA DE PLATOS ===================== -->
        <table class="tabla-platos">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($p = $platos_res->fetch_assoc()): ?>
                <tr>
                    <td>
                        <img src="<?= htmlspecialchars($p['imagen']) ?>"
                             alt="<?= htmlspecialchars($p['nombre']) ?>"
                             onerror="this.src='img/platos/default.jpg'">
                    </td>
                    <td><?= htmlspecialchars($p['nombre']) ?></td>
                    <td>S/<?= number_format($p['precio'], 2) ?></td>
                    <td><?= htmlspecialchars($p['categoria_nombre']) ?></td>
                    <td>
                        <?php if ($p['activo']): ?>
                            <span class="badge-activo">Activo</span>
                        <?php else: ?>
                            <span class="badge-inactivo">Inactivo</span>
                        <?php endif; ?>
                    </td>
                    <td class="acciones">
                        <a href="admin_cartas.php?editar=<?= $p['id'] ?>">✏ Editar</a>
                        <a href="admin_cartas.php?eliminar=<?= $p['id'] ?>"
                           class="eliminar"
                           onclick="return confirm('¿Eliminar este plato?')">✕ Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>

    <?php include('pie.php'); ?>
</body>
</html>
