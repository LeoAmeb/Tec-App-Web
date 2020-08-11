<template>

      <div class="products">
        
        <div class="half">

          <form @submit.prevent="createProduct">
          <div class="card"> 
          <div class="card-header card-header-warning">
            <h4 class="card-title">Agregar Producto</h4>
          </div>
 

            <div class="card-body">
            <div class="form-group">
   
                  <input type="hidden" v-model="form.id">
            </div>
            <div class="form-group">
                  <label>Nombre de producto</label>
                  <input type="text" v-model="form.name"  maxlength="255" class="form-control">
                  <has-error :form="form" field="name"></has-error>
            </div>
            <div class="form-group">
                  <label>Descripción de Producto</label>
                  <textarea v-model="form.description" class="form-control" ></textarea>
            </div>
            <div class="form-group">
                  <label>Precio</label>
                  <input type="number" v-model="form.price" class="form-control">
                  <has-error :form="form" field="price"></has-error>
            </div>
            <div class="form-group">
                  <label>Stock</label>
                  <input type="number" v-model="form.stock" class="form-control">
                  <has-error :form="form" field="stock"></has-error>
            </div>
            <div class="form-group">
                  <label>ID de Tienda</label>
                  <input type="number" v-model="form.shop_id" class="form-control">
                  <has-error :form="form" field="shop_id"></has-error>
            </div>
            <div class="form-group">
                  <label>ID de Categoría</label>
                  <input type="number" v-model="form.category_id" class="form-control">
                  <has-error :form="form" field="category_id"></has-error>
            </div>



            <div class="form-group">
   
                  <input type="hidden" v-model="form.created_at">
            </div>
            <div class="form-group">
   
                  <input type="hidden" v-model="form.updated_at">
            </div>
        
            <div class="form-group">
                <button class="btn btn-primary" type="submit" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Agregar Producto'}}</button>
            </div>
            </div>
            </div>
          </form>

          
        </div><!-- End first half -->

        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">Listado de productos</h4>
          </div>
          <div class="table-responsive">
            <table class="table table-shopping">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th class="th-description">Stock</th>                      
                        <th class="th-description">ID Tienda</th>
                        <th class="th-description">Acciones</th>
          
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="products.length > 0">
                        <!-- IMAGEN -->
                        <td></td>
                        <td v-for="(product,index) in products" :key="product.id">
                          {{index}}
                        </td>

                        <td v-for="(product) in products" :key="product.id">
                          {{product.name}}
                        </td>

                        <td v-for="(product) in products" :key="product.id">
                          {{product.stock}}
                        </td>

                        <td v-for="(product) in products" :key="product.id">
                          {{product.shop_id}}
                        </td>

                      <!-- Nombre -->
                        <td class="td-actions" v-for="(product,index) in products" :key="product.id">
                          <button @click.prevent="deleteProduct(product,index)" class="btn btn-primary" type="button" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Eliminar'}}</button>
                          
                          <router-link :to="'/products/edit/'+product.id">
                            <button class="btn btn-warning">Editar</button>
                          </router-link >
                        
                        </td>
                    </tr>
                    <span v-else>No hay productos</span>
                </tbody>
            </table>
          </div>
        </div>
      </div>
</template>

<script>
import { Form, HasError, AlertError } from 'vform'
export default {
  name: 'Product',
  components: {HasError},
  data: function(){
    return {
      products : false,
      form: new Form({
          "id" : "",
          "name" : "",
          "description" : "",
          "price" : "",
          "stock" : "",
          "shop_id" : "",
          "category_id" : "",
          "created_at" : "",
          "updated_at" : "",
      })
    }
  },
  created: function(){
    this.listProducts();
  },
  methods: {
    listProducts: function(){
      
      var that = this;
      this.form.get('/api/products').then(function(response){
        that.products = response.data;
      })
      
    },
    createProduct: function(){
      
      var that = this;
      this.form.post('/api/products').then(function(response){
        that.products.push(response.data);
      })
      
    },
    deleteProduct: function(product, index){
      
      var that = this;
      this.form.delete('/api/products/'+product.id).then(function(response){
        that.products.splice(index,1);
      })
      
    }
  }
}
</script>