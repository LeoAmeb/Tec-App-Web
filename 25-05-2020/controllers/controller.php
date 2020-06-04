<?php

    class MvcController{
		/*Inicio de la clase */

        public function plantilla(){
            include "views/template.php";
        }

        public function enlacesPaginasController(){
            if (isset($_GET['action'])){
                $enlaces = $_GET['action'];
            }else{
                $enlaces = 'index';
            }
            //Es el momento en que el controlador invoca el modelo enlacesPaginaModel para que muestre el listado de paginas
            $respuesta = Paginas::enlacesPaginasModel($enlaces);
            include $respuesta;
        }

        public function registroUsuarioController(){
            if (isset($_POST['usuarioRegistro'])) {
                // Recibe a través del método post el name (html) de usuario, password y email, se almacenan los datos en una variable o propiedad de tipo array asociativo con sus respectivas propiedades (usuario, password, email)

                $datosController = array("usuario" => $_POST["usuarioRegistro"],
                                        "password" => $_POST["passwordRegistro"],
                                        "email" => $_POST["emailRegistro"]);

                //Se le dice al modelo models/crud.php (Datos::registroUsuariosModel), que en modelo Datos el método registroUsuariosModel reciba en sus parametros los valores de $datosController y el nombre de la tabla de la base de datos a la cual debe de conectarse (usuarios)
                $respuesta = Datos::registroUsuariosModel($datosController, "usuarios");

                if ($respuesta == "success") {
                    header("location:index.php?action=ok");
                } else {
                    header("location:index.php");
                }
            }
        }

        public function ingresoUsuarioController(){
            if(isset($_POST['txtUser']) && isset($_POST['txtPassword'])){
                $datosController = array('user'=>$_POST['txtUser'],'password'=>$_POST['txtPassword']);
                $respuesta = Datos::ingresoUsuarioModel($datosController,'users');

                if($respuesta['usuario']==$_POST['txtUser'] && password_verify($_POST['txtPassword'],$respuesta['contrasena'])){
                    session_start();
                    $_SESSION['validar']=True;
                    $_SESSION['nombre_usuario'] =$respuesta['nombre_usuario'];
                    $_SESSION['id']=$respuesta['id'];
                    header('Location:index.php?Action=tablero');

                }else{
                    header('Location:index.php?action=fall0&res=fallo');
                }
            }
        }

        public function vistaUsuarioController(){
            $respuesta = Datos::vistaUsersModel('users');
            foreach($respuesta as $row => $item){
                echo '
                    <tr>
                        <td>
                            <a href="index.php?action=usuarios$idUserEditar='.$item['id'].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i clas="fa fa-edit"></i></a>
                        </td>
                        <td>
                            <a href="index.php?action=usuarios$idBorrarr='.$item['id'].'" class="btn btn-warning btn-sm btn-icon" title="Eliminar" data-toggle="tooltip"><i clas="fa fa-edit"></i></a>
                        </td>
                        <td>'.$item["firstname"].'</td>
					    <td>'.$item["lastname"].'</td>
					    <td>'.$item["user_name"].'</td>
					    <td>'.$item["user_email"].'</td>
					    <td>'.$item["date_added"].'</td>
				    </tr>
                ';
            }
        }

        public function editarUsuarioController() {
			$datosController = $_GET["idUserEditar"];
			//envío de datos al mododelo
			$respuesta = Datos::editarUsuarioModel($datosController,"users");
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-warning">
					<div class="card-header">
						<h4><b>Editor</b> de Usuarios</h4>
					</div>
					<div class="card-body">
						<form method="post" action="index.php?action=usuarios">
							<div class="form-group">
								<input type="hidden" name="idUserEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
							</div>
							<div class="form-group">
								<label for="nusuariotxtEditar">Nombre: </label>
								<input class="form-control" type="text" name="nusuariotxtEditar" id="nusuariotxtEditar" placeholder="Ingrese el nuevo nombre" value="<?php echo $respuesta["nusuario"]; ?>" required>
							</div>
							<div class="form-group">
								<label for="ausuariotxtEditar">Apellido: </label>
								<input class="form-control" type="text" name="ausuariotxtEditar" id="ausuariotxtEditar" placeholder="Ingrese el nuevo apellido" value="<?php echo $respuesta["ausuario"]; ?>" required>
							</div>
							<div class="form-group">
								<label for="usuariotxtEditar">Usuario: </label>
								<input class="form-control" type="text" name="usuariotxtEditar" id="usuariotxtEditar" placeholder="Ingrese el nuevo usuario" value="<?php echo $respuesta["usuario"]; ?>" required>
							</div>
							<div class="form-group">
								<label for="contratxtEditar">Contraseña: </label>
								<input class="form-control" type="password" name="contratxtEditar" id="contratxtEditar" placeholder="Ingrese la nueva contraseña" required>
							</div>
							<div class="form-group">
								<label for="uemailtxtEditar">Correo Electrónico: </label>
								<input class="form-control" type="email" name="uemailtxtEditar" id="uemailtxtEditar" placeholder="Ingrese el nuevo correo electrónico" value="<?php echo $respuesta["email"]; ?>" required>
							</div>
							<button class="btn btn-primary" type="submit">Editar</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		public function actualizarUsuarioController() {
			if (isset($_POST["nusuariotxtEditar"])) {
				$_POST["contratxtEditar"] = password_hash($_POST["contratxtEditar"], PASSWORD_DEFAULT);

				$datosController = array("id" => $_POST["idUserEditar"], "nusuario" => $_POST["nusuariotxtEditar"], "ausuario" => $_POST["ausuariotxtEditar"], "usuario" =>$_POST["usuariotxtEditar"], "contra" => $_POST["contratxtEditar"], "email" => $_POST["uemailtxtEditar"]);

				$respuesta = Datos::actualizarUsuarioModel();

				if ($respuesta == "success") {
					echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-succes alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<h5>
								<i class="icon fas fa-check"></i>
								Exito
							</h5>
							Usuario editado con exito.
						</div>
					</div>
					';
				} else {
					echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-danger alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<h5>
								<i class="icon fas fa-ban"></i>
								Error!
							</h5>
							Se ha producido un error al momento de editar al usuario, trate de nuevo
						</div>
					</div>
					';
				}

			}
		}

		public function eliminarUsuarioController() {
			if (isset($_GET["idBorrar"])) {
				$datosController = $_GET["idBorrar"];

				$respuesta = Datos::eliminarUsuarioModel($datosController, "users");

				if ($respuesta == "sucess") {
					echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-succes alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<h5>
								<i class="icon fas fa-check"></i>
								Exito
							</h5>
							Usuario editado con exito.
						</div>
					</div>
					';
				} else {
					echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-danger alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<h5>
								<i class="icon fas fa-ban"></i>
								Error!
							</h5>
							Se ha producido un error al momento de eliminar al usuario, trate de nuevo
						</div>
					</div>
					';
				}
			}
		}

		public function vistaProductController(){
			$respuesta = Datos::vistaUsuarioModel('products');
            foreach($respuesta as $row => $item){
                echo '
                    <tr>
                        <td>
                            <a href="index.php?action=usuarios$idUserEditar='.$item['id'].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i clas="fa fa-edit"></i></a>
                        </td>
                        <td>
                            <a href="index.php?action=usuarios$idBorrarr='.$item['id'].'" class="btn btn-warning btn-sm btn-icon" title="Eliminar" data-toggle="tooltip"><i clas="fa fa-edit"></i></a>
                        </td>
                        <td>'.$item["id"].'</td>
					    <td>'.$item["codigo"].'</td>
					    <td>'.$item["producto"].'</td>
					    <td>'.$item["fecha"].'</td>
						<td>'.$item["precio"].'</td>
						<td>'.$item["stock"].'</td>
						<td>'.$item["categoria"].'</td>
						<td><a href="index.php?action=inventario&idProductAdd='.$item['id'].'class="btn btn-warning btn-sm btn-icon" title="Agregar Stock" data-toggle="tooltip"><i class="fa fa-edit"></i></a></td>
						<td><a href="index.php?action=inventario&idProductDel='.$item['id'].'class="btn btn-warning btn-sm btn-icon" title="Quitar de Stock" data-toggle="tooltip"><i class="fa fa-edit"></i></a></td>
				    </tr>
                ';
            }
		}

		public function registrarProductController(){
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-primary">
					<div class="card-header">
						<h4><b>Registro</b> de Producto</h4>
					</div>
					<div class="card-body">
						<form method="post" action="index.php?action=inventario">
							<div class="form-group">
								<label for="codigotxt">Código:</label>
								<input class="form-control" name="codigotxt" id="codigotxt" type="text" required placeholder="Código del producto">
							</div>
							<div class="form-group">
								<label for="nombretxt">Nombre:</label>
								<input class="form-control" name="nombretxt" id="nombretxt" type="text" required placeholder="Nombre del producto">
							</div>
							<div class="form-group">
								<label for="preciotxt">Precio:</label>
								<input class="form-control" name="preciotxt" id="preciotxt" type="text" required placeholder="Precio del producto">
							</div>
							<div class="form-group">
								<label for="stocktxt">Stock:</label>
								<input class="form-control" name="stocktxt" id="stocktxt" type="text" required placeholder="Cantidad de stock del producto">
							</div>
							<div class="form-group">
								<label for="motivotxt">Motivo:</label>
								<input class="form-control" name="motivotxt" id="motivotxt" type="text" required placeholder="Referencia del producto">
							</div>
							<div class="form-group">
								<label for="categoria">Código:</label>
								<select name="categoria" id="categoria" class="form-control">
									<?php
										$respuesta_categoria = Datos::obtenerCategoryModel("categories");
										foreach ($respuesta_categoria as $row=>$item){
											?>
											<option value="<?php echo $item['id'];?>"><?php echo $item['categoria']; ?></option>
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
			<?php //se abre el php
		}
        /*-- Esta funcion permite insertar productos llamando al modelo  que se encuentra en  elarchivo crud de modelos confirma con un isset que la caja de texto del codigo este llena y procede a llenar en una variable llamada datos controller este arreglo se manda como parametro aligual que elnombre de la tabla,una vez se obtiene una respuesta de la funcion del modelo de inserccion
        tenemos que checar si la respuesta fue afirmativa hubo un error y mostrara los respectivas alerta,para insertar datos en la tabla de historial se tiene que mandar a un modelollamado ultimoproductmodel este traera el ultimo dato insertado que es el id del producto que se manda en elarray de datoscontroller2 junto al nombre de la tabla asi insertando los datos en la tabla historial --*/
		public function insertarProductController(){
			if(isset($_POST['codigotxt'])){
				$datosController = array("codigo"=>$_POST['codigotxt'],"precio"=>$_POST['preciotxt'],
				"stock"=>$_POST['stocktxt'],
				"categoria"=>$_POST['categoria'],
				"nombre"=>$_POST['nombretxt']);
				$respuesta = Datos::insertarProductModel($datosController,"products");
				if($respuesta = "success"){
					$respuesta3 = Datos::ultimoProductModel("products");
					$datosController2 = array("user"=>$_SESSION['id'],'cantidad'=>$_POST['stocktxt'],'producto'=>$respuesta3['id'],"note"=>$_SESSION['nombre_usuario']." agrego/compro ","reference"=>$_POST['referenciatxt']);
					$respuesta2 = Datos::insertarHistorialModel($datosController2,"historial");
					echo '
						<div class="col-md-6 mt-3">
							<div clas="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">X</button>
								<h5>
									<i class="icon fas fa-check"></i>
									!Éxito!
								</h5>
								Producto agregado con éxito.
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
                                Se ha producido un error al momento de agregar el producto, trate de nuevo.
                            </div>
                        </div>
                    ';
				}
			}
		}

		public function editarProductController(){
			$datosController = $_GET['idProdcutEditar'];
			$respuesta = Datos::editarProductModel($datosController,"products");
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-warning">
					<div class="card-header">
						<h4><b>Editor</b> de Productos</h4>
					</div>
					<div class="card-body">
						<form method="post" action="index.php?action=inventario">
							<div class="form-group">
								<input type="hidden" name="idProductEditar" class="form-group" value="<?php echo $respuesta['id'];?>" required>
							</div>


							<div class="form-group">
								<label for="referenciatxteditar">Motivo: </label>
								<input type="text" name="referenciatxteditar" class="form-group" value="<?php echo $respuesta['referenciatxteditar'];?>" required placeholder="Referencia del producto">
							</div>

							<div class="form-group">
								<label for="categoríaeditar">Categoría: </label>
								<select name="categoriaeditar" id="categoriaeditar" class="form-group">
									<?php
										$respuesta_categoria = Datos::obtenerCategoriaModel("categories");
										foreach($respuesta_categoria as $row => $item){
											?>
												<option value="<?php echo $item['id'];?>"><?php echo $item['nombre'];?></option>
											<?php
										}
									?>
								</select>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		public function actualizarProductController(){
			if(isset($_POST['codigotxteditar'])){
				$datosController = array('id'=>$_POST['idProductEditar'],'codigo'=>$_POST['codigotxteditar'],
										'precio'=>$_POST['preciotxteditar'],'stock'=>$_POST['stocktxteditar'],
										'categoria'=>$_POST['categoriaeditar'],'nombre'=>$_POST['nombretxteditar']);

				$respuesta = Datos::actualizarProductModel($datosController,"products");
				if($respuesta == "success"){
					$datosController2 = array("producto"=>$_POST['idProductEditar'],"note"=>$_SESSION['nombre_usuario']. " agrego/compro","reference"=>$_POST['referenciatxteditar']);
					$respuesta2=Datos::insertarHistorialModel($datosController2,"historial");
					echo '
						<div class="col-md-6 mt-3">
							<div clas="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">X</button>
								<h5>
									<i class="icon fas fa-check"></i>
									!Éxito!
								</h5>
								Producto agregado con éxito.
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
                                Se ha producido un error al momento de agregar el producto, trate de nuevo.
                            </div>
                        </div>
                    ';
				}
			}
		}

		public function addProductController(){
			$datosController = $_GET['idProductAdd'];
			$respuesta = Datos::editarProductModel($datosController,"products");
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-warning">
					<div class="card-header">
						<h4><b>Agregar</b> stock al producto</h4>
					</div>
					<div class="card-body">
						<form action="index.php?Action=inventario" method="post">

							<div class="form-group">
								<input type="hidden" name="idProductAdd" id="idProductAdd" value="<?php echo $respuesta['id'];?>" required>
							</div>

							<div class="form-group">
								<label for="stocktxtadd">Stock: </label>
								<input type="text" name="stocktxtadd" id="stocktxtadd" class="form-group" required placeholder="Stock del producto">
							</div>

							<div class="form-group">
								<label for="referenciatxtadd">Motivo: </label>
								<input type="text" name="referenciatxtadd" id="referenciatxtadd" class="form-group" required placeholder="Referencia del producto">
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php
		}
		public function actualizar1StockController(){
			$datosController = array('id' => $_POST["idProductAdd"],'stock' => $_POST["addstocktxt"]);
			$respuesta = Datos::pushProductsModel($datosController,"products");
			if ($respuesta == "success") {
				$datosController2 = array('user' => $_SESSION["id"],"cantidad" => $_POST["addstocktxt"],"producto" => $_POST["idProductAdd"],"note"=>$_SESSION["nombre_usuario"]."agrego/compro","reference"=>$_POST["referenciatxtadd"]);
				$respuesta2 = Datos::insertarHistorialModel($datoscontroller2,"historial");
				echo '
						<div class="col-md-6 mt-3">
							<div clas="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">X</button>
								<h5>
									<i class="icon fas fa-check"></i>
									!Éxito!
								</h5>
								Producto agregado con éxito.
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
                                Se ha producido un error al momento de agregar el producto, trate de nuevo.
                            </div>
                        </div>
                    ';
				}
			}
			public function actualizar2StockController(){
			$datosController = array('id' => $_POST["idProductDel"],'stock' => $_POST["delstocktxt"]);
			$respuesta = Datos::pushProductsModel($datosController,"products");
			if ($respuesta == "success") {
				$datosController2 = array('user' => $_SESSION["id"],"cantidad" => $_POST["addstocktxt"],"producto" => $_POST["idProductAdd"],"note"=>$_SESSION["nombre_usuario"]."agrego/compro","reference"=>$_POST["referenciatxtdel"]);
				$respuesta2 = Datos::insertarHistorialModel($datoscontroller2,"historial");
				echo '
						<div class="col-md-6 mt-3">
							<div clas="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">X</button>
								<h5>
									<i class="icon fas fa-check"></i>
									!Éxito!
								</h5>
								Stock modificado con exito.
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
                                Se ha producido un error al momento de eliminar el producto, trate de nuevo.
                            </div>
                        </div>
                    ';
				}
			}
			public function delProductController(){
			$datosController = $_GET['idProductDel'];
			$respuesta = Datos::editarProductModel($datosController,"products");
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-warning">
					<div class="card-header">
						<h4><b>Eliminar</b> stock al producto</h4>
					</div>
					<div class="card-body">
						<form action="index.php?Action=inventario" method="post">
							<div class="form-group">
								<input type="hidden" name="idProductAdd" id="idProductAdd" value="<?php echo $respuesta['id'];?>" required>
							</div>

							<div class="form-group">
								<label for="codigotxteditar">Stock: </label>
								<input type="number" name="delstocktxt" id="delstocktxt" class="form-group" required placeholder="Stock del producto" min="1" max="<?php echo $respuesta["stock"]; ?>" value="<?php echo $respuesta["stock"]; ?>" requierd placeholder="Stock de producto">
							</div>

							<div class="form-group">
								<label for="referenciatxtdel">Motivo: </label>
								<input type="text" name="referenciatxtdel" id="referenciatxtdel" class="form-group" required placeholder="Referencia del producto">
							</div>
							<button class="btn btn-primary" type="submit">Realizar Cambio</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		public function vistaHistorialController(){
			$respuesta = Datos::vistaHistoriaModel("historial");
			foreach ($respuesta as $row => $item) {
				echo '<tr>
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

		public function vistaCategoriesController(){
		$respuesta = Datos::vistaHistoriaModel("historial");
			foreach ($respuesta as $row => $item) {
				echo '<tr>
						<td>
						<a href="index.php?action=categorias&idCategoryEditar='.$item[idc].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
						</td>
						<td>
						<a href="index.php?action=categorias&idCategoryEditar='.$item[idc].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
						</td>
						<td>'.$item["idc"].'</td>
						<td>'.$item["ncategoria"].'</td>
						<td>'.$item["dcategoria"].'</td>
						<td>'.$item["fcategoria"].'</td>
					</tr>';
			}
		}
		public function registrarCategoryController(){
		?>
			<div class="col-md-6 mt-3">
				<div class="card card-warning">
					<div class="card-header">
						<h4><b>Registro</b> de Categorías</h4>
					</div>
					<div class="card-body">
						<form action="index.php?Action=inventario" method="post">
							<div class="form-group">
								<label for="ncategoriatxt">Nombre de la categoría:</label>
								<input type="text" name="ncategoriatxt" id="ncategoriatxt" placeholder="Ingrese el nombre de la categoría">
							</div>
							<div class="form-group">
								<label for="dcategoriatxt">Stock: </label>
								<input type="number" name="dcategoriatxt" id="dcategoriatxt" class="form-group" required  placeholder="Ingrese la descripción de la categoria">
							</div>
							<button class="btn btn-primary" type="submit">Agregar</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}
    }
?>

