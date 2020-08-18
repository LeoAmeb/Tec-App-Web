<template lang="html">
      <div class="shops">
        
        <div class="half">
          
          <h1>Create shop</h1>
          
          <form @submit.prevent="createShop">
            
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
                <button class="button" type="submit" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Submit'}}</button>
            </div>
          </form>
          
        </div><!-- End first half -->
        
        <div class="half">
          
          <h1>List shops</h1>
          
          <ul v-if="shops.length > 0">
            <li v-for="(shop,index) in shops" :key="shop.id">
              
            <router-link :to="'/shop/'+shop.id">
              
              shop {{ index }}

              <button @click.prevent="deleteShop(shop,index)" type="button" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Delete'}}</button>
              
            </router-link>
              
            </li>
          </ul>
          
          <span v-else-if="!shops">Loading...</span>
          <span v-else>No shops exist</span>
          
        </div><!-- End 2nd half -->
        
      </div>
</template>

<script>
import { Form, HasError, AlertError } from 'vform'
export default {
  name: 'Shop',
  components: {HasError},
  data: function(){
    return {
      shops : false,
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
    this.listShops();
  },
  methods: {
    listShops: function(){
      
      var that = this;
      this.form.get('/api/shops').then(function(response){
        that.shops = response.data;
      })
      
    },
    createShop: function(){
      
      var that = this;
      this.form.post('/api/shops').then(function(response){
        that.shops.push(response.data);
      })
      
    },
    deleteShop: function(shop, index){
      
      var that = this;
      this.form.delete('/api/shops/'+shop.id).then(function(response){
        that.shops.splice(index,1);
      })
      
    }
  }
}
</script>

<style lang="less">
.shops{
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