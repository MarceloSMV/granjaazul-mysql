<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estiloencabezado.css">
    <title>Granja Azul</title>
</head>
<body>
    <header>
        <div class="header-top">
            <section class="col-delivery">
                <button id="botondelivery">DELIVERY 👉 PIDE AQUÍ</button>
            </section>
            
            <section class="col-logo">
                <a href="http://localhost:81/IDAT/granjaazul/">
                    <img src="img/logo.avif" id="imglogo" alt="Logo">
                </a>
            </section>
            
            <section class="col-reservas">
                <button class="clasebotones">Reservas<br>Santa Clara</button>
                <button class="clasebotones">Reservas<br>San Isidro</button>
                <button class="clasebotones">Reservas<br>El Polo</button>
            </section>
        </div>

        <nav id="menu">
            <ul>
                <li class="listamenu"><a href="index.php">HOME</a></li>
                <li class="listamenu"><a href="nosotros.php">NOSOTROS</a></li>
                <li class="listamenu"><a href="cartas.php">CARTAS</a></li>
                <li class="listamenu"><a href="delivery.php">DELIVERY</a></li>
                <li class="listamenu"><a href="locales.php">LOCALES</a></li>
                <li class="listamenu"><a href="contacto.php">CONTACTO</a></li>

                <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                    <li class="listamenu"><a href="admin_cartas.php" class="nav-admin">⚙ EDITAR CARTAS</a></li>
                    <li class="listamenu"><a href="logout.php" class="nav-logout">CERRAR SESIÓN</a></li>
                <?php else: ?>
                    <li class="listamenu"><a href="login.php" class="nav-admin">✏ EDITAR CARTAS</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <style>
        .nav-admin {
            color: #c8a84b !important;
        }
        .nav-logout {
            color: #aaa !important;
            font-size: 12px !important;
        }
    </style>
</body>
</html>
