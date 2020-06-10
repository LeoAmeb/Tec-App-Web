<div class="login-box">
	<div class="login-logo">
		<a href="index.php"><b>Sistema de </b>inventarios</a>
	</div>
	<!-- /.login.php -->
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Login</p>
			<form method="POST">
				<div class="input-group nb-3">
					<input type="text" name="txtUser" class="form-control" placeholder="Username">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				<div class="input-group nb-3">
					<input type="password" name="txtPassword" class="form-control" placeholder="Password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button class="btn btn-primary btn-block btn-flat" type="submit">Iniciar Sesión</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
$ingreso = new MvcController();
$ingreso -> ingresoUsuarioController();

if (isset($_GET["action"])) {
	if ($_GET["action"] == "fallo") {
		echo "Fallo al ingresar";
	}
}
?>