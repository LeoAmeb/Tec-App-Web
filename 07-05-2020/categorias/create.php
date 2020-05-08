<?php
include ("../includes/db.php");
// Obtenemos la información de que el usuario desea
// registrar
if (isset($_POST['registrar'])) {
	$nombre = $_POST['nombre'];
	// Se hace el registro en la BD
	$query = "INSERT INTO categoria(nombre) VALUES ('$nombre')";
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Query Failed");
	}
	// Redirigimos al usuario a la pagina principal del modulo
	header("Location: categorias.php");
}

?>