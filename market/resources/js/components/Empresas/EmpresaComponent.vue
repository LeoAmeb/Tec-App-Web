<template>
      <div>

        <div class="card">
          <div class="card-header card-header-info">
              <h4 class="card-title">Actualizar Empresa</h4>
          </div>
        <div class="card-body">

        
        <form @submit.prevent="updateShop" v-if="loaded">
          
            <div class="form-group">
   
                  <input type="hidden" v-model="form.id">
            </div>
            <div class="form-group">
                  <label>name</label>
                  <input type="text" class="form-control" v-model="form.name"  maxlength="255" >
                  <has-error :form="form" field="name"></has-error>
            </div>
            <div class="form-group">
                  <label>description</label>
                  <textarea class="form-control" :key="form.address" v-model="form.description" ></textarea>
            </div>
            <GoogleMap :parentData="form.address" v-on:childToParent="onChildClick"></GoogleMap>
            <div class="form-group">
                  <label>Estado</label>
                  <select v-model="form.active" name="status" id="status" class="form-control" required>
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                  </select>
                  <has-error :form="form" field="active"></has-error>
            </div>
            <div class="form-group">
                  <label>user_id</label>
                  <input type="number" v-model="form.user" class="form-control">
            </div>
          <div class="form-group">
              <button class="btn btn-primary" type="submit" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Actualizar'}}</button>
              <button class="btn btn-danger" @click.prevent="deleteShop">{{ (form.busy) ? 'Please wait...' : 'Eliminar'}}</button>
              <router-link class="btn btn-success"  to="/shops">Cancelar</router-link>
          </div>
        </form>
        <span v-else>Loading shop...</span>
        </div>
        </div>

        
      </div>
</template>

<script>
import GoogleMap from "../GoogleMapComponent"
import { Form, HasError, AlertError } from 'vform'
export default {
  name: 'Shop',
  components: {HasError,GoogleMap},
  data: function(){
    return {
      loaded: false,
      form: new Form({
          "id" : "",
          "name" : "",
          "description" : "",
          "address" : "",
          "latitude" : "",
          "longitude" : "",
          "active" : "",
          "user" : "",
          "created_at" : "",
          "updated_at" : "",
        
      })
    }
  },
  created: function(){
    this.getShop();
  },
  methods: {
    getShop: function(Shop){
      
      var that = this;
      this.form.get('/api/shops/'+this.$route.params.id).then(function(response){
        console.log(response.data);
        that.form.fill(response.data);
        that.loaded = true;
      }).catch(function(e){
          if (e.response && e.response.status == 404) {
              that.$router.push('/404');
          }
      });
      
    },
    updateShop: function(){
      
      var that = this;
      this.form.put('/api/shops/'+this.$route.params.id).then(function(response){
        that.form.fill(response.data);
      })
      
    },
    deleteShop: function(){
      
      var that = this;
      this.form.delete('/api/shops/'+this.$route.params.id).then(function(response){
        that.form.fill(response.data);
        that.$router.push('/shops');
      })
      
    },
    onChildClick(value){
      console.log(value);
      this.form.address = value.formatted_address;
      this.form.latitude = value.geometry.location.lat();
      this.form.longitude = value.geometry.location.lng();
    }
  }
}
</script>