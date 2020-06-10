<?php
	/* Clase para crear los controladores que utilizará el usuario mientras navega en el sitio web */

	class MvcController{
		/* Metodo/Función que sirve para devolver la estructura base del sistema  */

		public function plantilla(){
			include "views/template.php";
		}

		public function enlacesPaginasController(){
			if (isset($_GET["action"])) {
				$enlacesController = $_GET["action"];
			} else {
				$enlacesController = "index";
			}

			$respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);
			include $respuesta;
		}
		// CONTROLADORES PARA USUARIOS //
		/* Este controller apartir de la funcion password_verify compara el hash la contraseña ingresada con la que esta en la base de datos si es correcta guarda en el arreglo session los datos del uusario y manda al inventario o marcara mensaje de error */
		public function ingresoUsuarioController(){
			if (isset($_POST["txtUser"]) && isset($_POST["txtPassword"])) {
				//Guardar en el array los valores de los text de la vista (usuario y contraseña)
				$datosController = array("user"=>$_POST["txtUser"], "password"=>$_POST["txtPassword"]);

				if ($respuesta["usuario"] == $_POST["txtUser"] && password_verify($_POST["txtPassword"], $respuesta["contrasena"])) {
					session_start();
					$_SESSION["validar"] = true;
					$_SESSION["nombre_usuario"] = $respuesta["nombre_usuario"];
					$_SESSION["id"] = $respuesta["id"];
					header("Location:index.php?action=tablero");
				} else {
					header("Location:index.php?action=fallo&res=fallo");
				}
			}
		}

		public function vistaUsersController(){
			$respuesta = Datos::vistaUsersModel("users");
			foreach ($respuesta as $row => $item) {
				echo '
					<tr>
						<td>
							<a href="index.php?action=usuarios&idUserEditar='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class"fa fa-edit"></i></a>
						</td>
						<td>
							<a href="index.php?action=usuarios&idUserBorrar='.$item["id"].'" class="btn btn-danger btn-sm btn-icon" title="Eliminar" data-toggle="tooltip"><i class"fa fa-trash"></i></a>
						</td>
						<td>'.$item["firstname"].'</td>
						<td>'.$item["lastname"].'</td>
						<td>'.$item["user_name"].'</td>
						<td>'.$item["user_email"].'</td>
						<td>'.$item["data_added"].'</td>
					</tr>
				';
			}
		}

		public function registrarUserController(){
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-primary">
					<div class="card card-primary">
						<div class="card-header">
							<h4><b>Registro</b> de usuarios</h4>
						</div>
						<div class="card-body">
							<form method="POST" action="index.php?action=usuarios">
								<div class="form-group">
									<label for="nusuariotxt">Nombre: </label>
									<input class="form-control" type="text" name="nusuariotxt" id="nusuariotxt" placeholder="Ingrese el nombre" required>
								</div>
								<div class="form-group">
									<label for="ausuariotxt">Apellido: </label>
									<input class="form-control" type="text" name="ausuariotxt" id="ausuariotxt" placeholder="Ingrese el apellido" required>
								</div>
								<div class="form-group">
									<label for="usuariostxt">Usuario: </label>
									<input class="form-control" type="text" name="usuariotxt" id="usuariotxt" placeholder="Ingrese el usuario" required>
								</div>
								<div class="form-group">
									<label for="ucontratxt">Contraseña: </label>
									<input class="form-control" type="password" name="ucontratxt" id="ucontratxt" placeholder="Ingrese la contraseña" required>
								</div>
								<div class="form-group">
									<label for="uemailtxt">Correo electrónico: </label>
									<input class="form-control" type="email" name="uemailtxt" id="uemailtxt" placeholder="Ingrese el correo" required>
								</div>
								<button class="btn btn-primary" type="submit">Enviar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
		}

		public function insertarUserController(){
			if (isset($_POST["nusuariotxt"])) {
				//Encriptar la contraseña
				$_POST["ucontratxt"] = password_hash($_POST["ucontratxt"], PASSWORD_DEFAULT);

				//Almacenar en un array los valores de los text del método "registrarUserController"
				$datosController = array("nusuario"=>$_POST["nusuariotxt"], "ausuario"=>$_POST["ausuariotxt"], "usuario"=>$_POST["usuariotxt"], "contra"=>$_POST["ucontratxt"],"email"=>$_POST["uemailtxt"]);

				//Se envía los datos al modelo
				$respuesta = Datos::insertarUserModel($datosController, "users");

				if ($respuesta == "success") {
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								</h5>
									<i class="icon fas fa-check"></i>
									¡Éxito!
								</h5>
								Usuario agregado con éxito
							</div>
						</div>
					';
				} else {
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								</h5>
									<i class="icon fas fa-check"></i>
									¡Error!
								</h5>
								Error al agregar al usuario
							</div>
						</div>
					';
				}
			}
		}

		public function editarUserController(){
			$datosController = $_GET["idUserEditar"];
			//envío de datos al modelo
			$respuesta = Datos::editarUserModel($datosController, "users");
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-warning">
					<div class="card-header">
						<h4><b>Editor</b> de usuarios</h4>
					</div>
					<div class="card-body">
						<form method="post" action="index.php?action?usuarios">
							<div class="form-group">
								<input type="hidden" name="idUserEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
							</div>
							<div class="form-group">
								<label for="nusuariotxtEditar">Nombre: </label>
								<input class="form-control" type="text" name="nusuariotxtEditar" id="nusuariotxtEditar" placeholder="Ingrese el nuevo nombre" value="<?php echo $respuesta["nusuario"]; ?>">
							</div>
							<div class="form-group">
								<label for="ausuariotxtEditar">Apellido: </label>
								<input class="form-control" type="text" name="ausuariotxtEditar" id="ausuariotxtEditar" placeholder="Ingrese el nuevo apellido" value="<?php echo $respuesta["ausuario"]; ?>">
							</div>
							<div class="form-group">
								<label for="usuariotxtEditar">Usuario: </label>
								<input class="form-control" type="text" name="usuariotxtEditar" id="usuariotxtEditar" placeholder="Ingrese el usuario" value="<?php echo $respuesta["usuario"]; ?>">
							</div>
							<div class="form-group">
								<label for="contratxtEditar">Contraseña: </label>
								<input class="form-control" type="password" name="contratxtEditar" id="contratxtEditar" placeholder="Ingrese la nueva contraseña">
							</div>
							<div class="form-group">
								<label for="nusuariotxtEditar">Correo: </label>
								<input class="form-control" type="email" name="uemailtxtEditar" id="uemailtxtEditar" placeholder="Ingrese el nuevo correo" value="<?php echo $respuesta["email"]; ?>">
							</div>
							<button class="btn btn-primary" type="submit">Editar</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		public function actualizarUserController(){
			if (isset($_POST["nusuariotxtEditar"])) {
				$_POST["contratxtEditar"] = password_hash($_POST["contratxtEditar"],PASSWORD_DEFAULT);

				$datosController = array("id"=>$_POST["contratxtEditar"], "nusuario"=>$_POST["nusuariotxtEditar"], "ausuario"=>$_POST["ausuariotxtEditar"], "usuario"=>$_POST["usuariotxtEditar"], "contra"=>$_POST["contratxtEditar"], "email"=>$_POST["uemailtxtEditar"]);
				$respuesta = Datos::actualizarUserModel($datosController, "users");

				if ($respuesta == "success") {
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								</h5>
									<i class="icon fas fa-check"></i>
									¡Éxito!
								</h5>
								Usuario editato con éxito
							</div>
						</div>
					';
				} else {
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								</h5>
									<i class="icon fas fa-check"></i>
									¡Error!
								</h5>
								Error al editar al usuario
							</div>
						</div>
					';
				}
			}
		}

		public function eliminarUserController(){
			if (isset($_GET["idBorrar"])) {
				$datosController = $_GET["idBorrar"];

				$respuesta = Datos::eliminarUserModel($datosController, "users");

				if ($respuesta == "success") {
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								</h5>
									<i class="icon fas fa-check"></i>
									¡Éxito!
								</h5>
								Usuario eliminado con éxito
							</div>
						</div>
					';
				} else {
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								</h5>
									<i class="icon fas fa-check"></i>
									¡Error!
								</h5>
								Error al eliminar al usuario
							</div>
						</div>
					';
				}
			}
		}

		public function contarFilas(){
			$respuesta_users = DAtos::contarFilasModel("users");
			/*$respuesta_products = DAtos::contarFilasModel("products");
			$respuesta_categories = DAtos::contarFilasModel("categories");
			$respuesta_historial = DAtos::contarFilasModel("historial");*/

			echo '
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>'.$respuesta_users["filas"].'</h3>
                            <p>Total de Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-address-card"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=usuarios">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>';
		}

		public function vistaProductsController(){
			$respuesta = Datos::vistaProductsModel("products");

			foreach ($respuesta as $row => $item) {
				echo '
					<tr>
						<td>
							<a href="index.php?action=inventario&idProductEditar='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
						</td>
						<td>
							<a href="index.php?action=invertario&idBorrar='.$item["ud"].'" class="btn btn-danger btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
						</td>
						<td>'.$item["id"].'</td>
						<td>'.$item["codigo"].'</td>
						<td>'.$item["producto"].'</td>
						<td>'.$item["fecha"].'</td>
						<td>'.$item["stock"].'</td>
						<td>'.$item["categoria"].'</td>
						<td><a href="index.php?action=inventario&idProductAdd='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Agregar stock" data-toggle="tooltip"><i class="fa fa-edit"></i></a></td>
						<td><a href="index.php?action=inventario&idProductDel='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Quitar de stock" data-toggle="tooltip"><i class="fa fa-edit"></i></a></td>
					</tr>
				';
			}
		}

		public function registrarProductController(){
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-primary">
					<div class="card-header">
						<h4><b>Registro</b> de productos</h4>
					</div>
					<div class="card-body">
						<form method="post" accept="index.php?action=inventario">
							<div class="form-group">
								<label for="codigotxt">Código: </label>
								<input 	class="form-control" name="codigotxt" id="codigotxt" type="text" required placeholder="Código del producto">
							</div>
							<div class="form-group">
								<label for="nombretxt">Nombre: </label>
								<input 	class="form-control" name="nombretxt" id="nombretxt" type="text" required placeholder="Nombre del producto">
							</div>
							<div class="form-group">
								<label for="preciotxt">Precio: </label>
								<input 	class="form-control" name="preciotxt" id="preciotxt" type="number" min="1" required placeholder="Precio del producto">
							</div>
							<div class="form-group">
								<label for="stocktxt">Stock: </label>
								<input 	class="form-control" name="stocktxt" id="stocktxt" type="text" required placeholder="Cantidad del producto" type="number" min="1">
							</div>
							<div class="form-group">
								<label for="referenciatxt">Motivo: </label>
								<input 	class="form-control" name="referenciatxt" id="referenciatxt" type="text" required placeholder="Referenca del producto">
							</div>
							<div class="form-group">
								<label>Categoría</label>
								<select name="categoria" id="categoria" class="form-control">
									<?php
										$respuesta_categoria = Datos::obtenerCategoryModel("categories");
										foreach ($respuesta_categoria as $row => $item) {
									 ?>
									 	<option value="<?php echo $item["id"]; ?>"><?php echo $item["categoria"]; ?></option>
									 <?php
										}
									  ?>
								</select>
							</div>
							<button class="btn btn-primary" type="submit">Agregar</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		public function insertarProductController(){
			if (isset($_POST["codigotxt"])) {
				$datosController = array("codigo"=>$_POST["codigotxt"], "precio"=>$_POST["preciotxt"], "stock"=>$_POST["stocktxt"], "categoria"=>$_POST["categoria"], "nombre"=>$_POST["nombretxt"]);
				$respuesta = Datos::insertarProductsModel($datosController, "products");
				if ($respuesta == "succes") {
					$respuesta3 = Datos::ultimoProductsModel("products");
					$datosController2 = array("user"=>$_SESSION["id"], "cantidad"=>$_POST["stocktxt"],"producto"=>$respuesta3["id"], "note"=>$_POST["nombre_usuario"]."agrego/compro", "reference"=>$_POST["referenciatxt"]);
					$respuesta2 = Datos::insertarHistorialModel($datosController2, "historial");
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								</h5>
									<i class="icon fas fa-check"></i>
									¡Éxito!
								</h5>
								Producto agregado con éxito
							</div>
						</div>';
				} else {
					echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-success alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							</h5>
								<i class="icon fas fa-check"></i>
								¡Éxito!
							</h5>
							Error al agregar el producto
						</div>
					</div>';
				}
			}
		}

		public function editarProductController(){
			$datosController = $_GET["idProductEditar"];
			$respuesta = Datos::editarProductsModel($datosController, "products");
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-warning">
					<div class="card-header">
						<h4><b>Editor</b> de productos</h4>
					</div>
					<div class="card-body">
						<form method="post" accept="index.php?action=inventario">
							<div class="form-group">
								<input type="hidden" name="idProductEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>">
							</div>
							<div class="form-group">
								<label for="codigotxtEditar">Código: </label>
								<input class="form-control" name="codigotxtEditar" id="codigotxtEditar" type="text" value="<?php echo $respuesta["codigo"]; ?>" required placeholder="Codigo de producto">
							</div>
							<div class="form-group">
								<label for="nombretxtEditar">Nombre: </label>
								<input class="form-control" name="nombretxtEditar" id="nombretxtEditar" type="text" value="<?php echo $respuesta["nombre"]; ?>" required placeholder="Nombre de producto">
							</div>
							<div class="form-group">
								<label for="preciotxtEditar">Precio: </label>
								<input class="form-control" name="preciotxtEditar" id="preciotxtEditar" type="number" min="1" value="<?php echo $respuesta["precio"]; ?>" required placeholder="Precio de producto">
							</div>
							<div class="form-group">
								<label for="stocktxtEditar">Stock: </label>
								<input class="form-control" name="stocktxtEditar" id="stocktxtEditar" type="text" value="<?php echo $respuesta["stock"]; ?>" required placeholder="Stock de producto">
							</div>
							<div class="form-group">
								<label for="referenciatxtEditar">Motivo: </label>
								<input class="form-control" name="referenciatxtEditar" id="referenciatxtEditar" type="text" required placeholder="Referencia de producto">
							</div>
							<div class="form-group">
								<label>Categoría</label>
								<select name="categoriaEditar" id="categoriaEditar" class="form-control">
									<?php
										$respuesta_categoria = Datos::obtenerCategoryModel("categories");
										foreach ($respuesta_categoria as $row => $item) {
									 ?>
									 	<option value="<?php echo $item["id"]; ?>"><?php echo $item["categoria"]; ?></option>
									 <?php
										}
									  ?>
								</select>
							</div>
							<button class="btn btn-primary" type="submit">Editar</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		public function actualizarProductController(){
			if (isset($_POST["codigotxtEditar"])) {
				$datosController = array("codigo"=>$_POST["codigotxtEditar"], "precio"=>$_POST["preciotxtEditar"], "stock"=>$_POST["stocktxtEditar"], "categoria"=>$_POST["categoriaEditar"], "nombre"=>$_POST["nombretxtEditar"]);
				$respuesta = Datos::insertarProductsModel($datosController, "products");
				if ($respuesta == "succes") {
					$respuesta3 = Datos::ultimoProductsModel("products");
					$datosController2 = array("user"=>$_SESSION["id"], "cantidad"=>$_POST["stocktxtEditar"],"producto"=>$respuesta3["id"], "note"=>$_POST["nombre_usuario"]."agrego/compro", "reference"=>$_POST["referenciatxtEditar"]);
					$respuesta2 = Datos::insertarHistorialModel($datosController2, "historial");
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								</h5>
									<i class="icon fas fa-check"></i>
									¡Éxito!
								</h5>
								Producto editado con éxito
							</div>
						</div>';
				} else {
					echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-success alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							</h5>
								<i class="icon fas fa-check"></i>
								¡Éxito!
							</h5>
							Error al editar el producto
						</div>
					</div>';
				}
			}
		}

		public function addProductController(){
			$datosController = $_GET["idProductAdd"];
			$respuesta = Datos::editarProductsModel($datosController, "products");
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-warning">
					<div class="card-header">
						<h4><b>Agregar</b> stock al producto</h4>
					</div>
					<div class="card-body">
						<form method="post" action="index.php?action=inventario">
							<div class="form-group">
								<input type="hidden" required name="idProductAdd" class="form-control" value="<?php echo $respuesta["id"]; ?>">
							</div>
							<div class="form-group">
								<label for="codigotxtEditar">Stock: </label>
								<input class="form-control" name="addstocktxt" id="addstocktxt" type="number" min="1" value="1" required placeholder="Stock de producto">
							</div>
							<div class="form-group">
								<label for="referenciatxtadd">Motivo: </label>
								<input class="form-control" name="referenciatxtadd" id="referenciatxtadd" type="text" required placeholder="Referencia de producto">
							</div>
							<button class="btn btn-primary" type="submit">Realizar cambio</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		public function actualizar1StockController(){
			if (isset($_POST["addstocktxt"])) {
				$datosController = array("id"=>$_POST["idProductAdd"], "stock"=>$_POST["addstocktxt"]);
				$respuesta = Datos::pushProductModel($datosController, "products");
				if ($respuesta == "succes") {
					$datosController2 = array("user"=>$_SESSION["id"], "cantidad"=>$_POST["addstocktxt"], "producto"=>$_POST["idProductAdd"], "note"=>$_SESSION["nombre_usuario"]."agrego/compro","reference"=>$_POST["referenciatxtadd"]);
					$respuesta2 = Datos::insertarHistorialModel($datosController2, "historial");
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								</h5>
									<i class="icon fas fa-check"></i>
									¡Éxito!
								</h5>
								Stock actualizado con éxito
							</div>
						</div>';
				} else {
					echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-success alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							</h5>
								<i class="icon fas fa-check"></i>
								¡Éxito!
							</h5>
							Error al actualizar el stock
						</div>
					</div>';
				}
			}
		}

		public function actualizar2StockController(){
			if (isset($_POST["addstocktxt"])) {
				$datosController = array("id"=>$_POST["idProductDel"], "stock"=>$_POST["delstocktxt"]);
				$respuesta = Datos::pullProductModel($datosController, "products");
				if ($respuesta == "succes") {
					$datosController2 = array("user"=>$_SESSION["id"], "cantidad"=>$_POST["delstocktxt"], "producto"=>$_POST["idProductDel"], "note"=>$_SESSION["nombre_usuario"]."quito","reference"=>$_POST["referenciatxtdel"]);
					$respuesta2 = Datos::insertarHistorialModel($datosController2, "historial");
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								</h5>
									<i class="icon fas fa-check"></i>
									¡Éxito!
								</h5>
								Stock modificado con éxito
							</div>
						</div>';
				} else {
					echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-success alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							</h5>
								<i class="icon fas fa-check"></i>
								¡Éxito!
							</h5>
							Error al modificar el stock
						</div>
					</div>';
				}
			}
		}

		public function delProductController(){
			$datosController = $_GET["idProductDel"];
			$respuesta = Datos::editarProductsModel($datosController, "products");
			?>

			<div class="col-md-6 mt-3">
				<div class="card card-danger">
					<div class="card-header">
						<h4><b>Eliminar</b> stock de producto</h4>
					</div>
					<div class="card-body">
						<form method="POST" action="index.php?action=inventario">
							<div class="form-group">
								<input type="hidden" name="idProductDel" class="form-control" value="<?php echo $respuesta["id"]; ?>">
							</div>
							<div class="form-group">
								<label for="codigotxtEditar">Stock: </label>
								<input class="form-control" name="delstocktxt" id="delstocktxt" type="number" min="1" max="<?php echo $respuesta["stock"]; ?>" value="<?php echo $respuesta["stock"]; ?>" >
							</div>
							<div class="form-group">
								<label for="referenciatxtdel">Motivo: </label>
								<input class="form-control" name="referenciatxtdel" id="referenciatxtdel" type="text" required placeholder="Referencia del producto">
							</div>
							<button class="btn btn-primary" type="submit">Realizar cambio</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		public function vistaHistorialController(){
			$respuesta= Datos::vistaHistorialModel("historial");
			foreach ($respuesta as $row => $item) {
				echo '
					<tr>
						<td>'.$item["usuario"].'</td>
						<td>'.$item["producto"].'</td>
						<td>'.$item["nota"].'</td>
						<td>'.$item["cantidad"].'</td>
						<td>'.$item["referencia"].'</td>
						<td>'.$item["fecha"].'</td>
					</tr>
				';
			}
		}

		public function vistaCategoriasController(){
			$respuesta= Datos::vistaHistorialModel("categories");

			foreach ($respuesta as $row => $item) {
				echo '
					<tr>
					<td>
					<a href="index.php?action=categorias&idCategoryEditar='.$item["idc"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
					</td>
						<td>
					<a href="index.php?action=categorias&idBorrar='.$item["idc"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
					</td>
						<td>'.$item["idc"].'</td>
						<td>'.$item["ncategoria"].'</td>
						<td>'.$item["dcategoria"].'</td>
						<td>'.$item["fcategoria"].'</td>

					</tr>
				';
			}

		}

		public function registrarCategoryController(){
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-primary">
					<div class="card-header">
						<h><b>Registro</b>de categorias</h>
					</div>

					<div class="card-body">
						<form method="post" action="index.php?action=categorias">
							<div class="form-group">
								<label for="ncategoriatxt">Nombre de la categoria</label>
								<input class="form-control" type="text" name="ncategoriatxt" id="ncategoriatxt" placeholder="Ingrese el nombre de la categoria">
							</div>
							<div class="form-group">
								<label for="dcategoriatxt">Descripcion de la categoria</label>
								<input class="form-control" type="text" name="dcategoriatxt" id="dcategoriatxt" placeholder="Ingrese la descripcion de la categoria">
							</div>
							<button class="btn btn-primary" type="submit">Agregar</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		public function insertarCategoryController(){
			if(isset($_POST["ncategoriatxt"]) && isset($_POST["dcategoriatxt"])){
			$datosController=array("nombre_categoria"=>$_POST["ncategoriatxt"], "descripcion_categoria"=>$_POST["dcategoriatxt"]);
			$respuesta=Datos::insertarCategoryModel($datosController, "categories");
			if($respuesta=="success"){
				echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-success alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<h5>
								<i class="icon fas fa-check"></i>
								¡Exito!
							</h5>
							Categoria agregada con exito.
						</div>
					</div>
				';
				}else {
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
									<h5>
										<i class="icon fas fa-ban"></i>
										¡Error!
									</h5>
									Se ha producido un error al momento de agregar la categoria, trate de nuevo.
							</div>
						</div>
	        		';
				}
			}
		}

		public function editarCategoryController(){
			$datosController=$_GET["idCategoryEditar"];
			$respuesta=Datos::editarCategoryModel($datosController, "categories");
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-warning">
					<div class="card-header">
						<h><b>Editor</b>de categorias</h>
					</div>

					<div class="card-body">
						<form method="post" action="index.php?action=categorias">
							<div class="form-group">
								<input type="hidden" name="idCategoryEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
							</div>

							<div class="form-group">
								<label for="ncategoriatxt">Nombre de la categoria</label>
								<input class="form-control" type="text" name="ncategoriatxteditar" id="ncategoriatxt" placeholder="Ingrese el nombre de la categoria" value="<?php echo $respuesta["nombre_categoria"]; ?>">
							</div>
							<div class="form-group">
								<label for="dcategoriatxt">Descripcion de la categoria</label>
								<input class="form-control" type="text" name="dcategoriatxteditar" id="dcategoriatxt" placeholder="Ingrese la descripcion de la categoria" value="<?php echo $respuesta["descripcion_categoria"]; ?>">
							</div>
							<button class="btn btn-primary" type="submit">Editar</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		public function actualizarCategoryController(){
			if(isset($_POST["ncategoriatxteditar"]) && isset($_POST["dcategoriatxteditar"])){
			$datosController=array("id"=>$_POST["idCategoryEditar"], "nombre_categoria"=>$_POST["ncategoriatxteditar"], "descripcion_categoria"=>$_POST["dcategoriatxteditar"]);
			$respuesta=Datos::actualizarCategoryModel($datosController, "categories");
			if($respuesta=="success"){
				echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-success alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<h5>
								<i class="icon fas fa-check"></i>
								¡Exito!
							</h5>
							Categoria editada con exito.
						</div>
					</div>
				';
				}else {
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
									<h5>
										<i class="icon fas fa-ban"></i>
										¡Error!
									</h5>
									Se ha producido un error al momento de editar la categoria, trate de nuevo.
							</div>
						</div>
		    		';
				}
			}
		}

		public function eliminarCategoryController(){
			if(isset($_GET["idBorrar"])){
	    		$datosController=$_GET["idBorrar"];
	    		$respuesta=Datos::eliminarCategoryModel($datosController,"categories");
	    		if($respuesta=="success"){
	    			echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									¡Exito!
								</h5>
								Categoria eliminada con exito.
							</div>
						</div>
					';
	   			}else{
	   				echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									¡Error!
								</h5>
								Se ha producido un error al momento de eliminar la categoria, trate de nuevo.
							</div>
						</div>
					';
	   			}
	    	}
		}

	}
?>
