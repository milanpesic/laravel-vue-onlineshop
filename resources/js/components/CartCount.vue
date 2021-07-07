<template>
<!--
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart4 text-dark" viewBox="0 0 20 20">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
        </svg>
-->

        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>

        <sup style="margin-left: -15px" :class="[itemsCount ? 'align-top badge bg-warning text-dark fw-bolder rounded-pill' : 'align-top badge bg-danger rounded-pill']">{{ itemsCount }}</sup>
        <!-- <span :class="[itemsCount ? 'small text-success fw-bolder' : 'small text-danger fw-bolder']">{{ Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(totals) }}</span> -->
</template>

<script>

export default {    

    props: {
        cart: {
            type: Object
        },
        total: {
            type: [String, Number],
            default: 0
        }
    },
    data() {
        return {
            totals: this.total,
            itemsCount: this.cart ? Object.keys(this.cart).length : 0,

        }
    },
    mounted() {
        emitter.on('cart:count', (value) => {
            this.totals = value.total;
            this.itemsCount = value.cart ? Object.keys(value.cart).length : 0;
        })
    }
}
</script>