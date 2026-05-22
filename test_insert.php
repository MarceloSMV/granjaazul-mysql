<?php
require_once('db.php');

echo "<h3>Test de INSERT en platos</h3>";

$nombre    = 'Plato de prueba';
$precio    = 10.00;
$imagen    = 'img/platos/default.jpg';
$categoria = 1;
$activo    = 1;

$stmt = $conn->prepare("INSERT INTO platos (nombre, precio, imagen, categoria_id, activo) VALUES (?,?,?,?,?)");

if (!$stmt) {
    die("Error prepare: " . $conn->error);
}

$stmt->bind_param("sdsii", $nombre, $precio, $imagen, $categoria, $activo);

if ($stmt->execute()) {
    $plato_id = $conn->insert_id;
    $stmt->close();
    echo "<p style='color:green'>INSERT OK — nuevo plato_id: <strong>$plato_id</strong></p>";

    $res = $conn->query("INSERT IGNORE INTO plato_sucursal (plato_id, sucursal_id) VALUES ($plato_id, 1)");
    if ($res) {
        echo "<p style='color:green'>plato_sucursal OK</p>";
    } else {
        echo "<p style='color:red'>Error plato_sucursal: " . $conn->error . "</p>";
    }

    $conn->query("DELETE FROM plato_sucursal WHERE plato_id = $plato_id");
    $conn->query("DELETE FROM platos WHERE id = $plato_id");
    echo "<p>Registro de prueba eliminado.</p>";
} else {
    echo "<p style='color:red'>Error execute: " . $stmt->error . "</p>";
    echo "<p style='color:red'>Error conn: " . $conn->error . "</p>";
    $stmt->close();
}

echo "<hr>";
echo "<h3>Estado de AUTO_INCREMENT</h3>";
$r = $conn->query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA='granja_azul' AND TABLE_NAME='platos'");
$row = $r->fetch_assoc();
echo "<p>AUTO_INCREMENT actual: <strong>" . $row['AUTO_INCREMENT'] . "</strong></p>";

echo "<h3>Últimos platos en BD</h3>";
$r2 = $conn->query("SELECT id, nombre, categoria_id FROM platos ORDER BY id DESC LIMIT 5");
echo "<table border='1' cellpadding='5'><tr><th>id</th><th>nombre</th><th>categoria_id</th></tr>";
while ($row = $r2->fetch_assoc()) {
    echo "<tr><td>{$row['id']}</td><td>{$row['nombre']}</td><td>{$row['categoria_id']}</td></tr>";
}
echo "</table>";
?>
