import Dashboard from './components/Layouts/DashboardComponent.vue';

import Usuarios from './components/Usuarios/UsuariosComponent.vue';
import Usuario from './components/Usuarios/UsuarioComponent.vue';
import AddUsuario from './components/Usuarios/AgregarUsuario.vue';

import Empresas from './components/Empresas/EmpresasComponent.vue';
import Empresa from './components/Empresas/EmpresaComponent.vue';
import AddEmpresa from './components/Empresas/AgregarEmpresaComponent.vue';

import Productos from './components/Productos/ProductosComponent.vue';
import Producto from './components/Productos/ProductoComponent.vue';

import Servicios from './components/Servicios/ServiciosComponent.vue';
import Servicio from './components/Servicios/ServicioComponent.vue';

import Micrositio from './components/Micrositio/Micrositio.vue';

import Login from './components/Login.vue';
import Register from './components/Register.vue';


export const guestRoutes = [
    {
        name:'micrositio',
        path: 'm/:id/',
        component: Micrositio
    }
];

export const routes = [
    {
        name: 'dashboard',
        path: '/home',
        component: Dashboard
    },
    {
        name: 'dashboard',
        path: '/',
        component: Dashboard
    },
    {
        name: 'user',
        path: '/users',
        component: Usuarios
    },
    {
        name: 'user_edit',
        path: '/users/edit/:id',
        component: Usuario
    },
    {
        name: 'user_add',
        path: '/users/add',
        component: AddUsuario
    },
    {
        name: 'shops',
        path: '/shops',
        component: Empresas
    },
    {
        name: 'shop_edit',
        path: '/shops/edit/:id',
        component: Empresa
    },
    {
        name: 'shop_add',
        path: '/shops/add',
        component: AddEmpresa
    },
    {
        name: 'products',
        path: '/products',
        component: Productos
    },
    {
        name: 'product_edit',
        path: '/products/edit/:id',
        component: Producto
    },
    {
        name: 'services',
        path: '/services',
        component: Servicios
    },
    {
        name: 'service_edit',
        path: '/services/edit:id',
        component: Servicio
    }
];

export default { guestRoutes, routes };