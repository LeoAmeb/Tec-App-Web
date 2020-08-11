<template>
      <div>
        <!-- 
          COMPONENTE DE ACTUALIZACIÓN DE PRODUCTOS
         -->
        <form @submit.prevent="updateProduct" v-if="loaded">          
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Actualizar Producto</h4>
              </div>
          <div class="card-body">
              
            <div class="form-group">
            <input type="hidden" v-model="form.id">
            </div>

            <!-- NOMBRE -->
            <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" v-model="form.name"  maxlength="255" class="form-control">
                  <has-error :form="form" field="name"></has-error>
            </div>

            <!-- DESCRIPCION -->
            <div class="form-group">
                  <label>Descripción</label>
                  <textarea v-model="form.description" class="form-control"></textarea>
            </div>

            <!-- PRECIO -->
            <div class="form-group">
                  <label>Precio</label>
                  <input type="number" v-model="form.price" class="form-control">
                  <has-error :form="form" field="price"></has-error>
            </div>

            <!-- STOCK -->
            <div class="form-group">
                  <label>Stock</label>
                  <input type="number" v-model="form.stock" class="form-control">
                  <has-error :form="form" field="stock"></has-error>
            </div>

            <!-- TIENDA -->
            <div class="form-group">
                  <label>ID Tienda</label>
                  <input type="number" v-model="form.shop_id" class="form-control">
                  <has-error :form="form" field="shop_id"></has-error>
            </div>

            <!-- CATEGORIA -->
            <div class="form-group">
                  <label>ID Categoría</label>
                  <input type="number" v-model="form.category_id" class="form-control">
                  <has-error :form="form" field="category_id"></has-error>
            </div>

            <!--  -->
            <div class="form-group">
              <input type="hidden" v-model="form.created_at">
            </div>
            <div class="form-group">
                <input type="hidden" v-model="form.updated_at">
            </div>

            <!-- Acciones -->
            <div class="form-group">
                <button class="btn btn-primary" type="submit" :disabled="form.busy" name="button">{{ (form.busy) ? 'Espere...' : 'Actualizar'}}</button>
                <button class="btn btn-danger" @click.prevent="deleteProduct">{{ (form.busy) ? 'Espere...' : 'Eliminar'}}</button>
                <router-link class="btn btn-success" to="/products">Regresar a productos</router-link>
            </div>
          </div>
          </div>
        </form>
        <span v-else>Cargando Producto...</span>
      </div>
</template>

<script>
import { Form, HasError, AlertError } from 'vform'
export default {
  name: 'Product',
  components: {HasError},
  data: function(){
    return {
      loaded: false,
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
    this.getProduct();
  },
  methods: {
    getProduct: function(Product){
      
      var that = this;
      this.form.get('/api/products/'+this.$route.params.id).then(function(response){
        that.form.fill(response.data);
        that.loaded = true;
      }).catch(function(e){
          if (e.response && e.response.status == 404) {
              that.$router.push('/404');
          }
      });
      
    },
    updateProduct: function(){
      
      var that = this;
      this.form.put('/api/products/'+this.$route.params.id).then(function(response){
        that.form.fill(response.data);
      })
      
    },
    deleteProduct: function(){
      
      var that = this;
      this.form.delete('/api/products/'+this.$route.params.id).then(function(response){
        that.form.fill(response.data);
        that.$router.push('/products');
      })
      
    }
  }
}
</script>