<template>
<div>
    <!-- Tabla de Productos -->
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Categorías
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalNuevo">
                <i class="icon-plus"></i>&nbsp;Nuevo
            </button>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="input-group">
                        <select class="form-control col-md-3" id="opcion" name="opcion">
                        <option value="nombre">Nombre</option>
                        <option value="descripcion">Descripción</option>
                        </select>
                        <input type="text" id="texto" name="texto" class="form-control" placeholder="Texto a buscar">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>Opciones</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <!-- Se hace un Foreach usando directivas de VU -->
                <tbody>
                    <!-- Se hace uso de arreglo productos y le ID de cada uno de los productos -->
                    <tr v-for="producto in arregloProductos" :key="producto.id">
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalNuevo">
                            <i class="icon-pencil"></i>
                            </button>&nbsp;
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar">
                            <i class="icon-trash"></i>
                            </button>
                        </td>
                        <!-- Se imprimen las propiedades de cada producto -->
                        <td v-text="producto.nombre"></td>
                        <td v-text="producto.descripcion"></td>
                        <td>
                            <span class="badge badge-success">Activo</span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#">Ant</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Sig</a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>

    <!-- Modal de agregar productos -->

    <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                        <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                        <div class="col-md-9">
                            <input v-model="nombre" type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre de categoría">
                            <span class="help-block">(*) Ingrese el nombre de la categoría</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                        <div class="col-md-9">
                            <input v-model="descripcion" type="email" id="descripcion" name="descripcion" class="form-control" placeholder="Enter Email">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- Boton para crear producto -->
                <button id="modalCerrar" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <!-- Boton para crear modal -->
                <button @click="guardarProductos()" type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        <!-- /.Fin del modal -->
    </div>
    <!-- /.modal-dialog -->
    </div>
</div>

</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.');
            this.obtenerProductos();
        },
        data(){
            return{
                nombre:'',
                descripcion:'',
                estado:'',
                arregloProductos:[],
            }
        },
        methods:{
            //Function para obtener los productos mediante axios
            obtenerProductos(){
                let me = this;
                //Ruta del controlador
                let url = '/1730123-TAW-42/practica5/public/productos';
                axios.get(url).then(function(response){
                    me.arregloProductos = response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
            },
            guardarProductos(){
                let me = this;
                //Ruta del controlador
                let url = '/1730123-TAW-42/practica5/public/productos';
                axios.post(url,{ 
                    //Propiedades del producto
                    'nombre':this.nombre,
                    'descripcion':this.descripcion,
                }).then(function (response) {
                    //Se refrescan los datos con la función de obtenerProductos();
                    me.obtenerProductos();
                    //Se limpan los campos del modal
                    me.limpia();
                    //Se cierra el modal
                    document.getElementById('modalCerrar').click();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            
            //Limpia de campos
            limpia(){
                this.nombre = "";
                this.descripcion = "";
                this.update = 0;
            }
        }
    }
</script>