<template>
    <div class="card product">
        <img src="material/img/imac1.png" alt="Card image cap" class="product-img">
        <div class="card-body">
            <h5 class="card-title">{{product.name}}</h5>
            <small>{{product.category}}</small>
            <p class="card-text">{{product.description}}</p>
            <div class="row">
                <a v-if="product.stock > 0" href="" class="col">Agregar al carrito</a>
                <h4 class="col">{{product.price}}</h4>
            </div>
        </div>
    </div> 
</template>

<script>
export default {
    name: 'Product',
    data: function(){
        return {
            product: [{
                id:"",
                name:"",
                description:"",
                price:"",
                stock:"",
                shop_id:"",
                category:""
            }]
        }
    },
    created: function(){
        this.product.name="Calaveras y Diablitos",
        this.product.description="Invaden mi corazón",
        this.product.price="$100.00",
        this.product.stock="20",
        this.product.category="Celso Piña"
    }
}
</script>

<style lang="css">
    .product{
        width: 250px;
        margin: auto;
        margin-bottom: 10px;
    }
    .product-img{
        width: 250px;
        height: 250px;
    }
</style>