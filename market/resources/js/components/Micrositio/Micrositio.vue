<template>
  <div>
    <div class="card">
    <div class="alert alert-warning">
      <div class="card-header card-header-info">
         <h4 class="card-title">Productos</h4>
      </div>
    <h1>{{name}}</h1>
    <div class="container">
      <section class="new-products">
        <div class="row">
          <Product></Product>
          <Product></Product>
          <Product></Product>
          <Product></Product>
          <Product></Product>
          <Product></Product>
          <Product></Product>
          <Product></Product>

        </div>
      </section>
    </div>
    </div>
    </div>

  </div>
</template>

<script>
import { VueAgile } from "vue-agile";
import Product from "./Layouts/Product";
export default {
  components: {
    agile: VueAgile,
    Product,
  },
  data: function() {
    return {
      micrositio: false,
      form: new Form({
        "id": "",
        "name": "",
        "description":""}) ,
    };
  },created: function(){
    this.getInfo();
  },
  methods:{
    getInfo: function(){
      var that = this;
     var api = '/api/shops/'+this.$route.path;
      this.form.get(api).then(function(response){
        that.form.fill(response.data)
        console.log(response.data);
      }).catch(function(e){
          if (e.response && e.response.status == 404) {
              that.$router.push('/404');
          }
      });
    }
  }
};
</script>

<style lang="sass">
.slide
  align-items: center
  color: black
  background-color: #ffffff
  display: flex
  height: 400px
  justify-content: center

  h3
    font-size: 32px
    font-weight: 300


</style>

<style lang="css">
  section{
    margin-bottom: 70px;
  }
</style>