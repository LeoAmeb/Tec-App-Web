<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
    Tip 2: you can also add an image using data-image tag

    SIDE BAR DEL USUARIO ADMINISTRADOR
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('Micrositios') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <!-- DASHBOARD -->
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      <!-- MANEJO DE USUARIOS -->
      <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <span class="sidebar-mini"> UM </span>
          <span class="sidebar-normal"> {{ __('User Management') }} </span>
        </a>
      </li>
      <!-- PERFIL DE USUARIO -->
      <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('profile.edit') }}">
          <span class="sidebar-mini"> UP </span>
          <span class="sidebar-normal">{{ __('User profile') }} </span>
        </a>
      </li>

      <!-- CATEGORIAS -->
      <li class="nav-item{{ $activePage == 'categories' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('categories.index') }}">
          <span class="sidebar-mini"> C </span>
          <span class="sidebar-normal"> {{ __('Categorias') }} </span>
        </a>
      </li>

      <!-- SERVICIOS -->
      <li class="nav-item{{ $activePage == 'services' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('services.index') }}">
          <span class="sidebar-mini"> S </span>
          <span class="sidebar-normal"> {{ __('Servicios') }} </span>
        </a>
      </li>

      <!-- MICROSITIOS -->
      <li class="nav-item{{ $activePage == 'microsites' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('microsites.index') }}">
          <span class="sidebar-mini"> M </span>
          <span class="sidebar-normal">{{ __('Micrositios') }} </span>
        </a>
      </li>

        <!-- PRODUCTOS -->
        <li class="nav-item{{ $activePage == 'products' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('products.index') }}">
          <span class="sidebar-mini"> P </span>
          <span class="sidebar-normal">{{ __('Productos') }} </span>
        </a>
      </li>

      <!-- EXTRAS -->

      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
          <p>{{ __('Table List') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>