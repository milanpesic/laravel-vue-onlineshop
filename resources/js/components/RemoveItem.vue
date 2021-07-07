<template>
    <div>
        <button @click="removeItem(productID)" class="badge bg-secondary">Remove</button>
    </div>
</template>

<script>
export default {
    props: {
        productID: {
            type: Number
        },
    },
    methods: {
        removeItem(id) {
            axios.post('http://127.0.0.1:8000/cart/remove/' + id)
                .then(response => (this.$emit('cart:remove', response.data), emitter.emit('cart:count', response.data)))
                .catch(function (error) {
                    console.log(error);
            })
        }
    }
}
</script>