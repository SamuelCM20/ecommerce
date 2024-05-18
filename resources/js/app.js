import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select'

// Components ---------------------------------------------------
import TheUserList from './components/Users/TheUserList.vue'
import BackendError from './components/Components/BackendError.vue'
import TheProductList from './components/Products/TheProductList.vue'
import TheCategoryList from './components/categories/TheCategoryList.vue'
import ShowProduct from './components/Products/showProduct.vue'
import Cart from './components/cart/cart.vue'

// import { component } from 'vue/types/umd'

const app = createApp({
	components: {
		TheUserList,
		TheProductList,
		TheCategoryList,
		ShowProduct,
		Cart
		
	}
})

app.component('v-select', vSelect)
app.component('backend-error', BackendError)
app.mount('#app')