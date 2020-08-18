<?php
// Se obtienen los datos del formulario de registro
include ("../includes/db.php");
if (isset($_POST['registrar_producto'])) {
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$precio_compra = $_POST['precio_compra'];
	$precio_venta = $_POST['precio_venta'];
	$fabricante = $_POST['fabricante'];
	$categoria_producto = $_POST['categoria_producto'];
	// Se envian los datos a la BD
	$query = "INSERT INTO productos(nombre, descripcion,  precio_compra, precio_venta,productos_fabricantes_id	, productos_categorias_id) VALUES ('$nombre',' $descripcion', '$precio_compra', '$precio_venta', '$fabricante', '$categoria_producto')";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		die("Query failed Fabricantes");
	}
	// Se redirecciona al usuario con mensaje de exito
	$_SESSION['message'] = 'Producto registrado';
	$_SESSION['message_type'] = 'success';
	header("Location: productos.php");

}
?>