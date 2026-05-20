-- =============================================
-- BASE DE DATOS: granja_azul
-- =============================================

CREATE DATABASE IF NOT EXISTS granja_azul CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE granja_azul;

-- =============================================
-- TABLA: usuarios (login simple)
-- =============================================
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    contrasena VARCHAR(50) NOT NULL,
    rol ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);

INSERT INTO usuarios (usuario, contrasena, rol) VALUES
('adminidat', '123456', 'admin'),
('useridat',  '123456', 'user');

-- =============================================
-- TABLA: sucursales
-- =============================================
CREATE TABLE sucursales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

INSERT INTO sucursales (nombre) VALUES
('San Isidro - El Polo'),
('Santa Clara'),
('KM40 - Asia');

-- =============================================
-- TABLA: categorias
-- =============================================
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

INSERT INTO categorias (nombre) VALUES
('Entradas'),
('Especialidades de la Casa'),
('Guarniciones'),
('Postres'),
('Bebidas');

-- =============================================
-- TABLA: platos
-- =============================================
CREATE TABLE platos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    precio DECIMAL(8,2) NOT NULL,
    imagen VARCHAR(255) DEFAULT 'img/platos/default.jpg',
    categoria_id INT NOT NULL,
    activo TINYINT(1) DEFAULT 1,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);

-- =============================================
-- TABLA: plato_sucursal (qué platos van en qué sucursal)
-- =============================================
CREATE TABLE plato_sucursal (
    plato_id INT NOT NULL,
    sucursal_id INT NOT NULL,
    PRIMARY KEY (plato_id, sucursal_id),
    FOREIGN KEY (plato_id) REFERENCES platos(id) ON DELETE CASCADE,
    FOREIGN KEY (sucursal_id) REFERENCES sucursales(id) ON DELETE CASCADE
);

-- =============================================
-- DATOS INICIALES: Platos de San Isidro (sucursal 1)
-- =============================================

-- Entradas (categoria 1)
INSERT INTO platos (nombre, precio, imagen, categoria_id) VALUES
('Anticuchos Granja Azul',      18.00, 'img/platos/anticuchos.jpg',         1),
('Anticuchos de Corazon',       28.00, 'img/platos/anticuchos_corazon.webp', 1),
('Anticuchos Mixtos',           24.00, 'img/platos/anticuchos_mixtos.jpg',   1),
('Mollejitas a la Parrilla',    22.00, 'img/platos/mollejitas_parrilla.jpg', 1),
('Brochetas de Pollo',          32.00, 'img/platos/brochetas_pollo.jpg',     1),
('Chorizo Artesanal',           29.00, 'img/platos/chorizo_artesanal.jpg',   1),
('Tartar de Salmon',            39.00, 'img/platos/tartar_salmon.jpg',       1),
('Steak Tartar',                39.00, 'img/platos/steak_tartar.jpg',        1),
('Costillitas de Cerdo Duroc',  40.00, 'img/platos/costillitas_cerdo.jpg',   1);

-- Especialidades (categoria 2)
INSERT INTO platos (nombre, precio, imagen, categoria_id) VALUES
('Opcion Ilimitada por Persona', 98.00, 'img/platos/opcion_ilimitada.jpg', 2),
('1/2 Pollo Granja Azul',        53.00, 'img/platos/medio_pollo.jpg',      2),
('1/4 Pollo Pierna',             34.00, 'img/platos/cuarto_pierna.jpg',     2),
('1/4 Pollo Pechuga',            39.00, 'img/platos/cuarto_pechuga.jpg',    2),
('Lomo Pepper Steak',            98.00, 'img/platos/lomo_pepper.jpg',       2);

-- Guarniciones (categoria 3)
INSERT INTO platos (nombre, precio, imagen, categoria_id) VALUES
('Champinones Grillados', 36.00, 'img/platos/champinones_grillados.jpg', 3),
('Mac and Cheese',         29.00, 'img/platos/mac_cheese.jpg',            3),
('Porcion de Palta',       14.00, 'img/platos/porcion_palta.jpg',         3),
('Pan de la Casa',          6.00, 'img/platos/pan_casa.jpg',              3);

-- Postres (categoria 4)
INSERT INTO platos (nombre, precio, imagen, categoria_id) VALUES
('Crepe Suzette',              35.00, 'img/platos/crepe_suzette.jpg',          4),
('Crepe con Manjar Blanco',    25.00, 'img/platos/crepe_manjar.jpg',           4),
('Picarones de Santa Clara',   19.00, 'img/platos/picarones_santaclara.jpg',   4),
('Porcion de Helados',         15.00, 'img/platos/porcion_helados.jpg',         4);

-- Bebidas (categoria 5)
INSERT INTO platos (nombre, precio, imagen, categoria_id) VALUES
('Limonada Clasica', 10.00, 'img/platos/limonada_clasica.jpg', 5),
('Chicha Morada',    10.00, 'img/platos/chicha_morada.jpg',    5),
('Jugo de Naranja',  14.00, 'img/platos/jugo_naranja.jpg',     5),
('Gaseosa',           8.00, 'img/platos/gaseosa.jpg',           5),
('Agua Mineral',      8.00, 'img/platos/agua_mineral.jpg',      5);

-- =============================================
-- Asignar todos los platos a San Isidro (sucursal 1)
-- =============================================
INSERT INTO plato_sucursal (plato_id, sucursal_id)
SELECT id, 1 FROM platos;
