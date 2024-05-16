import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select'

// Components ---------------------------------------------------
import TheUserList from './components/Users/TheUserList.vue'
// import BackendError from './components/Components/BackendError.vue'
// import { component } from 'vue/types/umd'


const app = createApp({
	components: {
		TheUserList,
		
	}
})

app.component('v-select', vSelect)
// app.component('backend-error', BackendError)
app.mount('#app')