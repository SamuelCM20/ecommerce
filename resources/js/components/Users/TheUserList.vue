<template>
	<div class="card">
		<div class="card-header d-flex justify-content-end">
			<button class="btn btn-primary" @click="openModal">Crear Usuarios</button>
		</div>
		<div class="card-body">
			<div class="table-responsive my-4 mx-2">
				<table class="table table-bordered" id="user_table">
					<thead>
						<tr>
							<th>Cedula</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Celular</th>
							<th>Correo</th>
							<th>Rol</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(user, index) in users" :key="index">
							<td>{{user.number_id}}</td>
							<td>{{user.name}}</td>
							<td>{{user.last_name}}</td>
							<td>{{user.phone}}</td>
							<td>{{user.email}}</td>
							<td>
								<span v-for="(role, roleIndex) in user.roles" :key="roleIndex">
									{{ role.name }}
								</span>
							</td>
							<td>
								<div class="d-flex justify-content-center" title="Editar">

									<button type="button" class="btn btn-warning btn-sm" @click="editUser(user)">
										<i class="fa-solid fa-pen"></i></button>
									<button type="button" class="btn btn-danger btn-sm ms-2" title="Eliminar" @click="deleteUser(user)" ><i class="fa-solid fa-trash"></i></button>
								</div>

							</td>							
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div>
		<user-modal ref="user_modal" :roles_data="roles_data" :user_data = "user"/>
	</div>
</template>


<script>
import { successMessage } from '../../helpers/Alert';
import UserModal from './UserModal.vue';
import { deleteMessage  } from '@/helpers/Alert.js'


export default {
	components: {
		UserModal
	},
	props: ['users', 'roles_data'],
	data() {
		return {
			modal: null,
			user: {}
		}
	},
	mounted() {
		this.index()
	},
	methods: {
		async index() {
			$('#user_table').DataTable()
			const modal_id = document.getElementById('user_modal')
			this.modal = new bootstrap.Modal(modal_id)
			modal_id.addEventListener('hidden.bs.modal', e => {
				 this.$refs.user_modal.reset()				
			})
		},
		editUser(user) {
            this.user = user
            this.openModal()
		},
		async deleteUser({ id }) {
            if(!await deleteMessage()) return
            try {
                await axios.delete(`/users/${id}`)
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