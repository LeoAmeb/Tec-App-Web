<template lang="html">
      <div class="ServiceSingle">
        <h1>Update Service</h1>
        
        <form @submit.prevent="updateService" v-if="loaded">
          
          <router-link to="/services">< Back to services</router-link>
          
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
              <button class="button" type="submit" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Update'}}</button>
              <button @click.prevent="deleteService">{{ (form.busy) ? 'Please wait...' : 'Delete'}}</button>
          </div>
        </form>
        
        <span v-else>Loading service...</span>
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

<style lang="less">
.ServiceSingle{
  margin:0 auto;
  width:700px;
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
      .invalid-feedback{
        color:red;
        &::first-letter{
          text-transform:capitalize;
        }
      }
    }
  }
}
</style>