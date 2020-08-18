<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
    <div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Lista de Empleados</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Datos de los empleados registrados</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <!--<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">-->
                                <table id="datatable-keytable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nombre(s)</th>
                                            <th>Apellidos</th>
                                            <th>Cedula</th>
                                            <th>Email</th>
                                            <th>Lugar de nacimiento</th>
                                            <th>Sexo</th>
                                            <th>Estado civil</th>
                                            <th>Teléfono</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($empleados as $empleados)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('img/img.jpg') }}" alt="..." class="img-circle">
                                            </td>
                                            <td>{{$empleados->nombres}}</td>
                                            <td>{{$empleados->apellidos}}</td>
                                            <td>{{$empleados->cedula}}</td>
                                            <td>{{$empleados->email}}</td>
                                            <td>{{$empleados->lugar_nacimiento}}</td>
                                            <td>{{$empleados->sexo}}</td>
                                            <td>{{$empleados->estado_civil}}</td>
                                            <td>{{$empleados->telefono}}</td>
                                            <td>
                                                <div style="display: flex;">
                                                    <a href="{{url('empleados/'.$empleados->id.'/edit')}}" class='btn btn-secondary'><i class='fas fa-edit'></i> Editar</a>
                                                    <form action="{{url('empleados/'.$empleados->id)}}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class='btn btn-danger'><i class='fas fa-trash'></i> Eliminar</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
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
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
