<?php
/* Se verifica que existe una sesion, en caso de que no sea así, se muestra el login */
    if (!isset($_SESSION['validar'])) {
        header("location:index.php?action=ingresar");
        exit();
    }

    $usuarios = new MvcController();
    $usuarios->insertarUserController();
    $usuarios->actualizarUserController();
    $usuarios->eliminarUserController();

    if (isset($_GET['registrar'])) {
        $usuarios->registrarUserController();
    } else if (isset($_GET['idUserEditar'])) {
        $usuarios->editarUserController();

    }
?>
<H1>USUARIOS</H1>

<TABLE>
	<thead>
		<tr>
			<th>Usuario</th>
			<th>Contraseña</th>
			<th>Email</th>
			<th>¿Editar?</th>
			<th>¿Eliminar?</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaUsuariosController();
			$vistaUsuario -> borrarUsuarioController();
		?>
	</tbody>
</TABLE>
<?php
	if (isset($_GET["action"])) {
		if ($_GET["action"] == "cambio") {
			echo "cambio exitoso";
		}
	}
?>