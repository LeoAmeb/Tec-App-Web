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
            <title>Tarifas y Costos</title>
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
                                        <h3>Tarifas y Costos</h3>
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
                                            <h2> Tarifas y Costos</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>

                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">

                                            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#consolas" role="tab" onclick="getConsoles()" aria-controls="home" aria-selected="true">Consolas</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="accesorios-tab" data-toggle="tab" href="#accesorios" role="tab" aria-controls="accesorios" aria-selected="false" onclick="getAccesorios()">Accesorios</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="promociones-tab" data-toggle="tab" href="#promociones" role="tab" aria-controls="promociones" aria-selected="false" onclick="getPromociones()">Promociones</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="consolas" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="row">
                                                        <!-- Cambiar por mi frontend para precios consolas-->
                                                        <?php include "./modulos/frontend/F_costoConsolas.php"?>
                                                    </div>
                                                </div>

                                                <!--  -->
                                                <div class="tab-pane fade" id="accesorios" role="tabpanel" aria-labelledby="accesorios-tab">
                                                    <div class="row">
                                                        <!-- Cambiar por mi frontend para precios accesorios-->
                                                        <?php include "./modulos/frontend/F_costoAccesorios.php"?>
                                                    </div>
                                                </div>

                                                <!--  -->
                                                <div class="tab-pane fade" id="promociones" role="tabpanel" aria-labelledby="promociones-tab">
                                                    <div class="row">

                                                        <!-- Cambiar por mi frontend para promociones-->
                                                        <?php include "./modulos/frontend/F_promociones.php"?>
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
                url: './modulos/backend/B_costoConsolas.php',
                type: 'GET',
                success: function(r) {
                    $('#tablaCostoConsolas').html(r);
                }
            });

            function getConsoles() {
                $.ajax({
                    url: './modulos/backend/B_costoConsolas.php',
                    type: 'GET',
                    success: function(r) {
                        $('#tablaCostoConsolas').html(r);
                    }
                });
            }
            
            function getPlatforms() {
                $.ajax({
                    url: './modulos/backend/B_plataforms2Costs.php',
                    type: 'GET',
                    success: function(r) {
                        $('#platforma').html(r);
                    }
                });
            }

            function getPromociones() {
                $.ajax({
                    url: './modulos/backend/B_promociones.php',
                    type: 'GET',
                    success: function(r) {
                        $('#tablaPromociones').html(r);
                    }
                });
            }

            function getAccesorios() {
                $.ajax({
                    url: './modulos/backend/B_costoAccesorios.php',
                    type: 'GET',
                    success: function(r) {
                        $('#tablaCostoAccesorios').html(r);
                    }
                });
            }
            //Consoles
            function btnActualizarCostConsola(id){
                var idModal = '#modalActualizarCostoConsola' + id;
                $(idModal).modal('show');
            }
            function actualizarCostConsola(id){
                var idModal = '#modalActualizarCostoConsola' + id;
                var idcostoHoraV = '#costoHora' + id;
                var costoHoraV = $(idcostoHoraV).val();
                var idcantidadHorasV = '#cantidadHoras' + id;
                var cantidadHorasV = $(idcantidadHorasV).val();
                var idmonedasJugadorV = '#monedasJugador' + id;
                var monedasJugadorV = $(idmonedasJugadorV).val();
                var idmonedasCostoV = '#monedasCosto' + id;
                var monedasCostoV = $(idmonedasCostoV).val();
                var idplatformaV = '#platforma' + id;
                var platformaV = $(idplatformaV).val();
                var idVal = id;

                if(costoHoraV != '' && cantidadHorasV != '' && monedasJugadorV != '' && monedasCostoV != '' && platformaV != ''){
                    $.ajax({
                        url: './modulos/backend/B_actualizarCostoConsola.php',
                        data: {
                            idV: idVal,
                            costoMXN: costoHoraV,
                            horas: cantidadHorasV,
                            coinsplayer: monedasJugadorV,
                            costCoin: monedasCostoV,
                            plataformaValor: platformaV
                        },
                        type: 'POST',
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Costo de Consola Actualizada',
                                text: 'Costo de Consola Actualizada Correctamente.'
                            });
                            getConsoles();
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
            function insertCostConsola() {
                var costoHoraV = $('#costoHora').val();
                var cantidadHorasV = $('#cantidadHoras').val();
                var monedasJugadorV = $('#monedasJugador').val();
                var monedasCostoV = $('#monedasCosto').val();
                var platformaV = $('#platforma').val();

                if (costoHoraV != '' && cantidadHorasV != '' && monedasJugadorV != '' && monedasCostoV != '' && platformaV != '') {

                    $.ajax({
                        url: './modulos/backend/B_insertCostoConsola.php',
                        type: 'POST',
                        data: {
                            costoMXN: costoHoraV,
                            horas: cantidadHorasV,
                            coinsplayer: monedasJugadorV,
                            costCoin: monedasCostoV,
                            plataformaValor: platformaV
                        },
                        success: function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Costo de Consola Creada',
                                text: 'Costo de Consola Creada Correctamente.'
                            });
                            getConsoles();
                        }
                    });
                } else {
                    Swal.fire(
                        'Ingrese todos los datos',
                        'Porfavor ingresa todos los datos',
                        'question'
                    )
                }
            }
            function btnEliminarConsole (id){
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
                        url: './modulos/backend/B_eliminarCostoConsola.php',
                        data: {
                            idEliminarV: idEliminar
                        },
                        type: 'POST',
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Costo de Consola Eliminado',
                                text: 'Costo de Consola Eliminado Correctamente.'
                            });
                            getConsoles();
                        }
                    });
                  }
                })
            }
            //Accesorios
            function btnActualizarAccesorios(id){
                var idModal = '#modalActualizarAccesorios' + id;
                $(idModal).modal('show');
            }
            function actualizarAccesorios(id){
                var idModal = '#modalActualizarAccesorios' + id;
                var idnombreAccesorioV = '#nombreAccesorio' + id;
                var nombreAccesorioV = $(idnombreAccesorioV).val();
                var idcostoAccesorioV = '#costoAccesorio' + id;
                var costoAccesorioV = $(idcostoAccesorioV).val();
                var idVal = id;

                if(nombreAccesorioV != '' && costoAccesorioV != ''){
                    $.ajax({
                        url: './modulos/backend/B_actualizarAccesorios.php',
                        data: {
                            idV: idVal,
                            nombreAccesorio: nombreAccesorioV,
                            costoAccesorio: costoAccesorioV
                        },
                        type: 'POST',
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Costo de Accesorios Actualizada',
                                text: 'Costo de Accesorios Actualizada Correctamente.'
                            });
                            getAccesorios();
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
            function insertCostAccesorios() {
                var nombreAccesorioV = $('#nombreAccesorio').val();
                var costoAccesorioV = $('#costoAccesorio').val();

                if (nombreAccesorioV != '' && costoAccesorioV != '') {

                    $.ajax({
                        url: './modulos/backend/B_insertAccesorio.php',
                        type: 'POST',
                        data: {
                            nombreAccesorio: nombreAccesorioV,
                            costoAccesorio: costoAccesorioV
                        },
                        success: function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Costo de Accesorio Creado',
                                text: 'Costo de Accesorio Creado Correctamente.'
                            });
                            getAccesorios();
                        }
                    });
                } else {
                    Swal.fire(
                        'Ingrese todos los datos',
                        'Porfavor ingresa todos los datos',
                        'question'
                    )
                }
            }
            function btnEliminarAccesorios (id){
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
                        url: './modulos/backend/B_eliminarCostoAccesorio.php',
                        data: {
                            idEliminarV: idEliminar
                        },
                        type: 'POST',
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Costo de Accesorio Eliminado',
                                text: 'Costo de Accesorio Eliminado Correctamente.'
                            });
                            getAccesorios();
                        }
                    });
                  }
                })
            }
            //Promociones
            function btnActualizarPromociones(id){
                var idModal = '#modalActualizarPromocion' + id;
                $(idModal).modal('show');
            }
            function actualizarPromociones(id){
                var idModal = '#modalActualizarPromocion' + id;
                var idnombrePromoV = '#nombrePromo' + id;
                var nombrePromoV = $(idnombrePromoV).val();
                var iddescripcionPromoV = '#descripcionPromo' + id;
                var descripcionPromoV = $(iddescripcionPromoV).val();
                var idVal = id;

                if(nombrePromoV != '' && descripcionPromoV != ''){
                    $.ajax({
                        url: './modulos/backend/B_actualizarPromociones.php',
                        data: {
                            idV: idVal,
                            nombrePromo: nombrePromoV,
                            descripcionPromo: descripcionPromoV
                        },
                        type: 'POST',
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Costo de Promociones Actualizada',
                                text: 'Costo de Promociones Actualizada Correctamente.'
                            });
                            getPromociones();
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
            function insertPromociones() {
                var nombrePromoV = $('#nombrePromo').val();
                var descripcionPromoV = $('#descripcionPromo').val();

                if (nombrePromoV != '' && descripcionPromoV != '') {

                    $.ajax({
                        url: './modulos/backend/B_insertPromocion.php',
                        type: 'POST',
                        data: {
                            nombrePromo: nombrePromoV,
                            descripcionPromo: descripcionPromoV
                        },
                        success: function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Costo de Promocion Creado',
                                text: 'Costo de Promocion Creado Correctamente.'
                            });
                            getPromociones();
                        }
                    });
                } else {
                    Swal.fire(
                        'Ingrese todos los datos',
                        'Porfavor ingresa todos los datos',
                        'question'
                    )
                }
            }
            function btnEliminarPromociones (id){
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
                        url: './modulos/backend/B_eliminarCostoPromocion.php',
                        data: {
                            idEliminarV: idEliminar
                        },
                        type: 'POST',
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Costo de Promocion Eliminado',
                                text: 'Costo de Promocion Eliminado Correctamente.'
                            });
                            getPromociones();
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