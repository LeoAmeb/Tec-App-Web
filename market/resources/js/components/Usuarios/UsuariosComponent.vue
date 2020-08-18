<template>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Usuarios</h4>
        <p class="card-category">Aquí puedes administrar a los usuarios registrados en el sistema</p>
      </div>
      <div class="card-body">
        <div>
            <router-link class="btn btn-primary" to="/users/add">Añadir usuario</router-link>
        </div>

        <div class="table-responsive">
          <table class="table" v-if="users.length > 0">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th>Nombre</th>
                <th>Correo electrónico</th>
                <th>Rol</th>
                <th class="text-right"></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(user,index) in users" :key="user.id">
                <td class="text-center">{{index+1}}</td>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td>{{user.role}}</td>
                <td class="td-actions text-right">
                  <router-link :to="'/users/edit/'+user.id" tag="button" class="btn btn-success">
                    <i class="material-icons">edit</i>
                    <button class="button "></button>
                  </router-link>
                  <button
                    @click.prevent="deleteUser(user,index)"
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
          <span v-else-if="!users">Cargando...</span>
          <span v-else>No hay usuarios</span>
        </div>
      </div>
      </div>
    </div>
</template>

<script>
import { Form, HasError, AlertError } from "vform";
export default {
  name: "User",
  components: { HasError },
  data: function() {
    return {
      users: false,
      form: new Form({
        id: "",
        name: "",
        email: "",
        password: "",
        role: "",
        created_at: "",
        updated_at: ""
      })
    };
  },
  created: function() {
    this.listUsers();
  },
  methods: {
    listUsers: function() {
      var that = this;
      this.form.get("/api/users").then(function(response) {
        that.users = response.data;
      });
    },
    createUser: function() {
      var that = this;
      this.form.post("/api/users").then(function(response) {
        that.users.push(response.data);
      });
    },
    deleteUser: function(user, index) {
      var that = this;
      this.form.delete("/api/users/" + user.id).then(function(response) {
        that.users.splice(index, 1);
      });
    }
  }
};
</script>