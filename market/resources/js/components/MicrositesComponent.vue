<template>
<div>
    <div class="card">
        <div class="card-header card-header-success">
            <h4 class="card-title ">Micrositios regisrtados</h4>
            <p class="card-category">Listado de Micrositios registrados</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-right" >
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalNuevo">
                        <i class="icon-plus"></i>&nbsp;Nuevo Micrositio
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-info">
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="Microsites in arrayMicrosites" :key="Microsites.id">
                            <td  v-text="Microsites.name"></td>
                            <td  v-text="Microsites.description"></td>
                            <td  v-text="Microsites.latitude"></td>
                            <td  v-text="Microsites.length"></td>
                            <td class="td-actions text-right">
                                <!-- <a rel="tooltip" class="btn btn-success btn-link" href="#" data-original-title="" title=""> 
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                </a> -->
                            </td>
                            <td class="td-actions text-right">
                                <a rel="tooltip" class="btn btn-success btn-link" @click="deleteMicrosites(Microsites.id)" href="#" data-original-title="" title="">
                                    <i class="material-icons">delete</i>
                                    <div class="ripple-container"></div>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal de agregar Microsites -->
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
                                <input v-model="name" type="text" id="name" name="name" class="form-control" placeholder="Nombre" required>
                                <span class="help-block">(*) Ingrese el nombre del Micrositio</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Descripcion</label>
                            <div class="col-md-9">
                                <input v-model="description" type="text" id="description" name="description" class="form-control" placeholder="Descripción" required>
                                <span class="help-block">(*) Ingrese la descripción del Micrositio</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Latitud</label>
                            <div class="col-md-9">
                                <input v-model="latitude" type="number" id="latitude" name="latitude" class="form-control" placeholder="Descripción" required>
                                <span class="help-block">(*) Ingrese la latitud</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Longitud</label>
                            <div class="col-md-9">
                                <input v-model="length" type="number" id="length" name="length" class="form-control" placeholder="Descripción" required>
                                <span class="help-block">(*) Ingrese la longitud</span>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <!-- Boton para crear producto -->
                    <button id="closeModal" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!-- Boton para crear modal -->
                    <button @click="saveMicrosites()" type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
            <!-- /.Fin del modal -->
        </div>
    <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Microsite</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <!-- Boton para crear producto -->
                    <button id="closeModal" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!-- Boton para crear modal -->
                    <button @click="saveMicrosites()" type="button" class="btn btn-primary">Guardar</button>
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
            this.getMicrosites();
        },
        data(){
            return{
                name:'',
                description:'',
                latitude:'',
                length:'',
                arrayMicrosites:[],
            }
        },
        methods:{
            //Function para get los Microsites mediante axios
            getMicrosites(){
                let me = this;
                //Ruta del controlador
                let url = '/api/microsites';
                axios.get(url).then(function(response){
                    me.arrayMicrosites = response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
            },
            saveMicrosites(){
                let me = this;
                //Ruta del controlador
                let url = '/api/microsites';
                axios.post(url,{ 
                    //Propiedades del producto
                    'name':this.name,
                    'description':this.description,
                    'latitude':this.latitude,
                    'length':this.length
                }).then(function (response) {
                    //Se refrescan los datos con la función de getMicrosites();
                    me.getMicrosites();
                    //Se limpan los campos del modal
                    me.emptyFields();
                    //Se cierra el modal
                    document.getElementById('#closeModal').click();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            deleteMicrosites(id){
                let me = this;
                let category_id = id;
                if (confirm('¿Deseas eliminar la categoria?')){
                    axios.delete('/api/microsites/' + category_id)
                    .then(function (response){
                        me.getMicrosites();
                    })
                    .catch(function (error){
                        console.log(error);
                    });
                }
            },
            //emptyFields de campos
            emptyFields(){
                this.name = "";
                this.description = "";
                this.latitude = "";
                this.length = "";
                this.update = 0;
            }
        }
    }
</script>
