<template>
<div>
    <div class="sidebar" data-color="azure" data-background-color="white">

    <div class="logo">
        <a href="#" class="simple-text logo-normal">
        {{ __('Micrositios') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            <span class="sidebar-mini"> UM </span>
            <span class="sidebar-normal"> {{ __('User Management') }} </span>
            </a>
        </li>
        <li class="nav-item">
            <router-link to = "/categories">Categorías</router-link>
            <span class="sidebar-mini"> UM </span>
            <span class="sidebar-normal"> {{ __('Categorias') }} </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            <span class="sidebar-mini"> UM </span>
            <span class="sidebar-normal"> {{ __('Servicios') }} </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            <span class="sidebar-mini"> UP </span>
            <span class="sidebar-normal">{{ __('User profile') }} </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="material-icons">content_paste</i>
            <p>{{ __('Table List') }}</p>
            </a>
        </li>
        </ul>
    </div>
    </div>

    <transition name="slide-fade">
        <router-view></router-view>
    </transition>

</div>
</template>