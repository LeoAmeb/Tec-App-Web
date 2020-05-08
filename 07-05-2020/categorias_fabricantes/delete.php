<?php
include ("../includes/db.php");
// Se obtiene el ID de la categoría a eliminar
if(isset($_GET['id'])){
	$id = $_GET['id'];
	echo $id;
	//Se eliminar la categoria
	$query = "DELETE FROM categorias_fabricantes WHERE id = $id";
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Query Failed");
	}
	// Se redirecciona a la pagina principal mostrando un
	// mensaje de exito
	$_SESSION['message'] = "Categoria eliminada";
	$_SESSION['message_type'] = "danger";
	header("Location: categorias_fabricantes.php");
}
?>