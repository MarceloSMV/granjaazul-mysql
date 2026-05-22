<?php
session_start();
require_once('db.php');
include('encabezado.php');

$res = $conn->query("SELECT nombre FROM sucursales WHERE id = $sucursal_id");
$sucursal = $res->fetch_assoc();

$sql = "
    SELECT c.id AS cat_id, c.nombre AS categoria,
           p.id, p.nombre, p.precio, p.imagen
    FROM categorias c
    JOIN platos p ON p.categoria_id = c.id
    JOIN plato_sucursal ps ON ps.plato_id = p.id
    WHERE ps.sucursal_id = $sucursal_id AND p.activo = 1
    ORDER BY c.id, p.nombre
";
$result = $conn->query($sql);

$platos_por_categoria = [];
while ($row = $result->fetch_assoc()) {
    $platos_por_categoria[$row['categoria']][] = $row;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilocartas.css">
    <title>Carta - <?= htmlspecialchars($titulo_pagina) ?></title>
</head>
<body>
    <div class="espacio"></div>

    <section id="contenedor-tienda">
        <div id="grilla-productos">

        <?php if (empty($platos_por_categoria)): ?>
            <div style="grid-column:1/-1; text-align:center; padding:60px; color:#555; font-family:sans-serif;">
                No hay platos disponibles para esta sucursal aún.
            </div>
        <?php else: ?>
            <?php foreach ($platos_por_categoria as $categoria => $platos): ?>

                <div class="seccion-titulo" style="grid-column: 1 / -1;">
                    <?= strtoupper(htmlspecialchars($categoria)) ?>
                </div>

                <?php foreach ($platos as $plato): ?>
                <div class="producto-card"
                     data-id="<?= $plato['id'] ?>"
                     data-nombre="<?= htmlspecialchars($plato['nombre']) ?>"
                     data-precio="<?= $plato['precio'] ?>">

                    <div class="producto-img-wrap">
                        <img src="<?= htmlspecialchars($plato['imagen']) ?>"
                             alt="<?= htmlspecialchars($plato['nombre']) ?>"
                             onerror="this.src='img/platos/default.jpg'">
                    </div>
                    <div class="producto-info">
                        <span class="producto-nombre"><?= htmlspecialchars($plato['nombre']) ?></span>
                        <span class="producto-precio">S/<?= number_format($plato['precio'], 2) ?></span>
                    </div>
                    <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
                </div>
                <?php endforeach; ?>

            <?php endforeach; ?>
        <?php endif; ?>

        </div>

        <aside id="carrito">
            <h2 class="carrito-titulo">Carrito de compras</h2>
            <ul id="carrito-lista">
                <li class="carrito-vacio">Sin productos aun</li>
            </ul>
            <div class="carrito-total-row">
                <span class="carrito-total-label">Total</span>
                <span id="carrito-total">S/0</span>
            </div>
        </aside>
    </section>

    <script src="js/tienda.js"></script>
</body>
</html>
<?php include('pie.php'); ?>
