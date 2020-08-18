<?php
include ("../includes/db.php");
// Se obtiene el evento de que el usuario presionó el boton de registrar
if (isset($_POST['registrar'])) {
	// Se obtienen los datos del formulario y se envian a la BD
	$nombre = $_POST['nombre'];
	$query = "INSERT INTO categorias_fabricantes(nombre) VALUES ('$nombre')";
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Query Failed");
	}
	// Se redirecciona al usuario a la pagina principal
	header("Location: categorias_fabricantes.php");
}
?>