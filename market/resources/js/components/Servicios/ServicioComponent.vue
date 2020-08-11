<template>
      <div class="ServiceSingle">
        <h1>Update Service</h1>
        
        <form @submit.prevent="updateService" v-if="loaded">
          
          
            <div class="form-group">
   
                  <input type="hidden" v-model="form.id">
            </div>
            <div class="form-group">
                  <label>name</label>
                  <input type="text" v-model="form.name"  maxlength="255" class="form-control" >
                  <has-error :form="form" field="name"></has-error>
            </div>
            <div class="form-group">
                  <label>description</label>
                  <textarea v-model="form.description" class="form-control" ></textarea>
            </div>
            <div class="form-group">
                  <label>price</label>
                  <input type="number" v-model="form.price" class="form-control">
                  <has-error :form="form" field="price"></has-error>
            </div>
            <div class="form-group">
                  <label>active</label>
                  <input type="number" v-model="form.active" class="form-control">
                  <has-error :form="form" field="active"></has-error>
            </div>
            <div class="form-group">
                  <label>shop_id</label>
                  <input type="number" v-model="form.shop_id" class="form-control">
                  <has-error :form="form" field="shop_id"></has-error>
            </div>
            <div class="form-group">
                  <label>category_id</label>
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
              <button class="btn btn-primary" type="submit" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Actualizar'}}</button>
              <button class="btn btn-danger" @click.prevent="deleteService">{{ (form.busy) ? 'Please wait...' : 'Eliminar'}}</button>
              <router-link class="btn btn-success" to="/services">Cancelar</router-link>
          </div>
        </form>
        
        <span v-else>Cargando...</span>
      </div>
</template>

<script>
import { Form, HasError, AlertError } from 'vform'
export default {
  name: 'Service',
  components: {HasError},
  data: function(){
    return {
      loaded: false,
      form: new Form({
          "id" : "",
          "name" : "",
          "description" : "",
          "price" : "",
          "active" : "",
          "shop_id" : "",
          "category_id" : "",
          "created_at" : "",
          "updated_at" : "",
        
      })
    }
  },
  created: function(){
    this.getService();
  },
  methods: {
    getService: function(Service){
      
      var that = this;
      this.form.get('/api/services/'+this.$route.params.id).then(function(response){
        that.form.fill(response.data);
        that.loaded = true;
      }).catch(function(e){
          if (e.response && e.response.status == 404) {
              that.$router.push('/404');
          }
      });
      
    },
    updateService: function(){
      
      var that = this;
      this.form.put('/api/services/'+this.$route.params.id).then(function(response){
        that.form.fill(response.data);
      })
      
    },
    deleteService: function(){
      
      var that = this;
      this.form.delete('/api/services/'+this.$route.params.id).then(function(response){
        that.form.fill(response.data);
        that.$router.push('/services');
      })
      
    }
  }
}
</script>