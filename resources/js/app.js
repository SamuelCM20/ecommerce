import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select'

// Components ---------------------------------------------------
import TheUserList from './components/Users/TheUserList.vue'
import BackendError from './components/Components/BackendError.vue'
import TheProductList from './components/Products/TheProductList.vue'
import TheCategoryList from './components/categories/TheCategoryList.vue'
// import { component } from 'vue/types/umd'


const app = createApp({
	components: {
		TheUserList,
		TheProductList,
		TheCategoryList
		
	}
})

app.component('v-select', vSelect)
app.component('backend-error', BackendError)
app.mount('#app')