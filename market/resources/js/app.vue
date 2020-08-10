<script>

    import NavbarComponent from './components/NavbarComponent';
    import SidebarComponent from './components/SidebarComponent';

    export default {
        components:{
            NavbarComponent,
            SidebarComponent
        } 
    };
</script>
<template>
    <div> 
        <!-- Navbar -->
        <div class="wrapper">
            <div class="main-panel">
                <navbar-component></navbar-component>
                <sidebar-component></sidebar-component>
                <div class="content">
                <!-- Body -->
                    <transition name="slide-fade">
                        <router-view></router-view>
                    </transition>
                </div>
            </div> 
        </div>
    </div>
</template>