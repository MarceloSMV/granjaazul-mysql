<?php
session_start();
include('encabezado.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilocartas.css">
    <title>Cartas - Granja Azul</title>
    <style>
        .barra-sesion {
            text-align: right;
            padding: 10px 40px 0;
            font-family: sans-serif;
            font-size: 13px;
            color: #555;
        }
        .barra-sesion a {
            color: #00336c;
            font-weight: bold;
            text-decoration: none;
            margin-left: 12px;
        }
        .barra-sesion a:hover { text-decoration: underline; }
        .btn-admin {
            background-color: #c8a84b;
            color: white !important;
            padding: 5px 14px;
            border-radius: 3px;
        }
        .btn-admin:hover { background-color: #a8882e !important; text-decoration: none !important; }
    </style>
</head>
<body>
    <div class="espacio"></div>

    <!-- Barra de sesión -->
    <div class="barra-sesion">
        <?php if (isset($_SESSION['usuario'])): ?>
            Hola, <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong>
            <?php if ($_SESSION['rol'] === 'admin'): ?>
                <a href="admin_cartas.php" class="btn-admin">⚙ Panel Admin</a>
            <?php endif; ?>
            <a href="logout.php">Cerrar sesión</a>
        <?php else: ?>
            <a href="login.php">Iniciar sesión</a>
        <?php endif; ?>
    </div>

    <section id="contenedor-cartas">
        <div class="cuadro-celeste">
            <img src="img/nosotros/flor.avif" alt="flor" class="flor-cartas">
            
            <div class="botones-container">
                <a target="_blank" href="cartasanisidro.php" class="btn-carta">CARTA SAN ISIDRO - EL POLO</a>
                <a target="_blank" href="cartasantaclara.php" class="btn-carta">CARTA SANTA CLARA</a>
                <a target="_blank" href="cartaasia.php" class="btn-carta">CARTA KM40 - ASIA</a>
            </div>
        </div>
    </section>

</body>
</html>

<?php include('pie.php'); ?>
