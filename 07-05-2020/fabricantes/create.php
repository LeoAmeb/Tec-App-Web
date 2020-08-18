<?php
include ("../includes/db.php");
if (isset($_POST['registrar'])) {
	$nombre = $_POST['nombre'];
	$direccion = $_POST['direccion'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$categoria_fabricante = $_POST['categoria_fabricante'];
	$query = "INSERT INTO fabricantes(nombre,direccion,correo, telefono,categorias_fabricantes_id) VALUES ('$nombre','$direccion','$correo','$telefono','$categoria_fabricante')";
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Query Failed");
	}
	$_SESSION['message'] = 'Fabricante registrado';
	$_SESSION['message_type'] = 'success';
	header("Location: fabricantes.php");
}
?>