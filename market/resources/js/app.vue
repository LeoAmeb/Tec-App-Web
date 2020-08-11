<!--
* Enrutamiento de componentes vue JS
-->
<template>
<div>
    <div class="wrapper">
        <Sidebar :key="role" :parentData="role"/>
        <div class="main-panel">
            <Navbar/>
            <div style="margin-top:100px; padding:20px">
                <router-view></router-view>
            </div>
        </div>
    </div>
</div>
</template>

<script>
//Se establece la plantilla de la página

//Componente SideBar
import Sidebar from './components/Layouts/Navbars/Sidebar'

//Componente Navbar
import Navbar from './components/Layouts/Navbars/Navs/Auth'

//Componente de Micrositio
import Microsite from './components/Micrositio/Micrositio'
    export default {
        components:{
            Sidebar,
            Navbar,
            Microsite
        },
        data: function(){
            return {
                user_id: this.user_id = document
                .querySelector('meta[name="user-id"]')
                .getAttribute("content"),
                role:""
            }
        },
        created: function(){
            this.getUser()
        },
        methods: {
            getUser: function(){
                var me = this;
                axios.get('/api/users/'+this.user_id).then(function(response){
                    me.role = response.data.role;
                });
            }
        }
    }
</script>