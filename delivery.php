<?php include('encabezado.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilodelivery.css">
    <title>Delivery - Granja Azul</title>
</head>
<body>
    <div class="espacio-superior"></div>

    <main class="seccion-delivery-horizontal">
        
        <div class="bloque-cabecera">
            <a href="#" class="btn-azul-carta">CARTA DELIVERY</a>
        </div>

        <div class="bloque-decorativo">
            <img src="img/nosotros/flor.avif" alt="flor" class="flor-delivery">
            <h2 class="titulo-como-pedir">COMO PEDIR</h2>
        </div>

        <div class="fila-pedidos">
            <div class="tarjeta-azul-pequena">
                <span class="metodo-texto">Por Web</span>
                <a target="_blank" href="https://pedidos.granja-azul.com/" class="btn-pedir-blanco">PEDIR</a>
            </div>

            <div class="tarjeta-azul-pequena">
                <span class="metodo-texto">Por Rappi</span>
                <a target="_blank" href="https://rappi.app.link/GranjaAzul" class="btn-pedir-blanco">PEDIR</a>
            </div>

            <div class="tarjeta-azul-pequena">
                <span class="metodo-texto">Por PedidosYa</span>
                <a target="_blank" href="https://www.pedidosya.com.pe/" class="btn-pedir-blanco">PEDIR</a>
            </div>
        </div>

        <div class="info-horarios">
            <p class="horario-titulo">Horario de recepción de pedidos</p>
            <p class="horario-detalle">
                De lunes a sábado de 12 pm. a 10 pm.<br>
                y domingo de 11:30 am. a 8 pm.
            </p>
            <p class="horario-nota">*Verificar en cada app la zona de cobertura</p>
        </div>
        
        <div class="contenedor-imagen-final">
            <img src="img/delivery/comida.avif" alt="comida" class="imagen-comida-delivery">
        </div>

    </main>

</body>
</html>

<?php include('pie.php'); ?>