<?php
session_start();
session_destroy();
header('Location: cartas.php');
exit;
?>
