<?php include("../includes/db.php") ?>
<?php include("../includes/header.php") ?>
<!-- Formulario de categorias de fabricantes -->
	<div class="containter p-4">
		<div class="row">
			<div class="col-md-4">
				<!-- Mensaje de exito de (edición,eliminiación,creación) -->
				<?php if (isset($_SESSION['message'])) { ?>
				<div class="alert alert-<?=$_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
					<?= $_SESSION['message']  ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php session_unset(); } ?>
				<div class="card card-body">
					<form action="create.php" method="POST">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control" placeholder="Nombre de categoría" autofocus required>
						</div>
						<input type="submit" class="btn btn-success btn-block" name="registrar" value="Registrar Categoria">
					</form>
				</div>
			</div>
			<!-- Se obtienen los datos de la BD y se muestran en pantalla como una tabla -->
				<div class="col-md-8">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>id</th>
								<th>Nombre</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$query = "SELECT * FROM categorias_fabricantes";
							$result = mysqli_query($connection,$query);
							while ($row = mysqli_fetch_array($result)){ ?>
								<tr>
									<td><?php echo $row['id'] ?></td>
									<td><?php echo $row['nombre'] ?></td>
									<td>
										<a href="edit.php?id=<?php echo $row["id"] ?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
										<a href="delete.php?id=<?php echo $row["id"] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
									</td>
								</tr>
							 <?php } ?>
						</tbody>
					</table>
				</div>

		</div>
	</div>
<?php include("../includes/footer.php") ?>
