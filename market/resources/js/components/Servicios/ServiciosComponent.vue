<template>
      <div>
        
        <div class="half">
          
          <div class="card">
          <div class="card-heade  card-header-danger">
             <h4 class="card-title">Crear Servicio</h4>
          </div>
          <div class="card-body">

          <form @submit.prevent="createService">
            
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
                <button class="btn btn-primary" type="submit" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Agregar'}}</button>
            </div>
            
          </form>
          </div>
           </div>
        </div>
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title">Listado de Servicios</h4>
            </div>
            <div class="table-responsive">
            <table class="table table-shopping">
              <thead>
                  <tr>
                      <th class="text-center"></th>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th class="th-description">Descripcion</th>                      
                      <th class="th-description">Precio</th>
                      <th class="th-description">ID Tienda</th>
                      <th class="th-description">Acciones</th>
        
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  <tr v-if="services.length > 0">
                      <!-- IMAGEN -->
                      <td></td>
                      <td v-for="(service,index) in services" :key="service.id">
                        {{index}}
                      </td>

                      <td v-for="(service) in services" :key="service.id">
                        {{service.name}}
                      </td>

                      <td v-for="(service) in services" :key="service.id">
                        {{service.description}}
                      </td>

                      <td v-for="(service) in services" :key="service.id">
                        {{service.price}}
                      </td>

                      <td v-for="(service) in services" :key="service.id">
                        {{service.shop_id}}
                      </td>

                    <!-- Nombre -->
                      <td class="td-actions" v-for="(service,index) in services" :key="service.id">
                        <button @click.prevent="deleteservice(service,index)" class="btn btn-primary" type="button" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Eliminar'}}</button>
                        
                        <router-link :to="'/services/edit/'+service.id">
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
  name: 'Service',
  components: {HasError},
  data: function(){
    return {
      services : false,
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
    this.listServices();
  },
  methods: {
    listServices: function(){
      
      var that = this;
      this.form.get('/api/services').then(function(response){
        that.services = response.data;
      })
      
    },
    createService: function(){
      
      var that = this;
      this.form.post('/api/services').then(function(response){
        that.services.push(response.data);
      })
      
    },
    deleteService: function(service, index){
      
      var that = this;
      this.form.delete('/api/services/'+service.id).then(function(response){
        that.services.splice(index,1);
      })
      
    }
  }
}
</script>