<?php
// Importamos la conexion a la BD
include ("../includes/db.php");
// Obtenemos el ID del registro a editar
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT * FROM categoria WHERE id = '$id' ";
	$result = mysqli_query($connection, $query);
	if(mysqli_num_rows($result) >= 1){
		$row = mysqli_fetch_array($result);
		$nombre = $row['nombre'];
	}
}
// En caso de que el usuario haya dado click a actualizar se manda la información
// a la BD
if (isset($_POST['actualizar'])) {
	$u_id = $_GET['id'];
	$u_nombre = $_POST['nombre'];
	$query = "UPDATE categoria SET nombre = '$u_nombre' WHERE id = '$u_id';";
	mysqli_query($connection,$query);
	// Se redirecciona al usuario, mostrandole un mensaje de exito
	$_SESSION['message'] = "Categoria Actualizada";
	$_SESSION['message_type'] = "primary";
	header('Location: categorias.php');
}
?>
<!-- Formulario de actualización de datos -->
<?php include("../includes/header.php") ?>
<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
					<form action="edit.php?id=<?php echo $_GET['id'];  ?>" method="POST">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control" placeholder="Nombre de Fabricante" autofocus required="Ingresa el nombre del fabricante." value="<?php  echo $nombre ?>">
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