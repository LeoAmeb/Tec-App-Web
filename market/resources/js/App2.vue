<template>
  <div>
    <div v-if="logged">
      <NavbarAuth></NavbarAuth>
    </div>
    <div v-else>
      <NavbarGuest></NavbarGuest>
    </div>
    <Micrositio></Micrositio>
  </div>
</template>

<script>
import Micrositio from "./components/Micrositio/Micrositio";
import NavbarAuth from "./components/Layouts/Navbars/Navs/Auth";
import NavbarGuest from "./components/Layouts/Navbars/Navs/Guest";

export default {
  components: {
    Micrositio,
    NavbarAuth,
    NavbarGuest
  },
  data: function () {
    return {
      /*user_id: (this.user_id = document
        .querySelector('meta[name="user-id"]')
        .getAttribute("content")),*/
      role: "",
      logged: Boolean
    };
  },
  created: function () {
    this.checkLogin()
  },
  methods:{
    checkLogin: function (){
      var that = this;
      if(document.querySelector('meta[name="user_id"]')){
        that.logged = true;
        console.log("Sesión iniciada");
      }else{
        console.log("Sin sesión");
        that.logged = false;
      }
    }
  }
};
</script>