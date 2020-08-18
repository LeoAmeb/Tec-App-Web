<template>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Crear usuario</h4>
      </div>
      <div class="card-body">
        <form @submit.prevent="createUser">
          <div class="form-group">
            <input type="hidden" v-model="form.id" />
          </div>
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" v-model="form.name" maxlength="255" />
            <has-error :form="form" field="name"></has-error>
          </div>
          <div class="form-group">
            <label>Correo electrónico</label>
            <input type="text" v-model="form.email" maxlength="255" class="form-control" />
            <has-error :form="form" field="email"></has-error>
          </div>
          <div class="form-group">
            <label>Contraseña</label>
            <input type="password" v-model="form.password" class="form-control" maxlength="255" />
            <has-error :form="form" field="password"></has-error>
          </div>
          <div class="form-group">
            <label>Rol</label>
            <select id="role" name="role" class="form-control" v-model="form.role" required>
              <option value disabled selected hidden>Seleccione el tipo de usuario</option>
              <option value="user">Empresa</option>
              <option value="customer">Cliente</option>
            </select>
            <has-error :form="form" field="role"></has-error>
          </div>
          <div class="form-group">
            <input type="hidden" v-model="form.created_at" />
          </div>
          <div class="form-group">
            <input type="hidden" v-model="form.updated_at" />
          </div>

          <div class="form-group">
            <button
              class="btn btn-primary"
              type="submit"
              :disabled="form.busy"
              name="button"
            >{{ (form.busy) ? 'Espere...' : 'Agregar'}}</button>
            <router-link class="btn btn-success" to="/users">Cancelar</router-link>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { Form, HasError, AlertError } from "vform";
export default {
  name: "User",
  components: { HasError },
  data: function () {
    return {
      users: false,
      form: new Form({
        id: "",
        name: "",
        email: "",
        password: "",
        role: "",
        created_at: "",
        updated_at: "",
      }),
    };
  },
  created: function () {},
  methods: {
    createUser: function () {
      var that = this;
      this.form.post("/api/users").then(function (response) {
        //that.users.push(response.data);
      });
    },
  },
};
</script>