<template>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Editar usuario</h4>
      </div>
      <div class="card-body">
        <form @submit.prevent="updateUser" v-if="loaded">
          <div class="form-group">
            <input type="hidden" v-model="form.id" />
          </div>
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" v-model="form.name" maxlength="255" class="form-control" />
            <has-error :form="form" field="name"></has-error>
          </div>
          <div class="form-group">
            <label>Correo electrónico</label>
            <input type="text" v-model="form.email" maxlength="255" class="form-control" />
            <has-error :form="form" field="email"></has-error>
          </div>
          <div class="form-group">
            <label>Rol</label>
            <select
              id="role"
              name="role"
              class="form-control"
              v-model="form.role"
              required
              disabled
            >
              <option
                v-for="role in roles"
                :value="role.name"
                :selected="role.name == form.role"
                v-bind:key="role.name"
              >{{role.desc}}</option>
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
            >{{ (form.busy) ? 'Please wait...' : 'Actualizar'}}</button>
            <router-link class="btn btn-success" to="/users">Cancelar</router-link>
          </div>
        </form>

        <span v-else>Cargando...</span>
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
      loaded: false,
      form: new Form({
        id: "",
        name: "",
        email: "",
        password: "",
        role: "",
        role_id: "",
        created_at: "",
        updated_at: "",
      }),
      roles: [
        {
          name: "user",
          desc: "Usuario",
        },
        {
          name: "customer",
          desc: "Cliente",
        },
      ],
    };
  },
  created: function () {
    this.getUser();
  },
  methods: {
    getUser: function (User) {
      var that = this;
      this.form
        .get("/api/users/" + this.$route.params.id)
        .then(function (response) {
          that.form.fill(response.data);
          that.loaded = true;
        })
        .catch(function (e) {
          if (e.response && e.response.status == 404) {
            that.$router.push("/404");
          }
        });
    },
    updateUser: function () {
      var that = this;
      this.form
        .put("/api/users/" + this.$route.params.id)
        .then(function (response) {
          that.form.fill(response.data);
          $(".alert-success").fadeIn().delay(10000).fadeOut();
          //that.$router.push('/users');
        });
    },
  },
};
</script>