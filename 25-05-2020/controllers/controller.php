<?php
include_once "models/crud.php";
include_once "models/crudProd.php";

	class MvcController{
		
		//llama la plantilla
		public static function pagina(){
			include "views/template.php";
		}

		//enlace a paginas
		public static function enlacesPaginasController(){
			if (isset($_GET['action'])) {
				$enlaces = $_GET['action'];
			}else{
				$enlaces = 'index';
			}
			//es el momento en que el controlador invoca al modelo llamado enlacesPaginasModel para que muestre el listado de paginas
			$respuesta = Paginas::enlacesPaginasModel($enlaces);
			include $respuesta;
		}

		//registro de usuariops
		public static function registroUsuarioController(){
			if(isset($_POST["usuarioRegistro"])){

                //recibe a traves del metodo post el name de usuario, password e emial y se almacenan los datos en una variable o propiedad de tipo array asociativo cpn sus respectivas propiedades
                $datosController = array("usuario"=>$_POST["usuarioRegistro"],
                                          "password"=>$_POST["passwordRegistro"],
                                          "email"=>$_POST["emailRegistro"]);

				//Se mandan los datos al modelo 
                $respuesta = Datos::registroUsuarioModel($datosController,"usuarios");

                //se imprime la respuesta en la vista
                if($respuesta == "success"){
                    header("location:index.php?action=ok");
                }
                else{
                    header("location:index.php");
                    echo "error";
                }
           
            }
		}

		//registro de productos
		public static function registroProductoController(){
			if(isset($_POST["productoRegistro"])){

                //recibe a traves del metodo post el name de nombre, descripcion, pv, pc e invetnario y se almacenan los datos en una variable o propiedad de tipo array asociativo cpn sus respectivas propiedades
                $datosController = array("nombre"=>$_POST["productoRegistro"],
                                          "descripcion"=>$_POST["descripcionRegistro"],
                                          "pv"=>$_POST["pvRegistro"],
                                          "pc"=>$_POST["pcRegistro"],
                                          "inventario"=>$_POST["inventarioRegistro"]);
                 //Se mandan los datos al modelo 
                $respuesta = Datos2::registroProductoModel($datosController,"productos");
                //se imprime la respuesta en la vista
                if($respuesta == "success"){
                    header("location:index.php?action=okproduct");
                }
                else{
                    header("location:index.php");
                }
           
            }
		}

		//registro de categorias
		public static function registroCategoriaController(){
			if(isset($_POST["categoriaRegistro"])){

                //recibe a traves del metodo post el name de nombre y se almacenan los datos en una variable o propiedad de tipo array asociativo cpn sus respectivas propiedades
                $datosController = array("nombre"=>$_POST["categoriaRegistro"]);
                 
                 //Se mandan los datos al modelo 
                $respuesta = Datos2::registroCategoriaModel($datosController,"categorias");

                //se imprime la respuesta en la vista
                if($respuesta == "success"){
                    header("location:index.php?action=okcategoria");
                }
                else{
                    header("location:index.php");
                }
           
            }
		}

		//ingreso usuario
		public static function ingresoUsuarioController(){
			if (isset($_POST["usuarioIngreso"])){
				$datosController=array ("usuario" => $_POST["usuarioIngreso"],
										 "password" => $_POST["passwordIngreso"]);
				$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

				//Validar la respuesta del modelo para ver si es un usuario correcto.
				if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){
					session_start();
					$_SESSION["validar"] = true;
					header("location:index.php?action=usuarios");
				}else{
					header(".ocation: index.php?action=fallo");
				}

			}
		}

		//vista de usuarios
		public static function vistaUsuariosController(){
			$respuesta = Datos:: vistaUsuariosModel("usuarios");
			//Utilizar un foreach para iterar un array e imprimir la consulta del modelo

			foreach ($respuesta as $row => $item) {
				echo'<tr>
						<td>'.$item["usuario"].'</td>
						<td>'.$item["password"].'</td>
						<td>'.$item["email"].'</td>
						<td><a href="index.php?action=editar&id='.$item["id"].
						'"><button>Editar</button></a></td>
						<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].
						'"><button>Borrar</button></a></td>';
			}
		}

		//vista de productos
		public static function vistaProductosController(){
			$respuesta = Datos2:: vistaProductosModel("productos");
			//Utilizar un foreach para iterar un array e imprimir la consulta del modelo

			foreach ($respuesta as $row => $item) {
				echo '<tr>
					<td>'.$item["nombre"].'</td>
					<td>'.$item["descripcion"].'</td>
					<td>'.$item["pv"].'</td>
					<td>'.$item["pc"].'</td>
					<td>'.$item["inventario"].'</td>
					<td><a href="index.php?action=editarProducto&id='.$item["id"].
					'"><button>Editar</button></a></td>
					<td><a href="index.php?action=producto&idBorrar='.$item["id"].
					'"><button>Borrar</button></a></td>';
			}
		}

		public static function registrarUserController(){
		?>
			<div class="col-md6 mt-5">
				<div class="card card-primary">
				<div class="card card-header">
					<h4><b>Registro</b>de Usuarios</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="index.php?action=usuarios">
						<div class="form-group">
							<label for="nusuariotxt">Nombre:</label>
							<input type="text" name="nusuariotxt" id="nusuariotxt" placeholder="Ingrese el nombre" required="">
						</div>

						<div class="form-group">
							<label for="ausuariotxt">Apellido:</label>
							<input type="text" name="ausuariotxt" id="ausuariotxt" placeholder="Ingrese el Apellido" required="">
						</div>
						<div class="form-group">
							<label for="usuariotxt">Usuario:</label>
							<input type="text" name="usuariotxt" id="usuariotxt" placeholder="Ingrese el Usuario" required="">
						</div>
						<div class="form-group">
							<label for="ucontratxt">Contraseña:</label>
							<input type="password" name="ucontratxt" id="ucontratxt" placeholder="Ingrese la contraseña" required="">
						</div>
						<div class="form-group">
							<label for="uemailtxt">Correo Electrónico:</label>
							<input type="password" name="uemailtxt" id="uemailtxt" placeholder="Ingrese la contraseña" required="">
						</div>
						<button class="btn btn-primary" type="submit">Agregar</button>
					</form>
					</div>
				</div>
			</div>
			<?php
		}

		public function isertarUserController(){
			if (isset($_POST['nusuariotxt'])) {
				# Encriptar contra
				$_POST["ucontratxt"] = password_hash($_POST["ucontratxt"], PASSWORD_DEFAULT);
				$datosController = array("nusuariotxt"=>$_POST["nusuariotxt"],"ausuariotxt"=>$_POST["ausuariotxt"],"usuario"=>$_POST["usuariotxt"],"contra"=>$_POST["ucontratxt"],"email"=>$_POST["uemailtxt"]);
				$respuesta = Datos::insertarUserModel($datosController,"users");
				if ($respuesta == "success") {
					echo 'Bien'
				}else{
					echo "Mal";
				}
			}
		}

		public function editarUserController() {
            $datosController = $_GET["idUserEditar"];
            //envío de datos al mododelo
            $respuesta = Datos::editarUserModel($datosController,"users");
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

        public function actualizarUserController(){
        	if (isset($_POST['nusuariotxtEditar'])) {
				# Encriptar contra
				$_POST["ucontratxt"] = password_hash($_POST["ucontratxt"], PASSWORD_DEFAULT);
				$datosController = array("nusuariotxt"=>$_POST["nusuariotxt"],"ausuariotxt"=>$_POST["ausuariotxt"],"usuario"=>$_POST["usuariotxt"],"contra"=>$_POST["ucontratxt"],"email"=>$_POST["uemailtxt"]);
				$respuesta = Datos::insertarUserModel($datosController,"users");
				if ($respuesta == "success") {
					echo 'Bien'
				}else{
					echo "Mal";
				}
			}
        }

//============================================================================================================
		//vista de categorias
		public static function vistaCategoriasController(){
			$respuesta = Datos2:: vistaCategoriasModel("categorias");
			//Utilizar un foreach para iterar un array e imprimir la consulta del modelo

			foreach ($respuesta as $row => $item) {
				echo '<tr>
					<td>'.$item["nombre"].'</td>
					<td><a href="index.php?action=editarCategoria&id='.$item["id"].
					'"><button>Editar</button></a></td>
					<td><a href="index.php?action=categorias&idBorrar='.$item["id"].
					'"><button>Borrar</button></a></td>';
			}
		}

		//editar categorias
		public static function editarUsuarioController(){
			$datosController = $_GET["id"];
			$respuesta=Datos::editarUsuarioModel($datosController,"usuarios");

			//Diseñar la estructura de un formulario para que se muestren losdatos de la consulta generada en el modelo
			echo ' <input type="hidden" value="'.$respuesta["id"].'" name="idEditar" required>
			<input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>
			<input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>
			<input type="text" value="'.$respuesta["email"].'" name="emailEditar" required>
			<input type="submit" value="Confirmar">';
		}

		//editar producto
		public static function editarProductoController(){
			$datosController = $_GET["id"];
			$respuesta=Datos2::editarProductoModel($datosController,"productos");

			//Diseñar la estructura de un formulario para que se muestren losdatos de la consulta generada en el modelo
			echo ' <input type="hidden" value="'.$respuesta["id"].'" name="idEditar" required>
			<input type="text" value="'.$respuesta["nombre"].'" name="productoEditar" required>
			<input type="text" value="'.$respuesta["descripcion"].'" name="descripcionEditar" required>
			<input type="number" value="'.$respuesta["pv"].'" name="pvEditar" required>
			<input type="number" value="'.$respuesta["pc"].'" name="pcEditar" required>
			<input type="number" value="'.$respuesta["inventario"].'" name="inventarioEditar" required>
			<input type="submit" value="Confirmar">';
		}

		//editar categoria
		public static function editarCategoriaController(){
			$datosController = $_GET["id"];
			$respuesta=Datos2::editarCategoriaModel($datosController,"categorias");

			//Diseñar la estructura de un formulario para que se muestren losdatos de la consulta generada en el modelo
			echo ' <input type="hidden" value="'.$respuesta["id"].'" name="idEditar" required>
			<input type="text" value="'.$respuesta["nombre"].'" name="categoriaEditar" required>
			<input type="submit" value="Confirmar">';
		}

		//actualizar usuario
		public static function actualizarUsuarioController(){
			if (isset($_POST["usuarioEditar"])) {
				$datosController=array("id"=>$_POST["idEditar"],
										"usuario"=>$_POST["usuarioEditar"],
										"password"=>$_POST["passwordEditar"],
										"email"=>$_POST["emailEditar"]);
				$respuesta=Datos::actualizarUsuarioModel($datosController,"usuarios");

				if($respuesta == "success"){
					header("location: index.php?action=cambio");
				}else{
					echo "error";
				}
			}
		}

		//actualizar producto
		public static function actualizarProductoController(){
			if (isset($_POST["productoEditar"])) {
				$datosController=array("id"=>$_POST["idEditar"],
										"nombre"=>$_POST["productoEditar"],
										"descripcion"=>$_POST["descripcionEditar"],
										"pv"=>$_POST["pvEditar"],
										"pc"=>$_POST["pcEditar"],
										"inventario"=>$_POST["inventarioEditar"]);
				$respuesta=Datos2::actualizarProductoModel($datosController,"productos");

				if($respuesta == "success"){
					header("location: index.php?action=cambioproduct");
				}else{
					echo "error";
				}
			}
		}

		//actualizar categoria
		public static function actualizarCategoriaController(){
			if (isset($_POST["categoriaEditar"])) {
				$datosController=array("id"=>$_POST["idEditar"],
										"nombre"=>$_POST["categoriaEditar"]);
				$respuesta=Datos2::actualizarCategoriaModel($datosController,"categorias");

				if($respuesta == "success"){
					header("location: index.php?action=cambiocategoria");
				}else{
					echo "error";
				}
			}
		}

		//borrar usuario
		public static function borrarUsuarioController(){

			if(isset($_GET["idBorrar"])){
				$datosController = $_GET["idBorrar"];
				$respuesta=Datos::borrarUsuarioModel($datosController,"usuarios");
				if ($respuesta=="success") {
					header("location: index.php?action=usuarios");
				}
			}
		}

		//borrar producto
		public static function borrarProductoController(){
			if(isset($_GET["idBorrar"])){
				$datosController = $_GET["idBorrar"];
				$respuesta=Datos2::borrarProductoModel($datosController,"productos");
				if ($respuesta=="success") {
					header("location: index.php?action=producto");
				}
			}
		}

		//borrar categoria
		public static function borrarCategoriaController(){
			if(isset($_GET["idBorrar"])){
				$datosController = $_GET["idBorrar"];
				$respuesta=Datos2::borrarCategoriaModel($datosController,"categorias");
				if ($respuesta=="success") {
					header("location: index.php?action=categorias");
				}
			}
		}

	}

		//LISTA DE METODOS DE MODELOS A DESARROLLAR
		/*
		1. registroUsuarioModel --
		2. ingresarUsuarioModel --
		3. vistaUsuarioModel --
		4. editarUsuarioModel --
		5. actualizarUsuarioModel --
		6. borrarUsuarioModel --
		3. actualizarUsuarioModel --
		*/
?>