<?php
  //$variable = $_GET['var'];
  //include ('./modulos/backend/conexion.php');
  //include ('./modulos/backend/selectDietas.php');
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <title>Consolas</title>
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
                                    <h3>Consolas y Plataformas</h3>
                                </div>

                                <div class="title_right">
                                    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-12 col-sm-12 ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Consolas y Plataformas</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            

                                  <!--<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#juegoconsole">
                                      Modal de Juego en consola
                                  </button>-->




                                   <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModalLong">
                                      Registrar Consola
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Registrar Consola</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <!-- contenido de modal Registrar consola -->
                                               <form>
                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Numero de consola:</label>
                                                    <input type="number" class="form-control" id="numConsola">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Serial</label>
                                                    <input type="text" class="form-control" id="serial">
                                                  </div>
                                                    <div class="form-group">
                                                    <label for="inputState">Plataforma</label>
                                                        <select id="plataforma" class="form-control">
                                                            <?php //include 'modulos/backend/B_listaPlatforms.php'; ?>
                                                        </select>
                                                    </div>
                                                </form>
                                            <!-- contenido de modal Registrar consola -->
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelarConsola">Cancelar</button>
                                            <button type="button" onclick="agregarConsola()" class="btn btn-success" id="guardarConsola">Guardar Registro</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- Modal registro de plataforma -->
                                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modalPlataforma">
                                      Registrar Plataforma
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalPlataforma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Registrar Plataforma</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <!-- contenido de modal Registrar plataforma -->
                                               <form>
                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombrePlatform">
                                                  </div>
                                                  <div class="form-group">

                                                 <label for="file">Seleccionar imagen</label>
                                                    <input id="imagenPlatform" type="file" name="FileImage">
                                                    <p class="help-block">Solo archivos jpg,jpeg,png and gif con un tamaño máximo de 1 MB.</p>
                                                  </div>
                                                </form>
                                            <!-- contenido de modal Registrar consola -->
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelarConsola">Cancelar</button>
                                            <button onclick="agregarPlataforma()" type="button" class="btn btn-success" id="guardarConsola">Guardar Registro</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" onclick="tablaConsoles()" aria-selected="true">Consolas</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" onclick="tablaPlatforms()" aria-selected="false">Plataformas</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="row" id="ConsolesVista">


                                                    <?php //include "./modulos/frontend/F_consoles.php"?>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="row" id="PlatformsVista">
                                                    <?php //include "./modulos/frontend/F_tablaDietas.php"?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /page content -->
                        </div>
                    </div>
                    <!-- footer content -->
                    <footer>
                        <?php include "./includes/footer.html" ?>
                    </footer>
                    <!-- /footer content -->
            </div>
        </div>
        <?php include "./includes/scripts.html" ?>
        <?php include "./modulos/frontend/PruebaModal.php"?>
    </body>
    <script>
        $.ajax({
            url: 'modulos/backend/B_tablaConsoles.php',
            type: 'GET',
            success: function (r) {
                $('#ConsolesVista').html(r);
            }
        });
        $.ajax({
            url: 'modulos/backend/B_listaPlatforms.php',
            type: 'GET',
            success: function (r) {
                $('#plataforma').html(r);
            }
        });
        function tablaConsoles(){
          $.ajax({
              url: 'modulos/backend/B_tablaConsoles.php',
              type: 'GET',
              success: function (r) {
                  $('#ConsolesVista').html(r);
              }
          });
        }
        function tablaPlatforms(){
          $.ajax({
              url: 'modulos/backend/B_tablaPlatforms.php',
              type: 'GET',
              success: function (r) {
                  $('#PlatformsVista').html(r);
              }
          });
        }
        function listaVideogamesTableInsert(idC){
          var idVideogame = '#videogames' + idC;
          var Videogameid = $(idVideogame).val();
          
          $.ajax({
              url: 'modulos/backend/B_listTablaVideogamesInsert.php',
              type: 'POST',
              data:{
                idConsola: idC,
                idVideogame: Videogameid
              },
              success: function (r) {
                listaVideogamesTable(idC);
              }
          });
        }
        function listaVideogamesTableDelete(idC, idV){

          $.ajax({
              url: 'modulos/backend/B_listTablaVideogamesDelete.php',
              type: 'POST',
              data:{
                idConsola: idC,
                idVideogame: idV
              },
              success: function (r) {
                listaVideogamesTable(idC);
              }
          });
          
        }
        function listaVideogamesTable(id){
            var idTable ='#tablaVideogamesConsole' + id;
                $.ajax({
                    url: './modulos/backend/B_listTablaVideogames.php',
                    type: 'POST',
                    data: {
                      idV: id
                    },
                    success: function (r) {
                        $(idTable).html(r);
                    }
                });
            }
        function listaVideogames(id){
          var idSelect ='#videogames' + id;
          $.ajax({
              url: 'modulos/backend/B_listaVideogames.php',
              type: 'GET',
              success: function (r) {
                  $(idSelect).html(r);
              }
          });
        }
        function btnVerConsola(id){
          var idModal = '#juegoconsole' + id;
          $(idModal).modal('show');
        }
        function btnActualizarConsola(id){
                var idModal = '#modalActualizarConsola' + id;
                $(idModal).modal('show');
            }
            function actualizarConsola(id){
                var idModal = '#modalActualizarConsola' + id;
                var idnumConsola = '#numConsola' + id;
                var numConsola = $(idnumConsola).val();
                var idserial = '#serial' + id;
                var serial = $(idserial).val();
                var idplataforma = '#plataforma' + id;
                var plataforma = $(idplataforma).val();
                var idVal = id;

                if(numConsola != '' && serial != '' && plataforma != ''){
                    $.ajax({
                        url: './modulos/backend/B_actualizarConsola.php',
                        data: {
                            idV: idVal,
                            numConsolaV: numConsola,
                            serialV: serial,
                            plataformaV: plataforma
                        },
                        type: 'POST',
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Consola Actualizada',
                                text: 'Consola Actualizada Correctamente.'
                            });
                            tablaConsoles();
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
        function agregarConsola(){
            var datos = false;
            var numConsola = $('#numConsola').val();
            var serial = $('#serial').val();
            var plataforma = $('#plataforma').val();
            if(numConsola!=''&&serial!=''&&plataforma!=''){
                datos=true;
            }else{
                Swal.fire(
                  'Ingresa todos los campos necesarios',
                  'Porfavor ingresa los campos necesarios',
                  'question'
                )
            }
            if(datos){
                $.ajax({
                    url: './modulos/backend/B_nuevaConsola.php',
                    data: {
                        numConsolaV: numConsola,
                        serialV: serial,
                        plataformaV: plataforma
                        },
                    type: 'POST',
                    success: function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'Consola Creada',
                            text: 'Consola Creada Correctamente.'
                        });
                        tablaConsoles();
                    }
                });
            }
        }
        /*
        var nombreImg;
        $('#imagenPlatform').change(function(){    
                //on change event  
                nombreImg = new FormData();
                if($(this).prop('files').length > 0)
                {
                    file = $(this).prop('files')[0];
                    nombreImg.append("FileImage", file);
                    alert(nombreImg);
                }
            });*/
        function agregarPlataforma(){
            //var nombreImg = new FormData();
            var nombrePlatform = $('#nombrePlatform').val();
            var nombreImagen = $('#imagenPlatform').val().split('\\').pop();
            alert(nombreImagen);
            //var nombreImg = $('#imagenPlatform').val().split('\\').pop();
            
            //alert("2: "+nombreImg);

            if(nombrePlatform!='' && nombreImagen!=''){
                    $.ajax({
                        url: './modulos/backend/B_nuevaPlataforma.php',
                        type: 'POST',
                        data: {
                            nombrePlatformV: nombrePlatform,
                            //nombreImgV: nombreImg,
                            nombreImagenV: nombreImagen
                            },
                        //processData: false,
                        //contentType: false,
                        success: function (r) {
                          alert(r);
                            Swal.fire({
                                icon: 'success',
                                title: 'Plataforma Creada',
                                text: 'Plataforma Creada Correctamente.'
                            });
                            tablaPlatforms();
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
      function btnEliminarConsola (id){
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
                        url: './modulos/backend/B_eliminarConsole.php',
                        data: {
                            idEliminarV: idEliminar
                        },
                        type: 'POST',
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Consola Eliminada',
                                text: 'Consola Eliminada Correctamente.'
                            });
                            tablaConsoles();
                        }
                    });
                  }
                })
            }
            function btnEliminarPlataforma (id){
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
                        url: './modulos/backend/B_eliminarPlatform.php',
                        data: {
                            idEliminarV: idEliminar
                        },
                        type: 'POST',
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Plataforma Eliminada',
                                text: 'Plataforma Eliminada Correctamente.'
                            });
                            tablaPlatforms();
                        }
                    });
                  }
                })
            }
        function btnActualizarPlataforma(id){
          var idModal = '#actualizarPlataforma' + id;
          $(idModal).modal('show');
        }
        function actualizarPlataforma(id){
          var idModal = '#actualizarPlataforma' + id;
                var idtituloPlataformaActualizar = '#tituloPlataformaActualizar' + id;
                var tituloPlataformaActualizar = $(idtituloPlataformaActualizar).val();
                var idimagenPlataformaActualizar = '#imagenPlataformaActualizar' + id;
                var imagenPlataformaActualizar = $(idimagenPlataformaActualizar).val().split('\\').pop();
                var idVal = id;

                if(tituloPlataformaActualizar!='' && imagenPlataformaActualizar!=''){
                    $.ajax({
                        url: './modulos/backend/B_actualizarPlataforma.php',
                        data: {
                            idV: idVal,
                            tituloPlataformaActualizarV: tituloPlataformaActualizar,
                            imagenPlataformaActualizarV: imagenPlataformaActualizar
                            },
                        type: 'POST',
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Plataforma Actualizada',
                                text: 'Plataforma Actualizada Correctamente.'
                            });
                            tablaPlatforms();
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
    </script>

    </html>
    <?php
  }else{
    header("Location: ../index.php");
  }
 ?>