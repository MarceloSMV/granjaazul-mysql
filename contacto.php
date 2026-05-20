<?php
include('encabezado.php');
?>

<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/estilocontacto.css">

<main id="contacto-page">
    
    <section class="banner-superior">
        <img src="img/contacto/contactanos.avif" alt="Contacto" class="img-contacto-titulo">
    </section>

    <section class="contacto-info">
        <div class="info-item">
            <strong>Reservas y consultas:</strong>
            <p><a href="mailto:serviciocliente2@granja-azul.com">serviciocliente2@granja-azul.com</a></p>
        </div>
        <div class="info-item">
            <strong>Eventos / corporativo:</strong>
            <p><a href="mailto:eventos@granja-azul.com">eventos@granja-azul.com</a></p>
        </div>
    </section>

    <section class="contenedor-formulario">
        <div class="cuadro-celeste">
            <img src="img/contacto/mensaje.avif" alt="Envíanos un mensaje" class="img-mensaje-overlap">
            
            <h2 class="form-title">envianos un mensaje</h2>

            <form action="procesar.php" method="POST">
                <div class="form-row full-width">
                    <label>Nombre</label>
                    <input type="text" name="nombre" placeholder="Nombre" required>
                </div>

                <div class="form-row-group">
                    <div class="form-row">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-row">
                        <label>Teléfono</label>
                        <input type="tel" name="tel" placeholder="Teléfono" required>
                    </div>
                </div>

                <div class="form-row full-width">
                    <label>Mensaje</label>
                    <textarea name="mensaje" placeholder="Mensaje" rows="4" required></textarea>
                </div>

                <p class="legal-disclaimer">
                    El procesamiento de los datos personales es necesario para atender su requerimiento. 
                    Conozca más en nuestra <a href="https://www.invertur.com.pe/granjaazul/política-de-privacidad.pdf" target="_blank">política de privacidad</a>.
                </p>

                <button type="submit" class="btn-enviar">Enviar</button>
            </form>
        </div>
    </section>
</main>

<?php
include('pie.php');
?>