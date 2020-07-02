<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
    <div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Agregar Empleado</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Datos del Empleado <small></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ url('api/empleados') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST">
                        
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre">Nombre(s) <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" class="form-control" name="nombres" id="nombre">
                                </div>
                            </div>
                            
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="apellidoPaterno">Apellidos <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" required="required" class="form-control" name="apellidos" id="apellidoPaterno">
                                </div>
                            </div>

                            

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="direccion">Cedula
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number"  class="form-control" name="cedula" id="direccion">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="apellidoPaterno">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="email" required="required" class="form-control" name="email" id="apellidoPaterno">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="apellidoPaterno">Lugar de nacimiento <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" required="required" class="form-control" name="lugar_nacimiento" id="apellidoPaterno">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >Sexo</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div id="sexo" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-secondary" data-toggle-class="btn-primary" for="sexo" data-toggle-passive-class="btn-default">
                                            <input type="radio" value="masculino" name="sexo" id="hombre" class=""> &nbsp; Hombre &nbsp;
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary" for="sexo" data-toggle-passive-class="btn-default">
                                            <input type="radio" value="femenino" name="sexo" id="mujer"  class=""> Mujer
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="apellidoPaterno">Estado civil <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" required="required" class="form-control" name="estado_civil" id="apellidoPaterno">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="telefono">Teléfono
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number"  class="form-control" id="telefono" name="telefono">
                                </div>
                            </div>

                            

                            
                            

                            

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <!--<button class="btn btn-primary" type="button">Cance</button>-->
                                    <!--<button class="btn btn-primary" type="reset">Reinicar</button>-->
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>