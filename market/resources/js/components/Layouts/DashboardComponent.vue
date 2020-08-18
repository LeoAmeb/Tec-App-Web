<template>
<div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-twitter"></i>
              </div>
              <p class="card-category">Followers</p>
              <h3 class="card-title">+245</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Just Updated
              </div>
            </div>
          </div>
        </div>
</div>
</template>

<script>
export default {
  name: "Dashboard",
  created: function() {
    this.listUsers();
  },
  methods: {
    listUsers: function() {
      var that = this;
      this.form.get("/api/users").then(function(response) {
        console.log(response.data);
      });
    }
  }
};
</script>