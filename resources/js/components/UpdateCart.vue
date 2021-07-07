<template>
    <div class="mt-5 mb-5">
        
        <div v-if="!empty(products)">
            <h3 class="mb-5 fw-bold lead text-center">Shopping Cart Details</h3>
            <span class="small">Update your cart or continue to checkout.</span>
            <div class="table-responsive">
                <table class="table table-borderless border border-5">
                <thead class="table-secondary">
                    <tr>
                    <th class="text-center p-3">#</th>
                    <th class="text-center p-3">Product</th>
                    <th class="text-center p-3">Price</th>
                    <th class="text-center p-3">Quantity</th>
                    <th class="text-center p-3">Total</th>
                    <th class="text-center p-3">Remove</th>
                    </tr>
                </thead>
                <tbody>        
                    <tr v-for="product in products" :key="product.id">  
                        <td class="text-center align-middle p-3" style="width: 160px;"><a :href="url + 'product/' + product.slug" target="_blank"><img :src="url + product.image" width="100"></a></td>
                        <td class="text-center align-middle p-3"><a :href="url + 'product/' + product.slug" class="text-dark fst-italic" target="_blank" v-html="product.name.substring(0, 50) + '...'"></a></td>
                        <td class="text-center align-middle fw-bold fs-5 p-3" style="width: 160px;"> {{ toCurrency(product.price) }}</td>
                        <td class="align-middle text-center p-3">              
                            <update-quantity 
                                :productID="product.id" 
                                :qty="product.quantity" 
                                @cart:update="cartResponse">
                            </update-quantity>
                        </td>
                        <td class="text-center align-middle fw-bold fs-5 p-3" style="width: 160px;">{{ toCurrency(product.price * product.quantity) }}</td>
                        <td class="text-center align-middle p-3">
                            <remove-item 
                                :productID="product.id" 
                                @cart:remove="cartResponse">
                            </remove-item>
                        </td>
                    </tr>
                </tbody>
                    <tbody>
                        <tr>
                            <th>
                               
                            </th>
                            <td></td><td></td><td class="text-center align-middle p-3 fw-bold">SubTotal</td><td class="text-center align-middle fw-bold"><span>&euro; {{ toCurrency(subtotal) }} </span></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td><td class="text-center align-middle p-3 fw-bold">Shipping</td><td class="text-center align-middle fw-bold"><span>&euro; {{ toCurrency(shipping) }}</span></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td><td class="text-center align-middle p-3 fw-bold">TOTAL</td><td class="text-center align-middle"><span class="text-success fs-5 fw-bold">&euro; {{ toCurrency(total) }}</span></td><td></td>
                        </tr>
                     
                        <tr class="table-secondary">
                            <td class="text-center align-middle p-3">
                                <cart-clear 
                                    @cart:clear="cartResponse">
                                </cart-clear>
                            </td>
                            <td></td><td></td><td></td><td></td><td class="text-center align-middle"><a class="text-decoration-none text-dark lead shadow-none" :href="url + 'order'"><button class="fs-6 fw-bold rounded">Continue</button></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div v-else>
              <empty-cart></empty-cart>
        </div>
    </div>
</template>

<script>
import UpdateQuantity from './UpdateQuantity'
import RemoveItem from './RemoveItem.vue'
import CartClear from './CartClear.vue'
import EmptyCart from './EmptyCart.vue'

export default {
    props: {
        productID: {
            type: Number,
        },
        cart: {
            type: Object,
        },
        subtotalv: [Number, String],
        shippingv: [Number, String],
        totalv: [Number, String]
    },
    data() {
        return {
            products: this.cart,
            subtotal: this.subtotalv,
            shipping: this.shippingv,
            total: this.totalv,
            url: 'http://127.0.0.1:8000/',
            toCurrency: function(value) {
               return new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(value)
            },
            empty: function(value) {

                for(let key in value) {
                        if(value.hasOwnProperty(key))
                    return false;
                 }

                return true;

            }
        } 
    },
    methods: {
        cartResponse(value) {
            this.products = value.cart
            this.subtotal = value.subtotal
            this.shipping = value.shipping
            this.total = value.total
        },
    },
    components: {
        UpdateQuantity,
        RemoveItem,
        CartClear,
        EmptyCart
    },
}
</script>