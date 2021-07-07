<script>
import UpdateQuantity from './components/UpdateQuantity.vue'
import UpdateCart from './components/UpdateCart.vue'
import AddProduct from './components/AddProduct.vue'
import CartCount from './components/CartCount.vue'
import RemoveItem from './components/RemoveItem.vue'
import CartClear from './components/CartClear.vue'
import EmptyCart from './components/EmptyCart.vue'
import ForgottenPassword from './components/ForgottenPassword.vue'    
import DropdownMenu from './components/DropdownMenu.vue'    
import EmailVerify from './components/EmailVerify.vue'    
import RateProduct from './components/RateProduct.vue'    
import Newsletter from './components/Newsletter.vue'    



import mitt from 'mitt'
window.emitter = new mitt()



export default {
  components: {
    UpdateQuantity,
    UpdateCart,
    AddProduct,
    CartCount,
    RemoveItem,
    CartClear,
    EmptyCart, 
    ForgottenPassword,
    DropdownMenu,
    EmailVerify,
    RateProduct,
    Newsletter
  }
}
</script> 