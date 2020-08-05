<template>
<div>
    <div class="card">
        <div class="card-header card-header-success">
            <h4 class="card-title ">Productos registrados</h4>
            <p class="card-category">Listado de Micrositios registrados</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-right" >
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalNuevo">
                        <i class="icon-plus"></i>&nbsp;Nuevo Producto
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-info">
                        <tr>
                            <th>Nombre</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Micrositio</th>
                            <th>Categoria</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="Products in arrayProducts" :key="Products.id">
                            <td  v-text="Products.name"></td>
                            <td  v-text="Products.stock"></td>
                            <td  v-text="Products.price"></td>
                            <td  v-text="Products.microsite"></td>
                            <td  v-text="Products.categorie"></td>
                            <td class="td-actions text-right">
                                <!-- <a rel="tooltip" class="btn btn-success btn-link" href="#" data-original-title="" title=""> 
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                </a> -->
                            </td>
                            <td class="td-actions text-right">
                                <a rel="tooltip" class="btn btn-success btn-link" @click="deleteProducts(Products.id)" href="#" data-original-title="" title="">
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

    <!-- Modal de agregar Products -->
    <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        
                        <!-- Nombre -->
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                            <div class="col-md-9">
                                <input v-model="name" type="text" id="name" name="name" class="form-control" placeholder="Nombre" required>
                                <span class="help-block">(*) Ingrese el nombre del Producto</span>
                            </div>
                        </div>

                        <!-- Stock -->
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Descripcion</label>
                            <div class="col-md-9">
                                <input v-model="description" type="number" id="description" name="description" class="form-control" placeholder="Descripción" required>
                                <span class="help-block">(*) Ingrese la descripción del Producto</span>
                            </div>
                        </div>

                        <!-- price -->

                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Latitud</label>
                            <div class="col-md-9">
                                <input v-model="latitude" type="number" id="latitude" name="latitude" class="form-control" placeholder="Latitud" required>
                                <span class="help-block">(*) Ingrese la latitud</span>
                            </div>
                        </div>

                        <!-- description -->

                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Longitud</label>
                            <div class="col-md-9">
                                <input v-model="length" type="number" id="length" name="length" class="form-control" placeholder="Longitud" required>
                                <span class="help-block">(*) Ingrese la longitud</span>
                            </div>
                        </div>

                        <!-- Micrositio -->
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Micrositio</label>
                            <div class="col-md-9">
                                <input v-model="length" type="text" id="length" name="length" class="form-control" placeholder="Micrositio" required>
                                <span class="help-block">(*) Ingrese el Micrositio</span>
                            </div>
                        </div>


                        <!-- Categoría -->
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Categoria</label>
                            <div class="col-md-9">
                                <input v-model="length" type="text" id="length" name="length" class="form-control" placeholder="Categoria" required>
                                <span class="help-block">(*) Ingrese el Categoria</span>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <!-- Boton para crear producto -->
                    <button id="closeModal" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!-- Boton para crear modal -->
                    <button @click="saveProducts()" type="button" class="btn btn-primary">Guardar</button>
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
                    <h4 class="modal-title">Eliminar Producto</h4>
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
                    <button @click="saveProducts()" type="button" class="btn btn-primary">Guardar</button>
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
            this.getProducts();
        },
        data(){
            return{
                name:'',
                stock:'',
                price:'',
                microsite:'',
                categorie:'',
                arrayProducts:[],
            }
        },
        Categoriesdata(){
            return{
                id:'',
                name:'',
                arrayCategories:[],
            }
        },
        methods:{
            //Funcion para obtener los productos
            getProducts(){
                let me = this;
                //Ruta del controlador
                let url = '/api/products';
                let urlCategories = '/api/categories';
                
                //Productos
                axios.get(url).then(function(response){
                    me.arrayProducts = response.data;
                }).catch(function (error) {
                    console.log(error);
                });

                //Categorias
                axios.get(urlCategories).then(function(response){
                    me.arrayCategories = response.data;
                }).catch(function (error){
                    console.log(error);
                });

                //Servicios
                axios.get(urlCategories).then(function(response){
                    me.arrayCategories = response.data;
                }).catch(function (error){
                    console.log(error);
                });

            },
            //Guardado de productos
            saveProducts(){
                let me = this;
                //Ruta del controlador
                let url = '/api/products';
                axios.post(url,{ 
                    //Propiedades del producto
                    'name':this.name,
                    'description':this.description,
                    'latitude':this.latitude,
                    'length':this.length
                }).then(function (response) {
                    //Se refrescan los datos con la función de getProducts();
                    me.getProducts();
                    //Se limpan los campos del modal
                    me.emptyFields();
                    //Se cierra el modal
                    document.getElementById('#closeModal').click();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            //Eliminacion de productos
            deleteProducts(id){
                let me = this;
                let category_id = id;
                if (confirm('¿Deseas eliminar la categoria?')){
                    axios.delete('/api/products/' + category_id)
                    .then(function (response){
                        me.getProducts();
                    })
                    .catch(function (error){
                        console.log(error);
                    });
                }
            },
            //Limpia de campos
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
