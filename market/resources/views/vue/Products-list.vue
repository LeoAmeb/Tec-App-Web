<template lang="html">
      <div class="products">
        
        <div class="half">
          
          <h1>Create product</h1>
          
          <form @submit.prevent="createProduct">
            
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
                  <label>stock</label>
                  <input type="number" v-model="form.stock"></input>
                  <has-error :form="form" field="stock"></has-error>
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
          
          <h1>List products</h1>
          
          <ul v-if="products.length > 0">
            <li v-for="(product,index) in products" :key="product.id">
              
            <router-link :to="'/product/'+product.id">
              
              product {{ index }}

              <button @click.prevent="deleteProduct(product,index)" type="button" :disabled="form.busy" name="button">{{ (form.busy) ? 'Please wait...' : 'Delete'}}</button>
              
            </router-link>
              
            </li>
          </ul>
          
          <span v-else-if="!products">Loading...</span>
          <span v-else>No products exist</span>
          
        </div><!-- End 2nd half -->
        
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

<style lang="less">
.products{
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