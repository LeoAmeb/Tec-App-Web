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
                                        <h3>Dulcería</h3>
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
                                            <h2> Dulcería</h2>
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
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" onclick="registroVentas()" aria-selected="true">Venta</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#table" role="tab" aria-controls="profile" aria-selected="false" onclick="tablaProductos()">Productos</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#new" role="tab" aria-controls="profile" aria-selected="false" onclick="verGamers();verProductos();">Registro de ventas</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="row">

                                                        <?php include "./modulos/frontend/F_tablaVentas.php"?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="table" role="tabpanel" aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        <?php include "./modulos/frontend/F_tablaProductos.php"?>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        <?php include "./modulos/frontend/F_nuevaVenta.php"?>
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
            url: './modulos/backend/B_registroVentas.php',
            type: 'GET',
            success: function (r) {
                $('#registroVentas').html(r);
            }
        });

        function registroVentas(){
            $.ajax({
                url: './modulos/backend/B_registroVentas.php',
                type: 'GET',
                success: function (r) {
                    $('#registroVentas').html(r);
                }
            });
        }
        function cambio(){
            console.log("ojo");
            var pagas = $('#pagas').val();
            var costo = $('#costo').val();
            $.ajax({
                url: './modulos/backend/B_calCambioProducto.php',
                type: 'POST',
                data:{
                    pagasV: pagas,
                    costoV: costo
                },
                success: function (r) {
                    $('#cambio').val(r);
                }
            });
        }
        function calcularCosto(){
            cambio();
            var id = $('#producto').val();
            $.ajax({
                url: './modulos/backend/B_calCostoProducto.php',
                type: 'POST',
                data:{
                    idProducto:id
                },
                success: function (r) {
                    $('#costo').val(r);
                }
            });
        }
        function verGamers(){
            $.ajax({
                url: './modulos/backend/B_listaGamers.php',
                type: 'GET',
                success: function (r) {
                    $('#gamer').html(r);
                }
            });
        }
        function verProductos(){
            $.ajax({
                url: './modulos/backend/B_listaProductos.php',
                type: 'GET',
                success: function (r) {
                    $('#producto').html(r);
                }
            });
        }
        function tablaProductos(){
            $.ajax({
                url: './modulos/backend/B_tablaProductos.php',
                type: 'GET',
                success: function (r) {
                    $('#tablaProductos').html(r);
                }
            });
        }
        function registrarVenta(){
            var gamer = $('#gamer').val();
            var producto = $('#producto').val();
            var costo = $('#costo').val();
            var pagas = $('#pagas').val();
            var cambio = $('#cambio').val();
            /*alert(gamer);
            alert(producto);
            alert(costo);
            alert(pagas);
            alert(cambio);*/
            //alert(cambio);
            var val;
            if(cambio=='Necesitas mas dinero'){
                val=1;
                //alert('Necesitas mas dinero');
                Swal.fire({
                    icon: 'warning',
                    title: 'Error',
                    text: 'Necesitas mas dinero'
                });
            }else{
                val=2;
            }
            
            if(val==2 && gamer!='' && producto!='' && costo!='' && pagas!='' && cambio!=''){
                $.ajax({
                    url: './modulos/backend/B_registrarVenta.php',
                    type: 'POST',
                    data:{  
                        gamerV: gamer,
                        productoV: producto,
                        costoV: costo,
                        pagasV: pagas,
                        cambioV: cambio
                    },
                    success: function(r){
                        Swal.fire({
                            icon: 'success',
                            title: 'Venta Creado',
                            text: 'Venta Creado Correctamente.'
                        });

                    },
                    error: function () {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Error',
                            text: 'No se pudo crear la venta'
                        });
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

        function registrarProducto(){
            var nombreP = $('#nombreProducto').val();
            var costoP = $('#costoProducto').val();
            var monedasP = $('#monedasProducto').val();
            if(nombreP!='' && costoP!='' && monedasP!=''){
                $.ajax({
                    url: './modulos/backend/B_registrarProducto.php',
                    type: 'POST',
                    data:{  nombre: nombreP,
                            costo: costoP,
                            monedas: monedasP},
                    success: function(r){
                        Swal.fire({
                            icon: 'success',
                            title: 'Producto Creado',
                            text: 'Producto Creado Correctamente.'
                        });
                        tablaProductos();
                        $('#registrarProducto').modal('hide');

                    },
                    error: function () {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Error',
                            text: 'No se pudo crear el producto'
                        });
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

        function btnEliminarProducto(id){
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
                    url: './modulos/backend/B_eliminarProducto.php',
                    data: {
                        idEliminarV: idEliminar
                    },
                    type: 'POST',
                    success: function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'Producto Eliminado',
                            text: 'Producto Eliminado Correctamente.'
                        });
                        tablaProductos()
                    }
                });
              }
            })
        }

        function verModal(id){
            var idModal = '#registrarProducto' + id;
            $(idModal).modal('show');
        }

        function actualizarProducto(id){
        var idModal = '#registrarProducto' + id;

        var idNombreProducto = '#nombreProducto' + id;
        var nombreProducto = $(idNombreProducto).val();

        var idCostoProducto = '#costoProducto' + id;
        var costoProducto = $(idCostoProducto).val();

        var idmonedasProducto = '#monedasProducto' + id;
        var monedasProducto = $(idmonedasProducto).val();
        //alert(idModal);
        if(nombreProducto != '' && costoProducto != '' && monedasProducto != ''){
            $.ajax({
                url: './modulos/backend/B_actualizarProducto.php',
                data: {
                    id: id,
                    nombre: nombreProducto,
                    costo: costoProducto,
                    monedas: monedasProducto
                    },
                type: 'POST',
                success: function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Producto Actualizado',
                        text: 'Producto Actualizado Correctamente.'
                    });
                    $(idModal).modal('hide');
                    tablaProductos();
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
