<?php

include ("../includes/db.php");
// Se obtiene el ID del registro a eliminar
if(isset($_GET['id'])){
	$id = $_GET['id'];
	echo $id;
	// Se elimina el registro
	$query = "DELETE FROM fabricantes WHERE id = $id";
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Query Failed");
	}
	// Se redirecciona al usuario a la página principal
	$_SESSION['message'] = "Fabricante eliminado";
	$_SESSION['message_type'] = "danger";
	header("Location: fabricantes.php");
}
?>