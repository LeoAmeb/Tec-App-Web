<?php
    //Obtener id
    $id = $_GET['var'];
    include ('./modulos/backend/B_seleccionarGamer.php');
    session_start();
    
  if (isset($_SESSION['username']) && $_SESSION['username']!='') {
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include "./includes/icono.html" ?>
        <header>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            <title>Gaming Center | UPV</title>
            <?php include "./includes/header.html" ?>
        </header>

        <body class="nav-md">
            <div class="container body">
                <div class="main_container">
                    <div class="col-md-3 left_col">
                        <?php include "./includes/navbar_Gamer.php" ?>
                    </div>

                    <?php include "./includes/top-navigation.html" ?>

                        <!-- page content -->
                        <div class="right_col" role="main">
                            <div class="">
                                <div class="page-title">
                                    <div class="title_left">
                                        <h3>Perfil de <?php echo $row['username']?></h3>
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
                                            <h2> Perfil</h2>
                                            <ul class="nav navbar-right panel_toolbox">
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
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#datosGenerales" role="tab" aria-controls="home" aria-selected="true">Datos Generales</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#torneos" role="tab" aria-controls="profile" aria-selected="false" onclick="gamersTableTorneo(<?php  echo $id ?>)">Torneos</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="datosGenerales" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="row" id="datosGenerales">

                                                        <?php include "./modulos/frontend/F_actualizarGamer.php"?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="torneos" role="tabpanel" aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        <?php include "./modulos/frontend/F_tablagamersTorneos.php"?>
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
            function actualizarGamer(id){
                //alert(id);
                var idV = id;
                var coins = $('#coins').val();
                var datos = false;
                var name = $('#name').val();
                var last_name = $('#last_name').val();
                var email = $('#email').val();
                var role = $('input:radio[name=adminGamerRadio]:checked').val();
                var username = $('#username').val();
                var password = $('#password').val();
                var gender = $('#gender').val();
                var birthdate = $('#birthdate').val();
                var twitch = $('#twitch').val();
                var twitter = $('#twitter').val();
                var facebook = $('#facebook').val();
                var youtube = $('#youtube').val();
                var mixer = $('#mixer').val();
                
                if(name!=''&&last_name!=''&&email!=''&&role!=''&&username!=''&&password!=''&&gender!=''&&birthdate!=''){
                    datos=true;
                }else{
                    Swal.fire(
                      'Ingresa todos los campos necesarios',
                      'Porfavor ingresa los campos necesarios',
                      'question'
                    )
                }
                if(datos && ( (birthdate > "2010-01-01") || (birthdate < "1950-01-01") ) ){
                    //alert("Te pasaste");
                    Swal.fire(
                      'Cumpleaños Inválido',
                      'Porfavor ingresa una fecha válida',
                      'question'
                    )
                }else if(datos){
                    //alert("entre");
                    $.ajax({
                        url: './modulos/backend/B_actualizarGamer.php',
                        data: {
                            idV : idV,
                            coinsV: coins,
                            nameV: name,
                            last_nameV: last_name,
                            emailV: email,
                            roleV: role,
                            usernameV: username,
                            passwordV: password,
                            genderV: gender,
                            birthdateV: birthdate,
                            twitchV: twitch,
                            twitterV: twitter,
                            facebookV: facebook,
                            youtubeV: youtube,
                            mixerV: mixer
                            },
                        type: 'POST',
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Gamer Actualizado',
                                text: 'Gamer Actualizado Correctamente.'
                            });
                            //$(location).attr('href','./indexGamer.php?var='+id);
                        }
                    });
                }
            }
            function gamersTableTorneo(id){
                $.ajax({
                    url: './modulos/backend/B_tablagamersTorneos.php',
                    type: 'POST',
                    data: {idV: id},
                    success: function (r) {
                        $('#tablaGamersTorneo').html(r);
                    }
                });
        }
        </script>
    </html>
    <?php
  }else{
    header("Location: ../index.php");
  }
 ?>