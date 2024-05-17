<template>
	<div class="card">
		<div class="card-header d-flex justify-content-end">
			<button class="btn btn-success" @click="openModal">Crear Usuarios</button>
		</div>
		<div class="card-body">
			<div class="table-responsive my-4 mx-2">
				<table class="table table-bordered text-aling-center" id="product_table">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Nombre</th>
							<th>detalles</th>
							<th>Precio</th>
							<th>Cantidad</th>
							<th>Categoria</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(product, index) in products" :key="index">
							<td class="d-flex justify-content-center"><img :src ="product.file.route" alt="imagen del producto" width="80"></td>
							<td>{{product.name}}</td>
							<td>{{product.details}}</td>
							<td>{{product.price}}</td>
							<td>{{product.stock}}</td>
							<td>{{product.category.name}}</td>
							<td>
								<div class="d-flex justify-content-center" title="Editar">

									<button type="button" class="btn btn-warning btn-sm" @click="editProduct(product)">
										<i class="fa-solid fa-pen"></i></button>
									<button type="button" class="btn btn-danger btn-sm ms-2" @click="deleteProduct(product)" title="Eliminar" ><i class="fa-solid fa-trash"></i></button>
								</div>

							</td>							
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div>
		<product-modal ref="product_modal" :category_data = "category_data" :product_data = "product"/>
	</div>
</template>


<script>
import { successMessage } from '../../helpers/Alert';
import ProductModal from './ProductModal.vue';
import { deleteMessage  } from '@/helpers/Alert.js'


export default {
	components: {
		ProductModal
	},
	props: ['products', 'category_data'],
	data() {
		return {
			modal: null,
			product: {}
		}
	},
	mounted() {
		this.index()
	},
	methods: {
		async index() {
			$('#product_table').DataTable()
			const modal_id = document.getElementById('product_modal')
			this.modal = new bootstrap.Modal(modal_id)
			modal_id.addEventListener('hidden.bs.modal', e => {
				 this.$refs.product_modal.reset()				
			})
		},
		editProduct(product) {
            this.product = product
            this.openModal()
		},
		async deleteProduct({ id }) {
            if(!await deleteMessage()) return
            try {
                await axios.delete(`/products/${id}`)
                window.location.reload()
                await successMessage({is_delete: true, reload: true})
            } catch (error) {
                console.error(error);
            }
        },
		openModal() {
			this.modal.show()
		},
	}
}
</script>