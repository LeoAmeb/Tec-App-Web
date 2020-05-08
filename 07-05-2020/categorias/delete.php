<?php
include ("../includes/db.php");
// Obtenemos el ID de la categoria a eliminar
if(isset($_GET['id'])){
	$id = $_GET['id'];
	echo $id;
	// Eliminamos el registro seleccionado
	$query = "DELETE FROM categoria WHERE id = $id";
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Query Failed");
	}
	// Se redirecciona al usuario y se muestra un mensaje de exito
	$_SESSION['message'] = "Categoria eliminada";
	$_SESSION['message_type'] = "danger";
	header("Location: categorias.php");
}
?>