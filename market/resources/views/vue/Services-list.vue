<template lang="html">
      <div class="services">
        
        <div class="half">
          
          <h1>Create service</h1>
          
          <form @submit.prevent="createService">
            
            <div class="form-group">
   
                  <input type="hidden" v-model="form.id"></input>
            </div>
            <div class="form-group">
                  <label>name</label>
                  <input type="text" v-model="form.name"  maxlength="255" ></input>
                  <has-error :form="form" field="name"></has-error>
            </div>
            <div class="form-group">
                  <label>description</label>
                  <textarea v-model="form.description" ></textarea>
            </div>
            <div class="form-group">
                  <label>price</label>
                  <input type="number" v-model="form.price"></input>
                  <has-error :form="form" field="price"></has-error>
            </div>
            <div class="form-group">
                  <label>active</label>
                  <input type="number" v-model="form.active"></input>
                  <has-error :form="form" field="active"></has-error>
            </div>
            <div class="form-group">
                  <label>shop_id</label>
                  <input type="number" v-model="form.shop_id"></input>
                  <has-error :form="form" field="shop_id"></has-error>
            </div>
            <div class="form-group">
                  <label>category_id</label>
                  <input type="number" v-model="form.category_id"></input>
                  <has-error :form="form" field="category_id"></has-error>
            </div>
            <div class="form-group">
   
                  <input type="hidden" v-model="form.created_at"></input>
            </div>
            <div class="form-group">
   
                  <input type="hidden" v-model="form.updated_at"></input>
            </div>
        
            <div class="form-group">
                <button class="button" type="submit" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Submit'}}</button>
            </div>
          </form>
          
        </div><!-- End first half -->
        
        <div class="half">
          
          <h1>List services</h1>
          
          <ul v-if="services.length > 0">
            <li v-for="(service,index) in services" :key="service.id">
              
            <router-link :to="'/service/'+service.id">
              
              service {{ index }}

              <button @click.prevent="deleteService(service,index)" type="button" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Delete'}}</button>
              
            </router-link>
              
            </li>
          </ul>
          
          <span v-else-if="!services">Loading...</span>
          <span v-else>No services exist</span>
          
        </div><!-- End 2nd half -->
        
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

<style lang="less">
.services{
    margin:0 auto;
    width:700px;
    display:flex;
    .half{
      flex:1;
      &:first-of-type{
        margin-right:20px;
      }
    }
    form{
      .form-group{
        margin-bottom:20px;
        label{
          display:block;
          margin-bottom:5px;
          text-transform: capitalize;
        }
        input[type="text"],input[type="number"],textarea{
          width:100%;
          max-width:100%;
          min-width:100%;
          padding:10px;
          border-radius:3px;
          border:1px solid silver;
          font-size:1rem;
          &:focus{
            outline:0;
            border-color:blue;
          }
        }
        .invalid-feedback{
          color:red;
          &::first-letter{
            text-transform:capitalize;
          }
        }
      }
      .button{
        appearance: none;
        background: #3bdfd9;
        font-size: 1rem;
        border: 0px;
        padding: 10px 20px;
        border-radius: 3px;
        font-weight: bold;
        &:hover{
          cursor:pointer;
          background: darken(#3bdfd9,10);
        }
      }
    }
}
</style>