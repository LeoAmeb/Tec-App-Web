<?php 
	/* Se verifica que existe una sesion, en caso de que no sea así, se muestra el login */
	if (!isset($_SESSION['validar'])) {
		header("location:index.php?action=ingresar");
		exit();
	}

	$productos = new MvcController();
	$productos->insertarProductController();
	$productos->actualizarProductController();
	$productos->eliminarProductController();

	if (isset($_GET['registrar'])) {
		$productos->registrarProductController();
	} else if (isset($_GET['idProductEditar'])) {
		$productos->editarProductoController();
	}

?>

<div class="container-fluid">
	<div class="row mb-3"></div>
	<div class="card card-secondary">
		<div class="card-header">
			<h3 class="card-title">Productos</h3>
		</div>
		<div class="card-body">
			<div class="row mb-4">
				<div class="col-sm-6">
					<a href="index.php?action=productos&registrar" class="btn btn-info">Agregar nuevo producto</a>
				</div>
			</div>
			<div id="example2-wrapper" class="dataTables_wrapper dt-bootstrap4">
				<div class="row">
					<div class="col-sm-12"></div>
					<table id="example1" class="table table-hover n-0 table-bordered table-striped">
						<thead class="table-info">
							<tr>
								<th>¿Editar?</th>
								<th>Eliminar?</th>
								<th>Codigo de producto</th>
								<th>Nombre del producto</th>
								<th>Fecha</th>
								<th>Precio</th>
								<th>Stock</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								/* Se llama al controlador que muestra todas las categorias que existen*/
								$productos->vistaProductsController();
							 ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>