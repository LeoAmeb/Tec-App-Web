<template>
    <div class="container">
        <div>
            <div>
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Ventas</h1>
                <p class="mb-4">Listado de los Ventas del micrositio.</p>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h2 class="m-0 font-weight-bold text-primary">
                            Tabla de Ventas
                        </h2>
                        <button
                            type="button"
                            class="btn btn-primary btn-sm"
                            data-toggle="modal"
                            data-target="#exampleModal"
                            @click="listCategorias()"
                        >
                            Nuevo ventao
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table table-bordered"
                                id="dataTable"
                                width="100%"
                                cellspacing="0"
                            >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Folio</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Folio</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                                <tbody v-if="ventas.length > 0">
                                    <tr
                                        v-for="(venta, index) in ventas"
                                        :key="venta.id"
                                    >
                                        <td>
                                            <router-link
                                                :to="'/admin/venta/' + venta.id"
                                                >{{ venta.id }}</router-link
                                            >
                                        </td>
                                        <td>{{ venta.folio }}</td>
                                        <td>{{ venta.cantidadTotal }}</td>
                                        <td>$ {{ venta.total }}</td>
                                        <td>
                                            <div class="row">
                                                <button
                                                    class="btn btn-danger btn-sm"
                                                    @click.prevent="
                                                        deleteVenta(
                                                            venta,
                                                            index
                                                        )
                                                    "
                                                    type="button"
                                                    :disabled="form.busy"
                                                    name="button"
                                                >
                                                    <i class="fas fa-trash"></i>
                                                    {{
                                                        form.busy
                                                            ? "Please wait..."
                                                            : "Delete"
                                                    }}
                                                </button>
                                                <router-link
                                                    :to="
                                                        '/admin/venta/' +
                                                            venta.id
                                                    "
                                                >
                                                    <button
                                                        class="btn btn-primary btn-sm"
                                                        type="button"
                                                        :disabled="form.busy"
                                                        name="button"
                                                    >
                                                        <i
                                                            class="fas fa-edit"
                                                        ></i>
                                                        {{
                                                            form.busy
                                                                ? "Please wait..."
                                                                : "Edit"
                                                        }}
                                                    </button>
                                                </router-link>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="half" hidden>
            <h1>Create venta</h1>

            <form @submit.prevent="createVenta">
                <div class="form-group">
                    <input type="hidden" v-model="form.id" />
                </div>
                <div class="form-group">
                    <input type="hidden" v-model="form.created_at" />
                </div>
                <div class="form-group">
                    <input type="hidden" v-model="form.updated_at" />
                </div>
                <div class="form-group">
                    <label>folio</label>
                    <input type="text" v-model="form.folio" maxlength="255" />
                    <has-error :form="form" field="folio"></has-error>
                </div>
                <div class="form-group">
                    <label>cantidadTotal</label>
                    <input type="number" v-model="form.cantidadTotal" />
                    <has-error :form="form" field="cantidadTotal"></has-error>
                </div>
                <div class="form-group">
                    <label>total</label>
                    <input type="number" v-model="form.total" />
                    <has-error :form="form" field="total"></has-error>
                </div>

                <div class="form-group">
                    <button
                        class="button"
                        type="submit"
                        :disabled="form.busy"
                        name="button"
                    >
                        {{ form.busy ? "Please wait..." : "Submit" }}
                    </button>
                </div>
            </form>
        </div>
        <!-- End first half -->

        <div class="half" hidden>
            <h1>List ventas</h1>

            <ul v-if="ventas.length > 0">
                <li v-for="(venta, index) in ventas" :key="venta.id">
                    <router-link :to="'/admin/venta/' + venta.id">
                        venta {{ index }}

                        <button
                            @click.prevent="deleteVenta(venta, index)"
                            type="button"
                            :disabled="form.busy"
                            name="button"
                        >
                            {{ form.busy ? "Please wait..." : "Delete" }}
                        </button>
                    </router-link>
                </li>
            </ul>

            <span v-else-if="!ventas">Loading...</span>
            <span v-else>No ventas exist</span>
        </div>
        <!-- End 2nd half -->
    </div>
</template>

<script>
import { Form, HasError, AlertError } from "vform";
export default {
    name: "Venta",
    components: { HasError },
    data: function() {
        return {
            ventas: false,
            form: new Form({
                id: "",
                created_at: "",
                updated_at: "",
                folio: "",
                cantidadTotal: "",
                total: ""
            })
        };
    },
    created: function() {
        this.listVentas();
    },
    methods: {
        listVentas: function() {
            var that = this;
            this.form.get("/api/ventas").then(function(response) {
                that.ventas = response.data;
            });
        },
        createVenta: function() {
            var that = this;
            this.form.post("/api/ventas").then(function(response) {
                that.ventas.push(response.data);
            });
        },
        deleteVenta: function(venta, index) {
            var that = this;
            this.form
                .delete("/api/ventas/" + venta.id)
                .then(function(response) {
                    that.ventas.splice(index, 1);
                });
        }
    }
};
</script>

<style lang="less">
.ventas {
    margin: 0 auto;
    width: 700px;
    display: flex;
    .half {
        flex: 1;
        &:first-of-type {
            margin-right: 20px;
        }
    }
    form {
        .form-group {
            margin-bottom: 20px;
            label {
                display: block;
                margin-bottom: 5px;
                text-transform: capitalize;
            }
            input[type="text"],
            input[type="number"],
            textarea {
                width: 100%;
                max-width: 100%;
                min-width: 100%;
                padding: 10px;
                border-radius: 3px;
                border: 1px solid silver;
                font-size: 1rem;
                &:focus {
                    outline: 0;
                    border-color: blue;
                }
            }
            .invalid-feedback {
                color: red;
                &::first-letter {
                    text-transform: capitalize;
                }
            }
        }
        .button {
            appearance: none;
            background: #3bdfd9;
            font-size: 1rem;
            border: 0px;
            padding: 10px 20px;
            border-radius: 3px;
            font-weight: bold;
            &:hover {
                cursor: pointer;
                background: darken(#3bdfd9, 10);
            }
        }
    }
}
</style>
