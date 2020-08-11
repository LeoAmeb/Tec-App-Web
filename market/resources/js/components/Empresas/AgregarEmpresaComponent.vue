<template>
<!-- 
  Componente para el registro de empresas
 -->
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Crear tienda</h4>
      </div>
      <div class="card-body">
        <!-- Formulario -->
        <form @submit.prevent="createShop">
          <div class="form-group">
            <input type="hidden" v-model="form.id" />
          </div>
          <!-- Input Nombre -->
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" v-model="form.name" maxlength="255" />
            <has-error :form="form" field="name"></has-error>
          </div>

          <!-- Input Descripción -->
          <div class="form-group">
            <label>Descripción</label>
            <textarea class="form-control" v-model="form.description"></textarea>
          </div>

          <!-- Select estado de la empresa -->
          <div class="row d-flex align-content-start flex-wrap">
            <div class="col form-group">
              <label>Estado</label>
              <select v-model="form.active" name="status" id="status" class="form-control" required>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
              <has-error :form="form" field="active"></has-error>
            </div>
            <div class="col form-group">
              <label>Usuario</label>
              <select
                v-model="form.user_id"
                name="user_id"
                id="user_id"
                class="form-control"
                required
              >
                <option
                  value
                  disabled
                  selected
                  hidden
                >Seleccione el administrador de la tienda</option>
                <option v-for="user in users" :value="user.id" v-bind:key="user.id">{{user.name}}</option>
              </select>
            </div>
          </div>
          <br />
          <br />
          <GoogleMap v-on:childToParent="onChildClick"></GoogleMap>
          <div class="form-group">
            <button
              class="btn btn-primary"
              type="submit"
              :disabled="form.busy"
              name="button"
            >{{ (form.busy) ? 'Please wait...' : 'Agregar'}}</button>
            <router-link class="btn btn-success" to="/shops">Cancelar</router-link>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import GoogleMap from "../GoogleMapComponent";
import { Form, HasError, AlertError } from "vform";
export default {
  name: "Shop",
  components: { HasError, GoogleMap },
  data: function () {
    return {
      loaded: false,
      form: new Form({
        id: "",
        name: "",
        description: "",
        address: "",
        latitude: "",
        longitude: "",
        active: "",
        user_id: "",
        created_at: "",
        updated_at: "",
      }),
      users: [],
    };
  },
  created: function () {
    this.getUsers();
  },
  methods: {
    getUsers: function () {
      var that = this;
      this.form.get("/api/users_shop").then(function (response) {
        console.log(response.data);
        that.users = response.data;
      });
    },
    createShop: function () {
      var that = this;
      this.form.post("/api/shops").then(function (response) {
        /*var notify = $.notify("Empresa agregada correctamente", {
          type: "success",
          allow_dismiss: true,
        });*/
        console.log(response.data);
      });
    },
    onChildClick(value) {
      console.log(value);
      this.form.address = value.formatted_address;
      this.form.latitude = value.geometry.location.lat();
      this.form.longitude = value.geometry.location.lng();
    },
  },
};
</script>