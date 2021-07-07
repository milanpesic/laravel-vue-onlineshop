<template>
    <button @click="cartClear" class="rounded fs-6 fw-bold">Clear Cart</button>      
</template>

<script>
export default {
    methods: {
        cartClear() {
            axios.post('http://127.0.0.1:8000/cart/clear')
                .then(response => (this.$emit('cart:clear', response.data), emitter.emit('cart:count', response.data)))
                .catch(function (error) {
                    console.log(error);
            })
        }
    }
}
</script>