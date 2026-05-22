<?php
$host     = 'localhost';
$dbname   = 'granja_azul';
$user     = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $dbname);
$conn->set_charset('utf8mb4');

if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}
?>
