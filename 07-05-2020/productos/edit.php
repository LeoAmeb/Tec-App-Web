<?php
// Se obtiene la información del registro seleccionado
include ("../includes/db.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT * FROM productos WHERE id = '$id' ";
	$result = mysqli_query($connection, $query);
	if(mysqli_num_rows($result) >= 1){
		$row = mysqli_fetch_array($result);
		$nombre = $row['nombre'];
		$descripcion = $row['descripcion'];
		$precio_venta = $row['precio_venta'];
		$precio_compra = $row['precio_compra'];
		$fabricante = $row['productos_fabricantes_id'];
		$categoria = $row['productos_categorias_id'];
	}
}
// En caso de que el usuario haya presionado el boton de actualizar
if (isset($_POST['actualizar'])) {
	$u_id = $_GET['id'];
	$u_nombre = $_POST['nombre'];
	$u_descripcion = $_POST['descripcion'];
	$u_precio_venta = $_POST['precio_venta'];
	$u_precio_compra = $_POST['precio_compra'];
	$u_fabricante = $_POST['fabricante'];
	$u_categoria = $_POST['categoria_producto'];
	// Se envia toda la información a la BD para actualizarla
	$query = "UPDATE productos SET nombre = '$u_nombre', descripcion = '$u_descripcion', precio_venta = '$u_precio_venta', precio_compra = '$u_precio_compra', productos_fabricantes_id = '$u_fabricante', productos_categorias_id = '$u_categoria' WHERE id = '$u_id';";
	mysqli_query($connection,$query);
	// Se redirecciona al usuario a la pagina principal del modulo
	$_SESSION['message'] = "Producto Actualizado";
	$_SESSION['message_type'] = "primary";
	header('Location: productos.php');
}
?>
<!-- Formulario para la edición de productos -->
<?php include("../includes/header.php") ?>
<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
					<form action="edit.php?id=<?php echo $_GET['id'];  ?>" method="POST">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control" placeholder="Nombre de producto" autofocus="" value="<?php echo $nombre ?>" required>
						</div>
						<div class="form-group">
							<textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion" required><?php echo $descripcion ?></textarea>
						</div>
						<div class="form-group">
							<input type="number" step="0.01" min="0" name="precio_venta" class="form-control" placeholder="Precio Venta" value="<?php echo $precio_venta ?>" required>
						</div>
						<div class="form-group">
							<input type="number" step="0.01" min="0" name="precio_compra" class="form-control" placeholder="Precio Compra" value="<?php echo $precio_compra ?>" required >
						</div>
						<div class="form-group">
							<select class="form-control" name="fabricante" placeholder="Fabricante" value="<?php echo $fabricante ?>" required>
								<?php include ("../fabricantes/read.php") ?>
							</select>
						</div>
						<div class="form-group">
							<select class="form-control" name="categoria_producto" placeholder="Fabricante" value="<?php echo $categoria ?>" required>
								<?php include ("../categorias/read.php") ?>
							</select>
						</div>
						<button class="btn btn-success" name="actualizar">
							Actualizar
						</button>
					</form>
			</div>
		</div>
	</div>
</div>
<?php include("../includes/footer.php") ?>