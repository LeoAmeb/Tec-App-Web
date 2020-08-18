import Home from "./components/HomeComponent.vue";
import DashboardComponent from "./components/DashboardComponent.vue";
import ExampleComponent from "./components/ExampleComponent.vue";
//Vistas de clientes
import ClientesList from "./components/clientes/Clientes-list.vue";
import ClientesEditar from "./components/clientes/Clientes-single.vue";
//Vistas de productos
import ProductosList from "./components/productos/Products-list.vue";
import ProductosEditar from "./components/productos/Products-single.vue";
//Vistas de categorias
import CategoriasList from "./components/categorias/Categorias-list.vue";
import CategoriasEditar from "./components/categorias/Categorias-single.vue";


import POS from "./components/pos/PosComponent.vue";


import Venta from "./components/Ventas-single.vue";
import Ventas from "./components/Ventas-list.vue";

export const routes = [
    {
        name: "example",
        path: "/example",
        component: ExampleComponent
    },
    {
        name: "browser",
        path: "/",
        component: Home
    },
    {
        path: "/logout",
        name: "logout",
        route: "logout"
    }
];

export const routesAdmin = [
    {
        path: "/logout",
        name: "logout",
        route: "logout"
    },
    {
        name: "dash",
        path: "/admin/",
        component: DashboardComponent
    },
    {
        name: "pos",
        path: "/admin/pos",
        component: POS
    },
    {
        name: "ventas",
        path: "/admin/ventas",
        component: Ventas
    },
    {
        name: "ventas-s",
        path: "/admin/venta/:id",
        component: Venta
    },
    {
        name: "clientes",
        path: "/admin/clientes/",
        props: true,
        component: ClientesList
    },
    {
        name: "clientesEditar",
        path: "/admin/cliente/:id",
        props: true,
        component: ClientesEditar
    },
    {
        name: "productos",
        path: "/admin/products/",
        props: true,
        component: ProductosList
    },
    {
        name: "productosEditar",
        path: "/admin/product/:id",
        props: true,
        component: ProductosEditar
    },
    {
        name: "categorias",
        path: "/admin/categorias/",
        props: true,
        component: CategoriasList
    },
    {
        name: "categoriasEditar",
        path: "/admin/categoria/:id",
        props: true,
        component: CategoriasEditar
    }
];

export default { routesAdmin, routes };
