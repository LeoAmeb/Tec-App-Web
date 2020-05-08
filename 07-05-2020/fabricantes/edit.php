<?php
// Se obtiene el ID del registro a actualizar
include ("../includes/db.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT * FROM fabricantes WHERE id = '$id' ";
	$result = mysqli_query($connection, $query);
	if(mysqli_num_rows($result) >= 1){
		$row = mysqli_fetch_array($result);
		$nombre = $row['nombre'];
		$direccion = $row['direccion'];
		$correo = $row['correo'];
		$correo = $row['correo'];
		$telefono = $row['telefono'];
		$categoria = $row['categorias_fabricantes_id'];
	}
}
// Si el usuario presionó el botón de actualizar
if (isset($_POST['actualizar'])) {
// Se obtienen los datos del formulario de actualización
	$u_id = $_GET['id'];
	$u_nombre = $_POST['nombre'];
	$u_direccion = $_POST['direccion'];
	$u_correo = $_POST['correo'];
	$u_telefono = $_POST['telefono'];
	$u_categoria = $_POST['categoria_fabricante'];
	// Se envian los datos a la BD
	$query = "UPDATE fabricantes SET nombre = '$u_nombre', direccion = '$u_direccion', correo = '$u_correo', telefono = '$u_telefono', categorias_fabricantes_id ='$u_categoria' WHERE id = '$u_id';";
	mysqli_query($connection,$query);
	// Se muestra mensaje de exito y se redirecciona a la pagina principal del modulo
	$_SESSION['message'] = "Fabricante Actualizado";
	$_SESSION['message_type'] = "primary";
	header('Location: fabricantes.php');
}
?>
<!-- Formulario de edición -->
<?php include("../includes/header.php") ?>
<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
					<form action="edit.php?id=<?php echo $_GET['id'];  ?>" method="POST">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control" placeholder="Nombre de Fabricante" autofocus required="Ingresa el nombre del fabricante." value="<?php  echo $nombre ?>">
						</div>
						<div class="form-group">
							<input name="direccion" class="form-control" placeholder="Direccion" required="Ingresa la direccion del fabricante." value="<?php  echo $direccion ?>">
						</div>
						<div class="form-group">
							<input type="mail" name="correo" class="form-control" placeholder="Correo" required="Ingresa el correo del fabricante." value="<?php  echo $correo ?>">
						</div>
						<div class="form-group">
							<input type="tel" name="telefono" class="form-control" placeholder="Telefono" required="Ingresa el numero del fabricante." value="<?php  echo $telefono ?>">
						</div>
						<div class="form-group">
							<select class="form-control" name="categoria_fabricante" placeholder="Categoria Fabricante" value="<?php  echo $categoria_fabricante ?>">
								<?php include ("../categorias_fabricantes/read.php") ?>
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