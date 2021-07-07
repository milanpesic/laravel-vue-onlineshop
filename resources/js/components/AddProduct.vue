<template>
     <div>
        <button @click="addToCart(id)" :disabled="cartHasProduct" :class="[cartHasProduct ? 'btn btn-warning fw-bold' : 'btn btn-dark ', 'shadow-none']" type="button">{{ added }}</button>
    </div>
</template>

<script>


export default {
    props: {
        id: {
            type: Number,
        },
        cart: {
            type: Object,
        }
    },
    data() {
        return {
            cartHasProduct: this.cart && this.id in this.cart,
            productIsNotAdded: 'Add to cart',
            productIsAdded: 'Product is added!',
        }
    },
    methods: {
        addToCart(id) {
            axios.post('http://127.0.0.1:8000/cart/store/' + id, { quantity: 1})
                .then(response => (emitter.emit('cart:count', response.data), this.cartHasProduct = true))
                .catch(function (error) {
                    console.log(error);
                })
        }
    },
   computed: {
       added() {
            return this.cartHasProduct ? this.productIsAdded : this.productIsNotAdded
       },
   },
}
</script>