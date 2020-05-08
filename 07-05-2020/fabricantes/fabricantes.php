<?php include("../includes/db.php") ?>
<?php include("../includes/header.php") ?>
<!-- Formulario para agregar fabricantes -->
	<div class="containter p-4">
		<div class="row">
			<div class="col-md-4">
				<!-- Mensaje de exito de registro/edicion/eliminacion -->
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
							<input type="text" name="nombre" class="form-control" placeholder="Nombre de Fabricante" autofocus required="Ingresa el nombre del fabricante.">
						</div>
						<div class="form-group">
							<input name="direccion" class="form-control" placeholder="Direccion" required="Ingresa la direccion del fabricante.">
						</div>
						<div class="form-group">
							<input type="mail" name="correo" class="form-control" placeholder="Correo" required="Ingresa el correo del fabricante.">
						</div>
						<div class="form-group">
							<input type="tel" name="telefono" class="form-control" placeholder="Telefono" required="Ingresa el numero del fabricante.">
						</div>
						<div class="form-group">
							<select class="form-control" name="categoria_fabricante" placeholder="Categoria Fabricante" >
								<?php include ("../categorias_fabricantes/read.php") ?>
							</select>
						</div>

						<input type="submit" class="btn btn-success btn-block" name="registrar" value="Registrar Fabricante">
					</form>
				</div>
			</div>
			<!-- Se muestran los datos registrados en la BD como una tabla -->
				<div class="col-md-8">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>id</th>
								<th>Nombre</th>
								<th>Direccion</th>
								<th>Correo</th>
								<th>Telefono</th>
								<th>Categoria</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$query = "SELECT f.id, f.nombre, f.direccion, f.correo, f.telefono, c.nombre as categoria FROM fabricantes as f JOIN categorias_fabricantes as c on categorias_fabricantes_id = c.id";
							$result = mysqli_query($connection,$query);
							while ($row = mysqli_fetch_array($result)){ ?>
								<tr>
									<td><?php echo $row['id'] ?></td>
									<td><?php echo $row['nombre'] ?></td>
									<td><?php echo $row['direccion'] ?></td>
									<td><?php echo $row['correo'] ?></td>
									<td><?php echo $row['telefono'] ?></td>
									<td><?php echo $row['categoria'] ?></td>
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
