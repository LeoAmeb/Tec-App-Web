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
            <title>Gamers</title>
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
                                        <h3>Gamers</h3>
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
                                            <h2> Gamers</h2>
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
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" onclick="gamersVista()">Vista</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#table" role="tab" aria-controls="profile" aria-selected="false" onclick="gamersTable()">Tabla</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#new" role="tab" aria-controls="profile" aria-selected="false">Nuevo Gamer</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="row" id="GamersVista">

                                                        <?php //include "./modulos/frontend/F_gamers.php"?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="table" role="tabpanel" aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        <?php include "./modulos/frontend/F_tablagamers.php"?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        <?php include "./modulos/frontend/F_nuevoGamer.php"?>
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
            url: './modulos/backend/B_Gamers.php',
            type: 'GET',
            success: function (r) {
                $('#GamersVista').html(r);
            }
        });
        function gamersTable(){
            $.ajax({
                url: './modulos/backend/B_tablaGamers.php',
                type: 'GET',
                success: function (r) {
                    $('#tablaGamers').html(r);
                }
            });
        }
        function gamersVista(){
            $.ajax({
                url: './modulos/backend/B_Gamers.php',
                type: 'GET',
                success: function (r) {
                    $('#GamersVista').html(r);
                }
            });
        }
        //$('#formGamer').submit(function () {
        function agregarGamer(){
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
                  'Fecha de Nacimiento Inválida',
                  'Porfavor ingresa una fecha válida',
                  'question'
                )
            }else if(datos){
                $.ajax({
                    url: './modulos/backend/B_nuevoGamer.php',
                    data: {
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
                            title: 'Gamer Creado',
                            text: 'Gamer Creado Correctamente.'
                        });
                        $('#myTab').tabs('select', '#home-tab');
                    }
                });
            }
        }
        //});
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
                    url: './modulos/backend/B_eliminarGamer.php',
                    data: {
                        idEliminarV: idEliminar
                    },
                    type: 'POST',
                    success: function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'Gamer Eliminado',
                            text: 'Gamer Eliminado Correctamente.'
                        });
                        gamersTable();
                        gamersVista();
                    }
                });
              }
            })
        }
        function btnVerPerfil (id){
            $(location).attr('href','./indexGamer.php?var='+id);
        }
        </script>

    </html>
    <?php
  }else{
    header("Location: ../index.php");
  }
 ?>
