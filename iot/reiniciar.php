<?php
$conexion = mysqli_connect("localhost", "root", "", "sensores");
$resultado = mysqli_query("SELECT FROM reset WHERE id='" . $_GET['id']. "'", $conexion);
$nombre = mysqli_result($resultado, 0);

echo "valor=" . $nombre . ";";
?>
?>