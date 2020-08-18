
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
            <title>Rentas</title>
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
                                        <h3>Rentas</h3>
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
                                            <h2> Rentas</h2>
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
                                                    <a class="nav-link active" id="enCurso-tab" data-toggle="tab" href="#enCurso" role="tab" aria-controls="enCurso" aria-selected="true" >Rentas en curso</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="todas-tab" data-toggle="tab" href="#todas" role="tab" aria-controls="todas" aria-selected="false" onclick="getTodasRentas()">Todas las rentas</a>
                                                </li>
                                            </ul>
                                                 <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalNuevaRenta" onclick="getDatosToModal()" style="margin-bottom:10px; margin-top: 10px; margin-left: 25px;">Nueva renta</button>
                                                        <!-- Modal para una nueva renta -->
                                                 <div id="nuevaRenta"></div>


                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="enCurso" role="tabpanel" aria-labelledby="enCurso-tab">
                                                    <div class="row" id="rentasActivas">
                                                        <!-- Cambiar por mi frontend para precios consolas-->

                                                        <?php //include "./modulos/backend/B_rentasActivas.php"?>
                                                    </div>
                                                </div>

                                                <!--  -->
                                                <div class="tab-pane fade" id="todas" role="tabpanel" aria-labelledby="todas-tab">
                                                    <div class="row" >
                                      <!-- Cambiar por mi frontend para precios accesorios-->
                                                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Nombre</th>
                                                                    <th>Username</th>
                                                                    <th>Hora de inicio</th>
                                                                    <th>Hora de fin</th>
                                                                    <th>Plataforma</th>
                                                                    <th>Consola</th>
                                                                    <th>Costo MXN</th>
                                                                    <th>Costo moneda</th>
                                                                    <th>Tipo de pago</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                            </thead>
                                        
                                                            <tbody id="tablaRentasTodas">


                                                            </tbody>
                                                        </table>
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

            //Cambiar por mi back
        
            $.ajax({
                url: './modulos/backend/B_rentasActivas.php',
                type: 'GET',
                success: function (r) {
                    $('#rentasActivas').html(r);
                }
            });
        
       
            function getDatosToModal() {
                $.ajax({
                    url: './modulos/backend/B_consolas2Rentas.php',
                    type: 'GET',
                    success: function (r) {
                        $('#consola').html(r);
                    }
                });

                $.ajax({
                    url: './modulos/backend/B_gamers2Rentas.php',
                    type: 'GET',
                    success: function (r) {
                        $('#gamer').html(r);
                    }
                });
            }

           $.ajax({
                    url: './modulos/frontend/F_insertRenta.php',
                    type: 'GET',
                    success: function (r) {
                        $('#nuevaRenta').html(r);
                    }
                });


            function setDatosRenta(){
                consolaV = $('#consola').val();
                gamerV = $('#gamer').val();

                  $.ajax({
                      url: './modulos/backend/B_insertRenta.php',
                      type: 'POST',
                      data:{
                            idConsola: consolaV,
                            idGamer: gamerV
                          },
                      success: function(){
                          Swal.fire({
                                  position: 'center',
                                  icon: 'success',
                                  title: 'Renta registrada',
                                  showConfirmButton: false,
                                  timer: 1500
                                })
                      }
                  });  
            }


                function getTodasRentas() {
                $.ajax({
                url: './modulos/backend/B_todasRentas.php',
                type: 'GET',
                success: function (r) {
                    $('#tablaRentasTodas').html(r);
                }
            });
                }


    function finRenta() {
        rentaV = $('#btnRentaID').val();

                  $.ajax({
                      url: './modulos/backend/B_updateHoraFin.php',
                      type: 'POST',
                      data:{
                            idRenta: rentaV
                          },
                      success: function(data){
                          Swal.fire({
                              position: 'center',
                              icon: 'success',
                              title: 'Renta finalizada',
                              showConfirmButton: false,
                              timer: 1500
                            })
                      }
                  });
    }


        </script>


    </html>