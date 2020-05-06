<?php
  //include ('./modulos/backend/conexion.php');
  //session_start();
  //if (isset($_SESSION['usuario']) && $_SESSION['usuario']!='') {
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include "./includes/icono.html" ?>

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta charset="UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="../vendors/jquery/dist/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            <title>Torneos</title>
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
                                        <h3>Torneos</h3>
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
                                            <h2> Torneos</h2>
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
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Proximos</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" onclick="allTorunaments()">Anteriores</a>
                                                </li>
                                            </ul>

                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalNuevoTorneo" onclick="getJuegos()" style="margin-bottom:10px;margin-top:10px; margin-left:25px;">Nuevo torneo</button>
                                                        

                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalPremiosTorneo" onclick="getTorneos()" style="margin-bottom:10px;margin-top:10px; margin-left:10px;">Crear premios</button>

                                                    <!-- Modal para nuevos torneos -->
                                                 <div id="nuevoTorneo"></div>

                                                        <!-- Modal para nuevos premios -->
                                                 <div id="premiosTorneo"></div>

                                                 <div id="ganadores"></div>

                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="row" id="proximosTorneos"></div>
                                                </div>
                                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        
                                                        <?php include "./modulos/frontend/F_allTournaments.php"?>
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

            //por mi script de tabla de todos los Torneos 
        function allTorunaments(){
            $.ajax({
                url: './modulos/backend/B_allTournaments.php',
                type: 'GET',
                success: function (r) {
                    $('#tablaTorneos').html(r);
                }
            });
        }

        function getTorneos(){
            $.ajax({
                url: './modulos/backend/B_torneos2Premios.php',
                type: 'GET',
                success: function (r) {
                    $('#torneos').html(r);
                }
            });
        }


            $.ajax({
                url: './modulos/frontend/F_insertPremioTorneo.php',
                type: 'GET',
                success: function (r) {
                    $('#premiosTorneo').html(r);
                }
            });


            $.ajax({
                url: './modulos/frontend/F_asignarGanadores.php',
                type: 'GET',
                success: function (r) {
                    $('#ganadores').html(r);
                }
            });

            function asignarGanadores(IDTorneo) {
                    // alert(IDTorneo);
                $.ajax({
                url: './modulos/backend/B_premios2Ganadores.php',
                type: 'POST',
                data: {
                        IDTorneo
                },
                success: function(r) {
                    $('#premiosModal').html(r);
                    
                }
                });


                 $.ajax({
                url: './modulos/backend/B_participants2Ganadores.php',
                type: 'POST',
                data: {
                        IDTorneo
                },
                success: function(r) {
                    $('#primerlugarP').html(r);
                    
                }
                });

                 $.ajax({
                url: './modulos/backend/B_participants2Ganadores.php',
                type: 'POST',
                data: {
                        IDTorneo
                },
                success: function(r) {
                    $('#segundolugarP').html(r);
                    
                }
                });

                 

                 $.ajax({
                url: './modulos/backend/B_participants2Ganadores.php',
                type: 'POST',
                data: {
                        IDTorneo
                },
                success: function(r) {
                    $('#tercerlugarP').html(r);
                    
                }
                });

                 $.ajax({
                url: './modulos/backend/B_agregarBotonGanadoresFin.php',
                type: 'POST',
                data: {
                        IDTorneo
                },
                success: function(r) {
                    $('#btnAgregar').html(r);
                    
                }
                });


            }


            $.ajax({
                url: './modulos/backend/B_proximosTorneos.php',
                type: 'GET',
                success: function (r) {
                    $('#proximosTorneos').html(r);
                }
            });


            $.ajax({
                url: './modulos/frontend/F_insertTorneo.php',
                type: 'GET',
                success: function (r) {
                    $('#nuevoTorneo').html(r);
                }
            });
            

            function getJuegos() {
                $.ajax({
                    url: './modulos/backend/B_juegos2Torneo.php',
                    type: 'GET',
                    success: function (r) {
                        $('#videoJuegoTorneo').html(r);
                    }
                });
            }  


            function setDatosTorneo(){
                tituloV = $('#tituloTorneo').val();
                juegoV = $('#videoJuegoTorneo').val();
                costoV = $('#costoTorneo').val();
                fechaV = $('#fechaTorneo').val();
                horaV = $('#horaTorneo').val();
                horaV = horaV + ":00";
                maxGamersV = $('#cantidadGamersTorneo').val();
                descV = $('#descTorneo').val();
                modalidadV = $('#modalidadTorneo').val();
                presenciaV = $('#presenciaTorneo').val();
                estatus = "Abierto";


                // alert(tituloV + " " + juegoV + " " + costoV +" " + fechaV
                //     + " " + horaV + " " + maxGamersV + " " + descV + " "
                //     + modalidadV + " " + presenciaV + " " + estatus);

                  $.ajax({
                      url: './modulos/backend/B_insertTorneo.php',
                      type: 'POST',
                      data:{
                            title: tituloV,
                            game: juegoV,
                            cost: costoV,
                            dateP: fechaV,
                            hourP: horaV,
                            maxGamer: maxGamersV,
                            desc: descV,
                            modality: modalidadV,
                            present: presenciaV,
                            status: estatus
                          },
                      success: function(data){
                          Swal.fire({
                                  position: 'center',
                                  icon: 'success',
                                  title: 'Torneo registrado',
                                  showConfirmButton: false,
                                  timer: 1500
                                })

                          
                      }
                  });  
            }

            function setCancelarTorneo() {
                idV = $('#btnCancelT').val();


                // alert(idV);

                  $.ajax({
                      url: './modulos/backend/B_updateCancelarTorneo.php',
                      type: 'POST',
                      data:{
                            idT: idV
                          },
                      success: function(data){
                          Swal.fire({
                                  position: 'center',
                                  icon: 'success',
                                  title: 'Torneo cacelado',
                                  showConfirmButton: false,
                                  timer: 1500
                                })

                          
                      }
                  });  
            }


            function setGanadores(idTorneoV) {
                gUnoV = $('#primerlugar').val();
                gDosV = $('#segundolugar').val();
                gTresV = $('#tercerlugar').val();

                $.ajax({

                      url: './modulos/backend/B_updateGanadoresTorneo.php',
                      type: 'POST',
                      data:{
                            gUnoP: gUnoV,
                            gDosP: gDosV,
                            gTresP: gTresV,
                            idT: idTorneoV
                          },
                      success: function(data){
                          Swal.fire({
                                  position: 'center',
                                  icon: 'success',
                                  title: 'Torneo registrado',
                                  showConfirmButton: false,
                                  timer: 1500
                                })      
                      }
                  });  
            }


            function setPremiosTorneo() {
                pUnoV = $('#primerlugar').val();
                pDosV = $('#segundolugar').val();
                pTresV = $('#tercerlugar').val();
                torneoV = $('#torneos').val();

                $.ajax({

                      url: './modulos/backend/B_insertPremiosTorneo.php',
                      type: 'POST',
                      data:{
                            gUnoP: pUnoV,
                            gDosP: pDosV,
                            gTresP: pTresV,
                            idT: torneoV
                          },
                      success: function(data){
                          Swal.fire({
                                  position: 'center',
                                  icon: 'success',
                                  title: 'Premios registrados',
                                  showConfirmButton: false,
                                  timer: 1500
                                })      
                      }
                  });
            }


        </script>

    </html>