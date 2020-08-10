<template>
    <div class="sidebar" data-color="azure" data-background-color="white">

        <div class="logo">
            <a href="#" class="simple-text logo-normal">
            Micrositios
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> Aas </span>
                </a>
            </li>
            <li class="nav-item">
                <router-link to = "/microsites">Micrositios</router-link>
            </li>
            <li class="nav-item">
                <router-link to = "/categories">Categorías</router-link>
            </li>
            <li class="nav-item">
                <router-link to = "/products">Productos</router-link>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <i class="material-icons">content_paste</i>
                <p>Table List</p>
                </a>
            </li>
            </ul>
        </div>
    </div>
</template>