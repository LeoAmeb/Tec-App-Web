<?php
  //include ('./modulos/backend/conexion.php');
  session_start();
  if (isset($_SESSION['username']) && $_SESSION['username']!='') {
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include "./includes/icono.html" ?>

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="../vendors/jquery/dist/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            <title>Video Juegos</title>
            <?php include "./includes/header.html" ?>
        </head>

        <body class="nav-md">
            <div class="container body">
                <div class="main_container">
                    <div class="col-md-3 left_col">
                        <?php include "./includes/navbar.html" ?>
                    </div>

                    <?php include "./includes/top-navigation.html" ?>

                        <!-- page content -->
                        <div class="right_col" role="main">
                            <div class="">
                                <div class="page-title">
                                    <div class="title_left">
                                        <h3>Video Juegos</h3>
                                    </div>

                                    <div class="title_right">
                                        <div class="col-md-5 col-sm-5  form-group pull-right top_search">

                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-12 col-sm-6">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2> Video Juegos</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModalLong">
                                                    Registrar Video Juegos
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Registrar Video Juegos</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- contenido de modal Registrar consola -->
                                                                <form>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="col-form-label">Titulo:</label>
                                                                        <input type="text" class="form-control" id="tituloGames">
                                                                    </div>
                                                                    <div class="form-group">
                                                                     <label for="file">Seleccionar imagen</label>
                                                                        <input id='imagenGame' type="file" name="file">
                                                                        <p class="help-block">Solo archivos jpg, jpeg, png and gif con un tamaño máximo de 1 MB.</p>
                                                                    </div>

                                                                </form>
                                                                <!-- contenido de modal Registrar consola -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelarConsola">Cancelar</button>
                                                                <button onclick="agregarJuego()" type="button" class="btn btn-success" id="guardarConsola">Guardar Registro</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Actualizar -->
                                                <div id="ModalActualizar"></div>


                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">Settings 1</a>
                                                        <a class="dropdown-item" href="#">Settings 2</a>
                                                    </div>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">

                                            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" onclick="videogamesVista()">Vista</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#table" role="tab" aria-controls="profile" aria-selected="false" onclick="videogamesTable()">Tabla</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="row" id="VideogamesVista">

                                                        <?php //include "./modulos/frontend/F_gamers.php"?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="table" role="tabpanel" aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        <?php include "./modulos/frontend/F_tablaVideogames.php"?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /page content -->

                        <!-- footer content -->
                        <footer>
                            <?php include "./includes/footer.html" ?>
                        </footer>
                        <!-- /footer content -->
                </div>
            </div>

            <?php include "./includes/scripts.html" ?>
        </body>
        <script>
            $.ajax({
                url: 'modulos/backend/B_videogames.php',
                type: 'GET',
                success: function(r) {
                    $('#VideogamesVista').html(r);
                }
            });
            function videogamesVista(){
                $.ajax({
                    url: 'modulos/backend/B_videogames.php',
                    type: 'GET',
                    success: function(r) {
                        $('#VideogamesVista').html(r);
                    }
                });
            }
            function videogamesTable(){
                $.ajax({
                    url: './modulos/backend/B_tablaVideogames.php',
                    type: 'GET',
                    success: function (r) {
                        $('#tablaVideogames').html(r);
                    }
                });
            }
            function agregarJuego(){
                var tituloGames = $('#tituloGames').val();
                var imagen = $('#imagenGame').val().split('\\').pop();
                
                if(tituloGames!='' && imagen!=''){
                    $.ajax({
                        url: './modulos/backend/B_nuevoVideogame.php',
                        data: {
                            tituloGamesV: tituloGames,
                            imagenV: imagen
                            },
                        type: 'POST',
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Video Juego Creado',
                                text: 'Video Juego Correctamente.'
                            });
                            videogamesVista();
                            videogamesTable();
                        }
                    });
                }else{
                    Swal.fire(
                      'Ingrese todos los datos',
                      'Porfavor ingresa todos los datos',
                      'question'
                    )
                }
            }
            function btnActualizar(id){
                var idModal = '#actualizarGame' + id;
                $(idModal).modal('show');
            }
            function btnActualizarT(id){
                var idModal = '#actualizarGameT' + id;
                $(idModal).modal('show');
            }
            function actualizarJuego(id){
                var idModal = '#actualizarGame' + id;
                var idtituloGamesActualizar = '#tituloGamesActualizar' + id;
                var tituloGamesActualizar = $(idtituloGamesActualizar).val();
                var idimagenActualizar = '#imagenGameActualizar' + id;
                var imagenActualizar = $(idimagenActualizar).val().split('\\').pop();
                var idVal = id;

                if(tituloGamesActualizar!='' && imagenActualizar!=''){
                    $.ajax({
                        url: './modulos/backend/B_actualizarVideogame.php',
                        data: {
                            idV: idVal,
                            tituloGamesActualizarV: tituloGamesActualizar,
                            imagenActualizarV: imagenActualizar
                            },
                        type: 'POST',
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Video Juego Actualizado',
                                text: 'Video Juego Correctamente.'
                            });
                            videogamesVista();
                            videogamesTable();
                            $(idModal).modal('hide');
                        }
                    });
                }else{
                    Swal.fire(
                      'Ingrese todos los datos',
                      'Porfavor ingresa todos los datos',
                      'question'
                    )
                }
            }
            function actualizarJuegoT(id){
                var idModal = '#actualizarGameT' + id;
                var idtituloGamesActualizar = '#tituloGamesActualizarT' + id;
                var tituloGamesActualizar = $(idtituloGamesActualizar).val();
                var idimagenActualizar = '#imagenGameActualizarT' + id;
                var imagenActualizar = $(idimagenActualizar).val().split('\\').pop();
                var idVal = id;

                if(tituloGamesActualizar!='' && imagenActualizar!=''){
                    $.ajax({
                        url: './modulos/backend/B_actualizarVideogame.php',
                        data: {
                            idV: idVal,
                            tituloGamesActualizarV: tituloGamesActualizar,
                            imagenActualizarV: imagenActualizar
                            },
                        type: 'POST',
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Video Juego Actualizado',
                                text: 'Video Juego Correctamente.'
                            });
                            videogamesVista();
                            videogamesTable();
                            $(idModal).modal('hide');
                        }
                    });
                }else{
                    Swal.fire(
                      'Ingrese todos los datos',
                      'Porfavor ingresa todos los datos',
                      'question'
                    )
                }
            }
            function btnEliminar (id){
                var idEliminar = id;
                Swal.fire({
                  title: 'Estas seguro que deseas eliminar?',
                  text: "No podras revertirlo!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#2CC11D',
                  confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                  if (result.value) {
                    $.ajax({
                        url: './modulos/backend/B_eliminarVideogame.php',
                        data: {
                            idEliminarV: idEliminar
                        },
                        type: 'POST',
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Video Juego Eliminado',
                                text: 'Video Juego Eliminado Correctamente.'
                            });
                            videogamesVista();
                            videogamesTable();
                        }
                    });
                  }
                })
            }
        </script>

    </html>
    <?php
  }else{
    header("Location: ../index.php");
  }
 ?>