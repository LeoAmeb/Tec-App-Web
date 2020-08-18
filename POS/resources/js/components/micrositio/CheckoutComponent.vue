<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-shopping-cart"></i> Carrito de compra
                </h5>
            </div>
            <div class="card-body" v-if="carrito.length > 0">
                <div v-for="(producto, index) in carrito" :key="index">
                    <div class="media mb-3">
                        <div class="mr-2">
                            <div class="rounded vue-logo"></div>
                        </div>
                        <div class="media-body">
                            <strong class="d-block">{{
                                producto.nombre
                            }}</strong
                            ><span
                                >Quantity: {{ producto.qty }} - ${{
                                    producto.qty * producto.precio
                                }}</span
                            >
                        </div>
                        <div class="media-right align-middle">
                            <button
                                type="button"
                                aria-label="Remove"
                                class="close"
                                @click="deleteCart(producto)"
                            >
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                </div>

                <ul class="list-group">
                    <li class="list-group-item">
                        Subtotal ({{ carrito.length }} items): ${{ subtotal }}
                        <!---->
                    </li>
                    <li class="list-group-item">
                        Shipping:
                        <span> ${{ envio }}</span
                        ><!---->
                    </li>
                    <li class="list-group-item">
                        <strong>Total:</strong><strong> ${{ total }}</strong
                        ><!---->
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <p>Tu carrito está vacio, agrega productos.</p>
            </div>

            <div class="card-footer">
                <button
                    type="button"
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#exampleModal"
                >
                    Launch demo modal
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Venta
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table product-card-font">
                            <thead>
                                <tr>
                                    <td>Producto</td>
                                    <td>Cantidad</td>
                                    <td>Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(producto, index) in carrito"
                                    :key="index"
                                >
                                    <td>{{ producto.nombre }}</td>
                                    <td>{{ producto.qty }}</td>
                                    <td>
                                        {{ producto.precio * producto.qty }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row mx-0 mb-4">
                            <div class="col-6">
                                <h5>Total</h5>
                            </div>
                            <div class="col-6">
                                <h5>${{ total }}</h5>
                            </div>
                        </div>

                        <input
                            class="form-control"
                            v-model="form.cantidadTotal"
                            type="number"
                            id="pago"
                        />
                        <input
                            class="form-control"
                            v-model="form.total"
                            type="number"
                            id="pago"
                        />
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Cancelar Venta
                        </button>
                        <button type="button" class="btn btn-primary">
                            Pagar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        carrito: Array
    },
    data() {
        return {
            envio: 60.0,
            form: new Form({
                total: "",
                cantidad: ""
            })
        };
    },
    computed: {
        deleteCart() {},
        subtotal() {
            var subtotal = 0.0;
            if (this.carrito.length > 0) {
                this.carrito.forEach(item => {
                    console.log();
                    subtotal = subtotal + parseFloat(item.precio) * item.qty;
                });
            }
            return subtotal;
        },
        total() {
            var total = this.subtotal;
            total = total + this.envio;
            return total;
        },
        cantidadTotal() {
            var cantidadTotal = 0;
            if (this.carrito.length > 0) {
                this.carrito.forEach(item => {
                    console.log();
                    cantidadTotal = item.qty + cantidadTotal;
                });
            }
            this.form.cantidadTotal = cantidadTotal;
            return cantidadTotal;
        }
    },

    mounted() {},
    methods: {}
};
</script>
