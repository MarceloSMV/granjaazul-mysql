<?php
include('encabezado.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilocartas.css">
    <title>Cartas - Granja Azul</title>
</head>
<body>
    <div class="espacio"></div>

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

<?php
include('pie.php');
?>