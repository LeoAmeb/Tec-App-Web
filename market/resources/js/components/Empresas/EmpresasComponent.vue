<template>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Tiendas</h4>
        <p class="card-category">Aquí puedes administrar las tiendas registrados en el sistema</p>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <router-link class="btn btn-primary" to="/shops/add">Añadir tienda</router-link>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table" v-if="shops.length > 0">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Administrador</th>
                <th>Estado</th>
                <th class="text-right"></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(shop,index) in shops" :key="shop.id">
                <td class="text-center">{{index+1}}</td>
                <td>{{shop.name}}</td>
                <td>{{shop.address}}</td>
                <td>{{shop.user}}</td>
                <td v-if="shop.active" style="color:green;">Activo</td>
                <td v-else style="color:red;">Inactivo</td>
                <td class="td-actions text-right">
                  <a v-if="shop.active" v-bind:href="'/'+shop.id" class="btn btn-info">
                    <i class="material-icons">language</i>
                  </a>
                  <router-link :to="'/shops/edit/'+shop.id" tag="button" class="btn btn-success">
                    <i class="material-icons">edit</i>
                  </router-link>
                  <button
                    @click.prevent="deleteShop(shop,index)"
                    type="button"
                    rel="tooltip"
                    class="btn btn-danger"
                  >
                    <i class="material-icons">close</i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
          <span v-else-if="!shops">Cargando...</span>
          <div
            v-else
            class="alert alert-danger"
            role="alert"
            style="text-align:center"
          >Actualmente no existen tiendas</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import GoogleMap from "../GoogleMapComponent";
import { Form, HasError, AlertError } from "vform";
export default {
  name: "Shop",
  components: {
    HasError,
    GoogleMap,
  },
  props: {
    mapConfig: Object,
    apiKey: String,
  },
  data: function () {
    return {
      shops: false,
      users: new Form({
        id: "",
        name: "",
        password: "",
        role: "",
      }),
      form: new Form({
        id: "",
        name: "",
        description: "",
        address: "",
        latitude: "",
        longitude: "",
        active: "",
        user_id: "",
        user: "",
        created_at: "",
        updated_at: "",
      }),
      google: null,
      map: null,
    };
  },
  created: function () {
    this.listShops();
    var that = this;
    axios.get("/api/users").then(function (response) {
      that.users = response.data;
      console.log(that.users);
    });
  },
  methods: {
    listShops: function () {
      var that = this;
      this.form.get("/api/shops").then(function (response) {
        that.shops = response.data;
      });
    },
    createShop: function () {
      var that = this;
      this.form.post("/api/shops").then(function (response) {
        that.shops.push(response.data);
      });
    },
    deleteShop: function (shop, index) {
      var that = this;
      this.form.delete("/api/shops/" + shop.id).then(function (response) {
        that.shops.splice(index, 1);
      });
    },
    onChildClick(value) {
      this.form.address = value.formatted_address;
      this.form.latitude = value.geometry.location.lat();
      this.form.longitude = value.geometry.location.lng();
    },
  },
};
</script>
