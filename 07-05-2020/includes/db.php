<?php
// Conexión a la BD
session_start();
$connection = mysqli_connect(
	'localhost',
	'root',
	'',
	'inventario'
);
if (!isset($connection)) {
	echo "No se pudo conectar a la base de datos";
}
?>