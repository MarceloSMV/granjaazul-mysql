
CREATE DATABASE IF NOT EXISTS granja_azul CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE granja_azul;



CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    contrasena VARCHAR(50) NOT NULL,
    rol ENUM('admin','user') NOT NULL DEFAULT 'user'
);

INSERT INTO usuarios (usuario, contrasena, rol) VALUES
('adminidat', '123456', 'admin'),
('useridat',  '123456', 'user');






CREATE TABLE IF NOT EXISTS sucursales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

INSERT INTO sucursales (id, nombre) VALUES
(1, 'San Isidro - El Polo'),
(2, 'Santa Clara'),
(3, 'KM40 - Asia');







CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

INSERT INTO categorias (id, nombre) VALUES
(1, 'Entradas'),
(2, 'Especialidades de la Casa'),
(3, 'A la Parrilla'),
(4, 'Ensaladas'),
(5, 'Guarniciones'),
(6, 'Lunch Ejecutivo'),
(7, 'Postres'),
(8, 'Bebidas');







CREATE TABLE IF NOT EXISTS platos (
    id INT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    precio DECIMAL(8,2) NOT NULL,
    imagen VARCHAR(500) DEFAULT '',
    categoria_id INT NOT NULL,
    activo TINYINT(1) DEFAULT 1,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);

INSERT INTO platos (id, nombre, precio, imagen, categoria_id, activo) VALUES
(1, 'Anticuchos Granja Azul', 18.00, 'img/platos/anticuchos.jpg', 1, 1),
(2, 'Anticuchos de Corazon', 28.00, 'img/platos/anticuchos_corazon.webp', 1, 1),
(3, 'Anticuchos Mixtos', 24.00, 'img/platos/anticuchos_mixtos.jpg', 1, 1),
(4, 'Mollejitas a la Parrilla', 22.00, 'img/platos/mollejitas_parrilla.jpg', 1, 1),
(5, 'Brochetas de Pollo', 32.00, 'img/platos/brochetas_pollo.jpg', 1, 1),
(6, 'Chorizo Artesanal', 29.00, 'img/platos/chorizo_artesanal.jpg', 1, 1),
(7, 'Tartar de Salmon', 39.00, 'img/platos/tartar_salmon.jpg', 1, 1),
(8, 'Steak Tartar', 39.00, 'img/platos/steak_tartar.jpg', 1, 1),
(9, 'Costillitas de Cerdo Duroc', 40.00, 'img/platos/costillitas_cerdo.jpg', 1, 1),
(10, 'Opcion Ilimitada por Persona', 98.00, 'img/platos/opcion_ilimitada.jpg', 2, 1),
(11, '1/2 Pollo Granja Azul', 53.00, 'img/platos/medio_pollo.jpg', 2, 1),
(12, '1/4 Pollo Pierna', 34.00, 'img/platos/cuarto_pierna.jpg', 2, 1),
(13, '1/4 Pollo Pechuga', 39.00, 'img/platos/cuarto_pechuga.jpg', 2, 1),
(14, 'Lomo Pepper Steak', 98.00, 'img/platos/lomo_pepper.jpg', 2, 1),
(15, 'Lomo Granja Azul', 98.00, 'img/platos/lomo_granja.jpg', 2, 1),
(16, 'Entrana Salteada', 78.00, 'img/platos/entrana_salteada.jpg', 2, 1),
(17, 'Entrana Angus Americana', 175.00, 'img/platos/entrana_angus.jpg', 3, 1),
(18, 'Bife Ancho Angus', 155.00, 'img/platos/bife_ancho.jpg', 3, 1),
(19, 'Lomo de Res', 89.00, 'img/platos/lomo_res.jpg', 3, 1),
(20, 'Pechuga de Pollo Grillada', 49.00, 'img/platos/pechuga_grillada.jpg', 3, 1),
(21, 'Salmon 1998', 68.00, 'img/platos/salmon_grill.jpg', 3, 1),
(22, 'Hamburguesa Angus', 56.00, 'img/platos/hamburguesa_angus.jpg', 3, 1),
(23, 'Vegetales a la Parrilla', 35.00, 'img/platos/vegetales_parrilla.jpg', 3, 1),
(24, 'Ensalada Granja Azul', 12.00, 'img/platos/ensalada_granja.jpg', 4, 1),
(25, 'Ensalada Especial', 21.00, 'img/platos/ensalada_especial.jpg', 4, 1),
(26, 'Ensalada Caesar', 39.00, 'img/platos/ensalada_caesar.jpg', 4, 1),
(27, 'Papas Fritas Peruanas', 18.00, 'img/platos/papas_fritas.jpg', 5, 1),
(28, 'Bastones de Camote Frito', 20.00, 'img/platos/camote_frito.jpg', 5, 1),
(29, 'Champinones Grillados', 36.00, 'img/platos/champinones_grillados.jpg', 5, 1),
(30, 'Mac and Cheese', 29.00, 'img/platos/mac_cheese.jpg', 5, 1),
(31, 'Porcion de Palta', 14.00, 'img/platos/porcion_palta.jpg', 5, 1),
(32, 'Pan de la Casa', 6.00, 'img/platos/pan_casa.jpg', 5, 1),
(43, 'Canastita de Pan de la Casa', 8.00, 'img/platos/pan_casa.jpg', 5, 1),
(46, 'Lunch Ejecutivo 1', 59.00, 'img/platos/lunch_ejecutivo1.jpg', 6, 1),
(47, 'Lunch Ejecutivo 2', 75.00, 'img/platos/lunch_ejecutivo2.jpg', 6, 1),
(33, 'Crepe Suzette', 35.00, 'img/platos/crepe_suzette.jpg', 7, 1),
(34, 'Crepe con Manjar Blanco', 25.00, 'img/platos/crepe_manjar.jpg', 7, 1),
(35, 'Picarones de Santa Clara', 19.00, 'img/platos/picarones_santaclara.jpg', 7, 1),
(36, 'Porcion de Helados', 15.00, 'img/platos/porcion_helados.jpg', 7, 1),
(44, 'Crepe Suzette con Helado', 38.00, 'img/platos/crepe_suzette_helado.jpg', 7, 1),
(45, 'Crepe con Manjar con Helado', 28.00, 'img/platos/crepe_manjar_helado.jpg', 7, 1),
(37, 'Limonada Clasica', 10.00, 'img/platos/limonada_clasica.jpg', 8, 1),
(38, 'Chicha Morada', 10.00, 'img/platos/chicha_morada.jpg', 8, 1),
(39, 'Jugo de Naranja', 14.00, 'img/platos/jugo_naranja.jpg', 8, 1),
(40, 'Gaseosa', 8.00, 'img/platos/gaseosa.jpg', 8, 1),
(41, 'Agua Mineral', 8.00, 'img/platos/agua_mineral.jpg', 8, 1),
(48, 'Limonada Clasica (1 litro)', 29.00, 'img/platos/limonada_clasica.jpg', 8, 1),
(49, 'Chicha Morada (1 litro)', 29.00, 'img/platos/chicha_morada.jpg', 8, 1),
(50, 'Agua Mineral San Mateo', 8.00, 'img/platos/agua_mineral.jpg', 8, 1),
(51, 'Agua San Luis', 7.00, 'img/platos/agua_san_luis.jpg', 8, 1),
(52, 'Limonada Clasica (vaso)', 10.00, 'img/platos/vaso_limonda.jpg', 8, 1),
(53, 'Chicha Morada (vaso)', 10.00, 'img/platos/chicha_vaso.jpg', 8, 1);







CREATE TABLE IF NOT EXISTS plato_sucursal (
    plato_id INT NOT NULL,
    sucursal_id INT NOT NULL,
    PRIMARY KEY (plato_id, sucursal_id),
    FOREIGN KEY (plato_id) REFERENCES platos(id) ON DELETE CASCADE,
    FOREIGN KEY (sucursal_id) REFERENCES sucursales(id) ON DELETE CASCADE
);

INSERT INTO plato_sucursal (plato_id, sucursal_id) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(7, 1),
(7, 2),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(13, 1),
(13, 3),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(20, 2),
(20, 3),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(22, 3),
(23, 1),
(23, 2),
(23, 3),
(24, 1),
(24, 2),
(24, 3),
(25, 1),
(25, 2),
(25, 3),
(26, 1),
(27, 1),
(27, 2),
(27, 3),
(28, 1),
(28, 2),
(28, 3),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(33, 2),
(33, 3),
(34, 1),
(34, 2),
(34, 3),
(35, 1),
(35, 2),
(35, 3),
(36, 1),
(36, 2),
(36, 3),
(37, 1),
(37, 3),
(38, 1),
(38, 3),
(39, 1),
(39, 2),
(39, 3),
(40, 1),
(40, 2),
(40, 3),
(41, 1),
(41, 3),
(43, 3),
(44, 1),
(44, 2),
(44, 3),
(45, 1),
(45, 2),
(45, 3),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2);
