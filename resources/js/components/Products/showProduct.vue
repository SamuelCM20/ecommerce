<template>
	<div class="row">
		<div class="col-lg-8">
			<div class="card mb-1 shadow-sm" style="border-top:solid rgba(44, 62, 80, 0.8)  4px">
				<div class="card-body text-center">
					
						<div class="marcoProfile">

							<img :src="product.file.route" alt="Producto" class="img-fluid rounded" width="300" height="300">
						</div>
						
						<h1 class="h3 my-3">Descripicion:</h1>

						<p class="">{{product.description}}</p>
				</div>
			</div>

		</div>
		<div class="col-lg-4">
			<div class="card mb-4 shadow-sm">
				<div class="card-body">

					<div class="row">
						<div class="col m-auto d-flex mt-3">
							<h1 class="card-text h2">{{product.name}}</h1>
						</div> 
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-3 m-auto">
							<p class="mb-0"><b>Detalles:</b></p>
			
						</div>
						<div class="col-sm-9 m-auto d-flex mt-3">
							<p class="card-text">{{product.details}}</p>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-3 m-auto">
							<p class="card-text mb-0"><b>Costo de envio:</b></p>
			
						</div>
						<div class="col-sm-9 m-auto d-flex mt-3">
							<p class="card-text h5">$ {{product.shipping_cost}}</p>
						</div>
					</div>
				   
					<hr>
					<div class="row">
						<div class="col-sm-3 m-auto">
							<p class="card-text mb-0"><b>Precio:</b></p>
			
						</div>
						<div class="col-sm-9 m-auto d-flex mt-3">
							<h1 class="card-text h3">$ {{product.price}}</h1>
						</div>
					</div>
					<hr>

					<div class="row">
						<div class="col d-grid gap-2">
								<button class="btn btn-success mb-1 btn-block">Comprar ahora</button>
								<button class="btn btn-outline-primary" @click="validarSesion">Añadir al carrito</button>
					   
						</div>
					</div>

				   
				</div>
			</div>

		</div>
	</div>
</template>

<script>
	import { ref, onMounted } from "vue";
    import { addObject } from "@/helpers/LocalStorage";
	
	export default {
		props: ["product", "session", "user"],
		setup(props) {
			const user_data = ref({});
			onMounted(() => {
				user_data.value = JSON.parse(props.user);
			});

			const validarSesion = () => {
				if (!props.session) {
					
					window.location.href = "/login";
					
				} else {
					const key = `${user_data.value.id}-${props.product.id}`;

					const isExist = localStorage.getItem(key)
					
					if (!isExist) {
						props.product.quantity = 1;
						props.product.subtotal = props.product.price;						
						addObject(key, props.product);
					} else {
						const product = JSON.parse(isExist)
						increaseProduct(product)
					}

					window.location.href = "/cart";
						
				}
			};
			const increaseProduct = (product) => {
				product.quantity += 1;
				product.subtotal = product.price * product.quantity;

				const key = `${user_data.value.id}-${product.id}`;

				addObject(key, product);
			}
			return { validarSesion };
		},
	};
</script>
