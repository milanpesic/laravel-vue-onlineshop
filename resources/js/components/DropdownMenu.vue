<template>
    <li class="nav-item p-1 dropdown" @mouseleave="mdisplay = null">
        <a href="" @mouseover="menuover" :class="ractive" onclick="return false" data-bs-toggle="dropdown" aria-expanded="false">PRODUCTS</a>  

            <ul v-show="mdisplay" class="dropdown-menu fs-5 bg-light p-0 border-0 rounded-0 shadow" style="display: block; margin: 0">
                <li v-for="(category, categoryID) in categories" :key="categoryID" @mouseleave="display = null" style="position: relative;">
                    <a @mouseover="mouseover(categoryID)" :class="[styleMenu, display == categoryID ? styleHover : '']" :href="categoryShow + '/' + category.slug">{{ category.name }}</a>
                    
                        <ul v-show="display == categoryID" @mouseleave="sdisplay = null" class="dropdown-menu bg-light fs-5 p-0 border-0 rounded-0 shadow" style="position: absolute; left: 100%; top: 0; display: block">
                            <li v-for="(subcategory, subcategoryID) in category.subcategories" :key="subcategoryID" style="position: relative">
                                <a @mouseover="smouseover(subcategoryID)" :class="[styleMenu, sdisplay == subcategoryID ? styleHover : '']" :href="subcategoryShow + '/' + category.slug + '/' + subcategory.slug">{{ subcategory.name }}</a>
                            </li> 
                        </ul>
                   
                </li>
            </ul>
      
    </li>   
</template>

<script>
export default { 
    props: {
        ractive: {
            type: String
        },
        categories: {
            type: [Object, Array]
        },
        categoryShow: {
            type: String
        },
        subcategoryShow: {
            type: String 
        }
    },
    data() {
        return {
            display: null,
            sdisplay: null,
            mdisplay: null,
            styleMenu: 'dropdown-header dropdown-item fw-bold shadow-sm',
            styleHover: 'bg-secondary text-light'
        }
    },
    methods: {
        menuover() {
            this.mdisplay = true
        },
        mouseover(categoryID) {
            return this.display = categoryID
        },
        smouseover(subcategoryID) {
            return this.sdisplay = subcategoryID
        }
    }
}
</script>