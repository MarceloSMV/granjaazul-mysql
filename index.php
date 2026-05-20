<?php
include('encabezado.php');
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO - Granja Azul</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estiloinicio.css">
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<body>


    <div id="contenedorprincipal">
        
        <section id="slider">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/slider/slider1.jpg" class="d-block w-100" alt="Slider 1">
                    </div>
                    <div class="carousel-item">
                        <img src="img/slider/slider2.jpg" class="d-block w-100" alt="Slider 2">
                    </div>
                    <div class="carousel-item">
                        <img src="img/slider/slider3.webp" class="d-block w-100" alt="Slider 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </section>

        <br>

        <section id="locales">
            <article class="fila-local">
                <div class="col-imagen">
                    <img src="img/locales/elpolo.avif" alt="Granja Azul El Polo">
                </div>
                <div class="col-texto">
                    <p class="subtitulo-local">Granja Azul Grill</p>
                    <h2 class="titulo-manuscrito">El Polo</h2>
                    <p class="descripcion-local">Con el sabor y cariño de siempre, nuestro nuevo restaurante de El Polo te espera en un acogedor ambiente ubicado en el C.C. Urban Plaza El Polo, donde continúa nuestra deliciosa tradición e innovadoras alternativas.</p>
                </div>
            </article>

            <article class="fila-local fila-invertida">
                <div class="col-imagen">
                    <img src="img/locales/santaclara.avif" alt="Granja Azul Santa Clara">
                </div>
                <div class="col-texto">
                    <p class="subtitulo-local">Granja Azul</p>
                    <h2 class="titulo-manuscrito">Santa Clara</h2>
                    <p class="descripcion-local">Desde hace más de 7 décadas, nuestra historia se sigue cocinando al calor de los buenos momentos. Disfruta de un delicioso almuerzo en un ambiente único y acogedor. Diversión en el parque infantíl para los más pequeños.</p>
                </div>
            </article>

            <article class="fila-local">
                <div class="col-imagen">
                    <img src="img/locales/sanisidro.avif" alt="Granja Azul San Isidro">
                </div>
                <div class="col-texto">
                    <p class="subtitulo-local">Granja Azul Grill</p>
                    <h2 class="titulo-manuscrito">San Isidro</h2>
                    <p class="descripcion-local">Un espacio donde también podrás disfrutar de la tradición de siempre acompañada de otras novedades. Si prefieres un plan de noche de cocteles y piqueos visita nuestro Grill Lounge ubicado en el tercer piso te espera de jueves a sábado.</p>
                </div>
            </article>
       
        </section>

<section id="galeria">
    <div class="swiper contenedor-galeria">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="img/galeria/1.jpg" alt="Imagen 1"></div>
            <div class="swiper-slide"><img src="img/galeria/2.jpg" alt="Imagen 2"></div>
            <div class="swiper-slide"><img src="img/galeria/3.jpg" alt="Imagen 3"></div>
            <div class="swiper-slide"><img src="img/galeria/4.jpg" alt="Imagen 4"></div>
            <div class="swiper-slide"><img src="img/galeria/5.jpg" alt="Imagen 5"></div>
            <div class="swiper-slide"><img src="img/galeria/6.jpg" alt="Imagen 6"></div>
            <div class="swiper-slide"><img src="img/galeria/7.jpg" alt="Imagen 7"></div>
            <div class="swiper-slide"><img src="img/galeria/8.jpg" alt="Imagen 8"></div>
            <div class="swiper-slide"><img src="img/galeria/9.jpg" alt="Imagen 9"></div>
            <div class="swiper-slide"><img src="img/galeria/10.jpg" alt="Imagen 10"></div>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    const swiper = new Swiper('.contenedor-galeria', {
        slidesPerView: 5,       // imágenes a la vez
        slidesPerGroup: 1,      // al avanzar
        spaceBetween: 20,       // espacio 
        loop: true,             // loop infinito 
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
        
    </div>

</body>
</html>

<?php
include('pie.php');
?>