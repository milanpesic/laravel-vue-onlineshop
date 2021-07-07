<template>
    <div class="btn-group" style="width: 160px;">
        <button type="button" @click="this.quantity--" :disabled="this.quantity === 1" class="btn btn-light border border-3 shadow-none col-1 fw-bold">-</button>
        <input type="number" v-model.number="quantity" name="quantity" class="btn border border-3 shadow-none col-3 fw-bold" min="1" max="10" readonly>                 
        <button type="button" @click="this.quantity++" :disabled="this.quantity === 10" class="btn btn-light border border-3 shadow-none col-1 fw-bold">+</button>
    </div>
</template>

<script>

export default {
    props: {
        productID: {
            type: Number
        },
        qty: {
            type: [Number, String],
            default: 1
        },
        products: Object,
    },
    data() {
        return {
            quantity: this.qty,
        }
    },
    methods: {
       async cartUpdate(id, quantity) {
              await axios.post('http://127.0.0.1:8000/cart/store/' + id, { quantity: quantity})
                    .then(response => (this.$emit('cart:update', response.data)))
                    .catch(function (error) {
                        console.log(error);
                    })
        }
    },
    watch: {
        quantity: function() {
            return this.cartUpdate(this.productID, this.quantity)
        }
    },
}
</script>