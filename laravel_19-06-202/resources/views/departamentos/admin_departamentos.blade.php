@extends ('layout.patron')
@section ('titulo', 'Administracion de departamentos');
@section ('contenido');
<!-- Codigo HTML puro para mostrar el listado de departamentos -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Administracion de departamentos</h3>
            </div>
        </div>
    </div>
    <div class="clearfix">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="title">
                    <h2> Listado de departamentos</h2>
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
                                        
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($departamentos as $departamentos)
                                    <tr>
                                        <!--_create_dep_table-->
                                        <td></td>
                                        <td>{{$departamentos->nombre}}</td>
                                        
                                        <!-- Agregar columna para editar y eliminar registro -->

                                        <td>
                                            <div style="display: flex;">
                                            <a href="{{url('departamentos/'.$departamentos->id.'/edit')}}" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i></a>
                                                
                                                <form action="{{ url('departamentos/'.$departamentos->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm ('¿Eliminar departamento?')"><i class="fas fa-trash"></i></button>
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