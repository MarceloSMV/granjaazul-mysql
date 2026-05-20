<?php
include('encabezado.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilonosotros.css">
    <title>Document</title>
</head>
<body>
    <div class="espacio"></div>

    <section id="blanco">
        <article id="bl-art">
            <br><br><br>
            <img src="img/nosotros/flor.avif" alt="flor">
            <br>
            <p id="hace" class="txt">DESDE HACE 75 AÑOS</p>
            <p id="somos" class="txt">somos pioneros</p>
            <p id="desc" class="txt">y creadores del pollo a la brasa. Un sabor inigualable y reconocido convertido en una tradición que se comparte de generación en generación.</p>
            <br><br>
        </article>
    </section>
    
    <section id="azul">
        <div class="contenedor-centrado">
            <img src="img/nosotros/pollo.avif" id="pollo">
            
            <article id="az-art">
                <div class="col-text">
                    <p id="hace" class="txt-2">NUESTRO ESPACIO</p>
                    <p id="somos" class="txt-2">es el lugar preferido</p>
                    <p id="desc-2" class="txt-2">
                        para disfrutar momentos inolvidables en familia y con amigos, 
                        quienes sentados alrededor de una mesa comparten anécdotas e 
                        historias en una atmósfera acogedora y única.
                    </p>
                    <img src="img/nosotros/hojas.avif" class="hojas">
                </div>

                <div class="col-img">
                    <img src="img/nosotros/mozo.avif" id="mozo">
                </div>
            </article>
        </div>
    </section>
     
    <section id="celeste">
        <div class="contenedor-centrado">
            <article class="cel-art">
                <div class="col-img">
                    <img src="img/nosotros/plato.avif" id="plato-familia">
                </div>

                <div class="col-text">
                    <p id="hace" class="txt">NUESTRA FAMILIA</p>
                    <p id="somos" class="txt">crece y se fortalece</p>
                    <p id="desc" class="txt">
                        porque siempre estaremos listos para reencontrarnos, 
                        descubriendo nuevas maneras para seguir disfrutando del 
                        sabor de la tradición.
                    </p>
                    <img src="img/nosotros/hojas.avif" class="hojas">
                </div>
            </article>
        </div>
    </section>
</body>
</html>

<?php
include('pie.php');
?>