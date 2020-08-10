<template>
<div>
    <div class="card" data-toggle="modal" >
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
                                <a rel="tooltip" class="btn btn-success btn-link" href="#" data-original-title="" title=""> 
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                </a>
                            </td>
                            <td class="td-actions text-right">
                                <a rel="tooltip" class="btn btn-success btn-link" @click="deleteProducts(Products.id)" data-original-title="" title="">
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
    <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true" data-toggle="modal">
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
                            <label class="col-md-3 form-control-label" for="text-input">Stock</label>
                            <div class="col-md-9">
                                <input v-model="stock" type="number" id="stock" name="stock" class="form-control" placeholder="Stock" required>
                                <span class="help-block">(*) Ingrese el stock del Producto</span>
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Precio</label>
                            <div class="col-md-9">
                                <input v-model="price" type="number" id="price" name="price" class="form-control" placeholder="Price" required>
                                <span class="help-block">(*) Ingrese el precio del producto</span>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Descripcion</label>
                            <div class="col-md-9">
                                <input v-model="description" type="text" id="description" name="description" class="form-control" placeholder="Descripcion" required>
                                <span class="help-block">(*) Ingrese la Descripcion del producto</span>
                            </div>
                        </div>


                        <!-- Categoría -->
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Categoria</label>
                            <div class="col-md-9">
                                <!-- <input v-model="length" type="text" id="length" name="length" class="form-control" placeholder="Categoria" required>
                                <span class="help-block">(*) Ingrese el Categoria</span> -->
                                <select name="length" id="length" v-model="categories_id" class="form-control">
                                    <option v-for="categoria in arrayCategories" v-bind:value="categoria.id">{{categoria.name}}</option>
                                </select>
                            </div>
                        </div>

                        <!-- Micrositio -->
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Micrositio</label>
                            <div class="col-md-9">
                                <!-- <input v-model="length" type="text" id="length" name="length" class="form-control" placeholder="Categoria" required>
                                <span class="help-block">(*) Ingrese el Categoria</span> -->
                                <select name="length" v-model="microsites_id" id="length" class="form-control">
                                    <option v-for="micrositio in arrayMicrosites" v-bind:value="micrositio.id">{{micrositio.name}}</option>
                                </select>
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
            this.getMicrosites();
        },
        data(){
            return{
                name:'',
                stock:'',
                price:'',
                microsites_id:'',
                categories_id:'',
                arrayProducts:[],
                arrayCategories:[],
                arrayMicrosites:[]
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
                    'stock': this.stock,
                    'price': this.price,
                    'description':this.description,
                    'microsites_id': this.microsites_id,
                    'categories_id': this.categories_id
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
                console.log("ELIMINAR");
                console.log(id);
                let me = this;
                let category_id = id;
                if (confirm('¿Deseas eliminar el producto?')){
                    axios.delete('/api/products/' + category_id)
                    .then(function (response){
                        me.getProducts();
                    })
                    .catch(function (error){
                        console.log(error);
                    });
                }
            },
            getCategorias(){
                let me = this;
                let url = '/api/categories'
                axios.get(url).then(function (response){
                    me.arrayCategories = response.data;
                })
            },
            getMicrosites(){
                let me = this;
                let url = '/api/microsites'
                axios.get(url).then(function (response){
                    me.arrayMicrosites = response.data;
                })
            }
        }
    }
</script>
