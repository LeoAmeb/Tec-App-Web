<template lang="html">
      <div class="ShopSingle">
        <h1>Update Shop</h1>
        
        <form @submit.prevent="updateShop" v-if="loaded">
          
          <router-link to="/shops">Back to shops</router-link>
          
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
                  <label>address</label>
                  <input type="text" v-model="form.address"  maxlength="255" ></input>
            </div>
            <div class="form-group">
                  <label>latitude</label>
                  <input type="text" v-model="form.latitude"  maxlength="255" ></input>
            </div>
            <div class="form-group">
                  <label>longitude</label>
                  <input type="text" v-model="form.longitude"  maxlength="255" ></input>
            </div>
            <div class="form-group">
                  <label>active</label>
                  <input type="number" v-model="form.active"></input>
                  <has-error :form="form" field="active"></has-error>
            </div>
            <div class="form-group">
                  <label>user_id</label>
                  <input type="number" v-model="form.user_id"></input>
            </div>
            <div class="form-group">
   
                  <input type="hidden" v-model="form.created_at"></input>
            </div>
            <div class="form-group">
   
                  <input type="hidden" v-model="form.updated_at"></input>
            </div>
      
          <div class="form-group">
              <button class="button" type="submit" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Update'}}</button>
              <button @click.prevent="deleteShop">{{ (form.busy) ? 'Please wait...' : 'Delete'}}</button>
          </div>
        </form>
        
        <span v-else>Loading shop...</span>
      </div>
</template>

<script>
import { Form, HasError, AlertError } from 'vform'
export default {
  name: 'Shop',
  components: {HasError},
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
          "user_id" : "",
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
      
    }
  }
}
</script>

<style lang="less">
.ShopSingle{
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