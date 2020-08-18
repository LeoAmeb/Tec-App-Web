<?php
	/* Se verifica que existe una sesion, en caso de que no sea así, se muestra el login */
	if (!isset($_SESSION['validar'])) {
		header("location:index.php?action=ingresar");
		exit();
	}

	$productos = new MvcController();
	$productos->insertarClienteController();
	$productos->actualizarClienteController();
	$productos->eliminarClienteController();

	if (isset($_GET['registrar'])) {
		$productos->registrarClienteController();
	} else if (isset($_GET['idClienteEditar'])) {
		$productos->editarClienteController();
	}

?>

<div class="container-fluid">
	<div class="row mb-3"></div>
	<div class="card card-secondary">
		<div class="card-header">
			<h3 class="card-title">Clientes</h3>
		</div>
		<div class="card-body">
			<div class="row mb-4">
				<div class="col-sm-6">
					<a href="index.php?action=clientes&registrar" class="btn btn-info">Agregar nuevo cliente</a>
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
								<th>ID</th>
								<th>Nombre</th>
								<th>Correo Electrónico</th>
								<th>Número Telefónico</th>
								<th>Dirección</th>
								<th>Fecha de Nacimiento</th>
								<th>Compras Totales</th>
							</tr>
						</thead>
						<tbody>
							<?php
								/* Se llama al controlador que muestra todas las categorias que existen*/
								$productos->vistaClientesController();
							 ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>