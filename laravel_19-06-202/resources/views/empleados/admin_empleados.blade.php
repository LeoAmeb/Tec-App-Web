@extends ('layout.patron')
@section ('titulo', 'Administracion de empleados');
@section ('contenido');
<!-- Codigo HTML puro para mostrar el listado de empleado -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Administracion de empleados</h3>
            </div>
        </div>
    </div>
    <div class="clearfix">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="title">
                    <h2> Listado de empleados</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-keytable" class="table table striped table-bordered" style="width_100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nombre(s)</th>
                                        <th>Apellidos(s)</th>
                                        <th>Cedula</th>
                                        <th>Email</th>
                                        <th>Lugar de nacimiento</th>
                                        <th>Sexo</th>
                                        <th>Estado civil</th>
                                        <th>Teléfono</th>
                                        <th>Departamento</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($empleados as $empleados)
                                    <tr>
                                        <!--_create_empleados_table-->
                                        <td></td>
                                        <td>{{$empleados->nombres}}</td>
                                        <td>{{$empleados->apellidos}}</td>
                                        <td>{{$empleados->cedula}}</td>
                                        <td>{{$empleados->email}}</td>
                                        <td>{{$empleados->lugar_nacimiento}}</td>
                                        <td>{{$empleados->sexo}}</td>
                                        <td>{{$empleados->estado_civil}}</td>
                                        <td>{{$empleados->telefono}}</td>
                                        <td>{{$empleados->nombre}}</td>
                                        <!-- Agregar columna para editar y eliminar registro -->

                                        <td>
                                            <div style="display: flex;">
                                            <a href="{{url('empleados/'.$empleados->id.'/edit')}}" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i></a>
                                                
                                                <form action="{{ url('empleados/'.$empleados->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm ('¿Eliminar empleado?')"><i class="fas fa-trash"></i></button>
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
@endsection