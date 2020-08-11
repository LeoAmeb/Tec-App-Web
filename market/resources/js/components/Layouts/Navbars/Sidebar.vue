<template>
    <div class="sidebar" data-color="danger" data-background-color="white" data-image="material/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="logo">
            <a href="/" class="simple-text logo-normal">
            MICROSITIOS
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li  class="nav-item">
                    <router-link to="/home" class="nav-link">
                        <i class="material-icons">dashboard</i>
                        Dashboard
                    </router-link>
                </li>
                <li  class="nav-item">
                    <router-link to="/users" class="nav-link">
                        <i class="material-icons">person</i>
                        Usuarios
                    </router-link>
                </li>
                <li  class="nav-item">
                    <router-link to="/shops" class="nav-link">
                        <i class="material-icons">store</i>
                        Tiendas
                    </router-link>
                </li>
                <li  class="nav-item">
                    <router-link to="/products" class="nav-link">
                        <i class="material-icons">widgets</i>
                        Productos
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/services" class="nav-link">
                        <i class="material-icons">work</i>
                        Servicios
                    </router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name:'Sidebar',
        props:{
            parentData:String
        },
        data: function(){
            return {
                role: this.parentData
            }
        }
    }
</script>