<?php
    //include ('./modulos/backend/conexion.php');
    include ('./modulos/backend/B_index.php');
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

            <title>Gaming Center | UPV</title>
            <?php include "./includes/header.html" ?>
        </header>

        <body class="nav-md">
            <div class="container body">
                <div class="main_container">
                    <div class="col-md-3 left_col">
                        <?php include "./includes/navbar.html" ?>
                    </div>

                    <?php include "./includes/top-navigation.html" ?>

                        <!-- page content -->
                        <div class="right_col" role="main">
                            <!--Contenedor general ""-->
                            <div class="">
                                <div class="page-title">

                                    <!--Title left-->
                                    <div class="title_left">
                                        <h3>Analisis de los datos generales</h3>
                                    </div>

                                </div>
                                <!--End page-title-->

                                <div class="clearfix"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="">
                                            <div class="x_content">
                                                <div class="row">
                                                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                                                        <div class="tile-stats">
                                                            <div class="icon"><i class="fa fa-cog"></i>
                                                            </div>
                                                            <div class="count">
                                                                <?php echo $rowAdmin['idAdmin']; ?>
                                                            </div>

                                                            <h3>Admin registrados</h3>
                                                            <p>Administradores registrados.</p>
                                                        </div>
                                                    </div>
                                                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                                                        <div class="tile-stats">
                                                            <div class="icon"><i class="fa fa-users"></i>
                                                            </div>
                                                            <div class="count">
                                                                <?php echo $rowGamer['idGamer']; ?>
                                                            </div>

                                                            <h3>Gamers registrados</h3>
                                                            <p>Gamers registrados en el sistema.</p>
                                                        </div>
                                                    </div>
                                                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                                                        <div class="tile-stats">
                                                            <div class="icon"><i class="fa fa-play"></i>
                                                            </div>
                                                            <div class="count">
                                                                <?php echo $rowConsoles['idConsoles']; ?>
                                                            </div>

                                                            <h3>Consolas registradas</h3>
                                                            <p>Número de consolas registradas.</p>
                                                        </div>
                                                    </div>
                                                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                                                        <div class="tile-stats">
                                                            <div class="icon"><i class="fa fa-play-circle"></i>
                                                            </div>
                                                            <div class="count">
                                                                <?php echo $rowVideogames['idVideogames']; ?>
                                                            </div>

                                                            <h3>Juegos registrados</h3>
                                                            <p>Número de juegos registrados.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--End row-->

                            </div>
                            <!--End ""-->

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
    </html>
    <?php
  }else{
    header("Location: ../index.php");
  }
 ?>