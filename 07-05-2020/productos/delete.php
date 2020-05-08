<?php
include ("../includes/db.php");
// Se busca al registro seleccionado
if(isset($_GET['id'])){
	$id = $_GET['id'];
	// Se elimina el registro
	$query = "DELETE FROM productos WHERE id = $id";
	$result = mysqli_query($connection, $query);
	if(!$result ){
		die("Query Failed");
	}
	// Se redirecciona al usuario a la página principal del modulo
	$_SESSION['message'] = "Producto eliminado";
	$_SESSION['message_type'] = "danger";
	header("Location: productos.php");
}
?>