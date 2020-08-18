<?php
include ("../includes/db.php");
// Obtenemos el id de la categoria que se desea editar
// Y se hace una consulta a la BD para obtener la información registrada
// hasta el momento
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT * FROM categorias_fabricantes WHERE id = '$id' ";
	$result = mysqli_query($connection, $query);
	if(mysqli_num_rows($result) >= 1){
		$row = mysqli_fetch_array($result);
		$nombre = $row['nombre'];
	}
}
// En caso de que se haya dado click al botón de actualizar
// Se envian los datos a la BD y se actualizan los
// datos. En seguida se redirecciona a la página principal
// del modulo
if (isset($_POST['actualizar'])) {
	$u_id = $_GET['id'];
	$u_nombre = $_POST['nombre'];
	$query = "UPDATE categorias_fabricantes SET nombre = '$u_nombre' WHERE id = '$u_id';";
	mysqli_query($connection,$query);
	$_SESSION['message'] = "Categoria Actualizada";
	$_SESSION['message_type'] = "primary";
	header('Location: categorias_fabricantes.php');
}
?>
<!-- Formulario en donde se muestran los datos hasta el momomento
Y en dónde se enviaran a la BD para actualizarlos. -->
<?php include("../includes/header.php") ?>
<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
					<form action="edit.php?id=<?php echo $_GET['id'];  ?>" method="POST">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control" placeholder="Nombre de Fabricante" autofocus required="Ingresa el nombre de la categoria." value="<?php  echo $nombre ?>">
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