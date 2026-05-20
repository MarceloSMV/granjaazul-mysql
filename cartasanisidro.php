<?php
include('encabezado.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Carta - San Isidro</title>
</head>
<body>
    <link rel="stylesheet" href="css/estilocartas.css">
    <div class="espacio"></div>

    <section id="contenedor-tienda">

        <div id="grilla-productos">

            <div class="seccion-titulo" style="grid-column: 1 / -1;">ENTRADAS</div>

            <div class="producto-card" data-id="1" data-nombre="Anticuchos Granja Azul" data-precio="18">
                <div class="producto-img-wrap"><img src="img/platos/anticuchos.jpg" alt="Anticuchos Granja Azul"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Anticuchos Granja Azul</span>
                    <span class="producto-precio">S/18</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="2" data-nombre="Anticuchos de Corazon" data-precio="28">
                <div class="producto-img-wrap"><img src="img/platos/anticuchos_corazon.webp" alt="Anticuchos de Corazon"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Anticuchos de Corazon</span>
                    <span class="producto-precio">S/28</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="3" data-nombre="Anticuchos Mixtos" data-precio="24">
                <div class="producto-img-wrap"><img src="img/platos/anticuchos_mixtos.jpg" alt="Anticuchos Mixtos"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Anticuchos Mixtos</span>
                    <span class="producto-precio">S/24</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="4" data-nombre="Mollejitas a la Parrilla" data-precio="22">
                <div class="producto-img-wrap"><img src="img/platos/mollejitas_parrilla.jpg" alt="Mollejitas a la Parrilla"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Mollejitas a la Parrilla</span>
                    <span class="producto-precio">S/22</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="5" data-nombre="Brochetas de Pollo" data-precio="32">
                <div class="producto-img-wrap"><img src="img/platos/brochetas_pollo.jpg" alt="Brochetas de Pollo"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Brochetas de Pollo</span>
                    <span class="producto-precio">S/32</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="6" data-nombre="Chorizo Artesanal" data-precio="29">
                <div class="producto-img-wrap"><img src="img/platos/chorizo_artesanal.jpg" alt="Chorizo Artesanal"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Chorizo Artesanal</span>
                    <span class="producto-precio">S/29</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="7" data-nombre="Tartar de Salmon" data-precio="39">
                <div class="producto-img-wrap"><img src="img/platos/tartar_salmon.jpg" alt="Tartar de Salmon"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Tartar de Salmon</span>
                    <span class="producto-precio">S/39</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="8" data-nombre="Steak Tartar" data-precio="39">
                <div class="producto-img-wrap"><img src="img/platos/steak_tartar.jpg" alt="Steak Tartar"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Steak Tartar</span>
                    <span class="producto-precio">S/39</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="9" data-nombre="Costillitas de Cerdo Duroc" data-precio="40">
                <div class="producto-img-wrap"><img src="img/platos/costillitas_cerdo.jpg" alt="Costillitas de Cerdo Duroc"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Costillitas de Cerdo Duroc</span>
                    <span class="producto-precio">S/40</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            






            <div class="seccion-titulo" style="grid-column: 1 / -1;">ESPECIALIDADES DE LA CASA</div>

            <div class="producto-card" data-id="10" data-nombre="Opcion Ilimitada por Persona" data-precio="98">
                <div class="producto-img-wrap"><img src="img/platos/opcion_ilimitada.jpg" alt="Opcion Ilimitada"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Opcion Ilimitada por Persona</span>
                    <span class="producto-precio">S/98</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="11" data-nombre="1/2 Pollo Granja Azul" data-precio="53">
                <div class="producto-img-wrap"><img src="img/platos/medio_pollo.jpg" alt="1/2 Pollo Granja Azul"></div>
                <div class="producto-info">
                    <span class="producto-nombre">1/2 Pollo Granja Azul</span>
                    <span class="producto-precio">S/53</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="12" data-nombre="1/4 Pollo Pierna" data-precio="34">
                <div class="producto-img-wrap"><img src="img/platos/cuarto_pierna.jpg" alt="1/4 Pollo Pierna"></div>
                <div class="producto-info">
                    <span class="producto-nombre">1/4 Pollo Pierna</span>
                    <span class="producto-precio">S/34</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="13" data-nombre="1/4 Pollo Pechuga" data-precio="39">
                <div class="producto-img-wrap"><img src="img/platos/cuarto_pechuga.jpg" alt="1/4 Pollo Pechuga"></div>
                <div class="producto-info">
                    <span class="producto-nombre">1/4 Pollo Pechuga</span>
                    <span class="producto-precio">S/39</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="14" data-nombre="Lomo Pepper Steak" data-precio="98">
                <div class="producto-img-wrap"><img src="img/platos/lomo_pepper.jpg" alt="Lomo Pepper Steak"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Lomo Pepper Steak</span>
                    <span class="producto-precio">S/98</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="15" data-nombre="Lomo Granja Azul" data-precio="98">
                <div class="producto-img-wrap"><img src="img/platos/lomo_granja.jpg" alt="Lomo Granja Azul"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Lomo Granja Azul</span>
                    <span class="producto-precio">S/98</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="16" data-nombre="Entrana Salteada" data-precio="78">
                <div class="producto-img-wrap"><img src="img/platos/entrana_salteada.jpg" alt="Entrana Salteada"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Entrana Salteada</span>
                    <span class="producto-precio">S/78</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            
            




            <div class="seccion-titulo" style="grid-column: 1 / -1;">A LA PARRILLA</div>

            <div class="producto-card" data-id="17" data-nombre="Entrana Angus Americana" data-precio="175">
                <div class="producto-img-wrap"><img src="img/platos/entrana_angus.jpg" alt="Entrana Angus Americana"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Entrana Angus Americana</span>
                    <span class="producto-precio">S/175</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="18" data-nombre="Bife Ancho Angus" data-precio="155">
                <div class="producto-img-wrap"><img src="img/platos/bife_ancho.jpg" alt="Bife Ancho Angus"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Bife Ancho Angus</span>
                    <span class="producto-precio">S/155</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="19" data-nombre="Lomo de Res" data-precio="89">
                <div class="producto-img-wrap"><img src="img/platos/lomo_res.jpg" alt="Lomo de Res"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Lomo de Res</span>
                    <span class="producto-precio">S/89</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="20" data-nombre="Pechuga de Pollo Grillada" data-precio="49">
                <div class="producto-img-wrap"><img src="img/platos/pechuga_grillada.jpg" alt="Pechuga de Pollo Grillada"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Pechuga de Pollo Grillada</span>
                    <span class="producto-precio">S/49</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="21" data-nombre="Salmon 1998" data-precio="68">
                <div class="producto-img-wrap"><img src="img/platos/salmon_grill.jpg" alt="Salmon 1998"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Salmon 1998</span>
                    <span class="producto-precio">S/68</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="22" data-nombre="Hamburguesa Angus" data-precio="56">
                <div class="producto-img-wrap"><img src="img/platos/hamburguesa_angus.jpg" alt="Hamburguesa Angus"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Hamburguesa Angus</span>
                    <span class="producto-precio">S/56</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="23" data-nombre="Vegetales a la Parrilla" data-precio="35">
                <div class="producto-img-wrap"><img src="img/platos/vegetales_parrilla.jpg" alt="Vegetales a la Parrilla"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Vegetales a la Parrilla</span>
                    <span class="producto-precio">S/35</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            
            







            <div class="seccion-titulo" style="grid-column: 1 / -1;">ENSALADAS</div>

            <div class="producto-card" data-id="24" data-nombre="Ensalada Granja Azul" data-precio="12">
                <div class="producto-img-wrap"><img src="img/platos/ensalada_granja.jpg" alt="Ensalada Granja Azul"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Ensalada Granja Azul</span>
                    <span class="producto-precio">S/12</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="25" data-nombre="Ensalada Especial" data-precio="21">
                <div class="producto-img-wrap"><img src="img/platos/ensalada_especial.jpg" alt="Ensalada Especial"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Ensalada Especial</span>
                    <span class="producto-precio">S/21</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="26" data-nombre="Ensalada Caesar" data-precio="39">
                <div class="producto-img-wrap"><img src="img/platos/ensalada_caesar.jpg" alt="Ensalada Caesar"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Ensalada Caesar</span>
                    <span class="producto-precio">S/39</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            
            





            <div class="seccion-titulo" style="grid-column: 1 / -1;">GUARNICIONES</div>

            <div class="producto-card" data-id="27" data-nombre="Papas Fritas Peruanas" data-precio="18">
                <div class="producto-img-wrap"><img src="img/platos/papas_fritas.jpg" alt="Papas Fritas Peruanas"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Papas Fritas Peruanas</span>
                    <span class="producto-precio">S/.18</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="28" data-nombre="Bastones de Camote Frito" data-precio="20">
                <div class="producto-img-wrap"><img src="img/platos/camote_frito.jpg" alt="Bastones de Camote Frito"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Bastones de Camote Frito</span>
                    <span class="producto-precio">S/.20</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="29" data-nombre="Champinones Grillados" data-precio="36">
                <div class="producto-img-wrap"><img src="img/platos/champinones_grillados.jpg" alt="Champinones Grillados"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Champinones Grillados</span>
                    <span class="producto-precio">S/36</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="30" data-nombre="Mac and Cheese" data-precio="29">
                <div class="producto-img-wrap"><img src="img/platos/mac_cheese.jpg" alt="Mac and Cheese"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Mac and Cheese</span>
                    <span class="producto-precio">S/.29</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="31" data-nombre="Porcion de Palta" data-precio="14">
                <div class="producto-img-wrap"><img src="img/platos/porcion_palta.jpg" alt="Porcion de Palta"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Porcion de Palta</span>
                    <span class="producto-precio">S/14</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="32" data-nombre="Pan de la Casa" data-precio="6">
                <div class="producto-img-wrap"><img src="img/platos/pan_casa.jpg" alt="Pan de la Casa"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Pan de la Casa</span>
                    <span class="producto-precio">S/.6</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            
            



            <div class="seccion-titulo" style="grid-column: 1 / -1;">POSTRES</div>

            <div class="producto-card" data-id="33" data-nombre="Crepe Suzette" data-precio="35">
                <div class="producto-img-wrap"><img src="img/platos/crepe_suzette.jpg" alt="Crepe Suzette"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Crepe Suzette</span>
                    <span class="producto-precio">S/ 35</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="34" data-nombre="Crepe con Manjar Blanco" data-precio="25">
                <div class="producto-img-wrap"><img src="img/platos/crepe_manjar.jpg" alt="Crepe con Manjar Blanco"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Crepe con Manjar Blanco</span>
                    <span class="producto-precio">S/25</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="35" data-nombre="Picarones de Santa Clara" data-precio="19">
                <div class="producto-img-wrap"><img src="img/platos/picarones_santaclara.jpg" alt="Picarones de Santa Clara"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Picarones de Santa Clara</span>
                    <span class="producto-precio">S/. 19</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="36" data-nombre="Porcion de Helados" data-precio="15">
                <div class="producto-img-wrap"><img src="img/platos/porcion_helados.jpg" alt="Porcion de Helados"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Porcion de Helados</span>
                    <span class="producto-precio">S/15</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            
            



            <div class="seccion-titulo" style="grid-column: 1 / -1;">BEBIDAS</div>

            <div class="producto-card" data-id="37" data-nombre="Limonada Clasica" data-precio="10">
                <div class="producto-img-wrap"><img src="img/platos/limonada_clasica.jpg" alt="Limonada Clasica"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Limonada Clasica</span>
                    <span class="producto-precio">S/10</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="38" data-nombre="Chicha Morada" data-precio="10">
                <div class="producto-img-wrap"><img src="img/platos/chicha_morada.jpg" alt="Chicha Morada"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Chicha Morada</span>
                    <span class="producto-precio">S/10</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="39" data-nombre="Jugo de Naranja" data-precio="14">
                <div class="producto-img-wrap"><img src="img/platos/jugo_naranja.jpg" alt="Jugo de Naranja"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Jugo de Naranja</span>
                    <span class="producto-precio">S/.14</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="40" data-nombre="Gaseosa" data-precio="8">
                <div class="producto-img-wrap"><img src="img/platos/gaseosa.jpg" alt="Gaseosa"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Gaseosa</span>
                    <span class="producto-precio">S/8</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            <div class="producto-card" data-id="41" data-nombre="Agua Mineral" data-precio="8">
                <div class="producto-img-wrap"><img src="img/platos/agua_mineral.jpg" alt="Agua Mineral"></div>
                <div class="producto-info">
                    <span class="producto-nombre">Agua Mineral</span>
                    <span class="producto-precio">S/ 8</span>
                </div>
                <button class="btn-agregar" onclick="agregarAlCarrito(this)">Agregar</button>
            </div>

            
            
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

<?php
include('pie.php');
?>