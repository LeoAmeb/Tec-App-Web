<template>
    <div class="container">
        <div class="col-8">
            <div id="productos">
                <div class="row" v-if="products.length > 0">
                    <div
                        class="col-lg-4 col-md-6 mb-4"
                        v-for="(product, index) in products"
                        :key="product.id"
                    >
                        <div class="card h-100">
                            <a href="#"
                                ><img
                                    class="card-img-top"
                                    src="http://placehold.it/700x400"
                                    alt=""
                            /></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">{{ product.nombre }}</a>
                                </h4>
                                <h5>${{ product.precio }}</h5>
                                <p class="card-text">
                                    Stock: {{ product.stock }}
                                </p>
                                <p class="card-text">
                                    Descripcion: {{ product.descripcion }}
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <a
                                        class="btn btn-sm btn-primary float-right"
                                        @click="addToCart(product)"
                                        ><i class="fas fa-cart-plus"></i> Añadir
                                        al carrito.</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="col-4">
                <checkout-component :carrito="carrito"></checkout-component>
            </div>
        </div>
    </div>
    <!-- /.container -->
</template>

<style lang="less">
.shop {
    display: flex;
    width: 100%;
}
.productos {
    width: 70%;
    height: 100%;
}

.carrito {
    width: 30%;
    height: 100vh;
}
</style>
<script>
export default {
    data() {
        return {
            loaded: false,
            servicios: false,
            products: false,
            carrito: []
        };
    },

    mounted() {
        this.listProducts();
        this.listServicios();
    },
    methods: {
        logout() {
            this.axios
                .post("/logout")
                .then(response => {
                    if (response.status === 302 || 401) {
                        //console.log("logout");
                        window.location = "/";
                    } else {
                        // throw error and go to catch block
                    }
                })
                .catch(error => {});
        },
        addToCart(product) {
            var index = this.carrito.indexOf(product);
            if (index >= 0) {
                product.qty = this.carrito[index].qty + 1;
                this.carrito.push(product);
                this.carrito.splice(index, 1);
            } else {
                product.qty = 1;
                this.carrito.push(product);
            }
        },
        listProducts() {
            var that = this;
            this.axios.get("/api/products").then(function(response) {
                that.products = response.data;
            });
        },

        listServicios() {
            var that = this;
            this.axios.get("/api/servicios").then(function(response) {
                that.servicios = response.data;
            });
        }
    }
};
</script>
