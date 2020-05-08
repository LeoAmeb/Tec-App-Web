<?php include("../includes/db.php") ?>
<?php include("../includes/header.php") ?>
<!-- Formulario de registro de productos -->
	<div class="containter p-4">
		<div class="row">
			<div class="col-md-4">
				<!-- Mensaje de exito de inserción/eliminación/Edición -->
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
							<input type="text" name="nombre" class="form-control" placeholder="Nombre de producto" autofocus="" required>
						</div>
						<div class="form-group">
							<textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion" required></textarea>
						</div>
						<div class="form-group">
							<input type="number" step="0.01" min="0" name="precio_venta" class="form-control" placeholder="Precio Venta" required>
						</div>
						<div class="form-group">
							<input type="number" step="0.01" min="0" name="precio_compra" class="form-control" placeholder="Precio Compra" required >
						</div>
						<div class="form-group">
							<select class="form-control" name="fabricante" placeholder="Fabricante" required>
								<?php include ("../fabricantes/read.php") ?>
							</select>
						</div>
						<div class="form-group">
							<select class="form-control" name="categoria_producto" placeholder="Fabricante" required>
								<?php include ("../categorias/read.php") ?>
							</select>
						</div>
						<input type="submit" class="btn btn-success btn-block" name="registrar_producto" value="Registrar Producto">
					</form>
				</div>
			</div>
			<!-- Se muestran los datos registrados en la BD y se muestran en tabla -->
				<div class="col-md-8">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>id</th>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Precio Venta</th>
								<th>Precio Compra</th>
								<th>Fabricante</th>
								<th>Categoria</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$query = "SELECT p.id,p.nombre,p.descripcion,p.precio_venta,p.precio_compra, f.nombre AS fabricante, c.nombre AS categoria
								FROM `productos` AS p
								JOIN fabricantes AS f on p.productos_fabricantes_id = f.id
								JOIN categoria AS c on productos_categorias_id = c.id";
							$result = mysqli_query($connection,$query);
							while ($row = mysqli_fetch_array($result)){ ?>
								<tr>
									<td><?php echo $row['id'] ?></td>
									<td><?php echo $row['nombre'] ?></td>
									<td><?php echo $row['descripcion'] ?></td>
									<td><?php echo $row['precio_venta'] ?></td>
									<td><?php echo $row['precio_compra'] ?></td>
									<td><?php echo $row['fabricante'] ?></td>
									<td><?php echo $row['categoria'] ?></td>
									<td>
										<a href="edit.php?id=<?php echo $row["id"] ?>" class="btn btn-secondary">
											<i class="fas fa-marker"></i></a>
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
