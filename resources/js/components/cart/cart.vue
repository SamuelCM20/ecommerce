<template>
	<div class="d-flex gap-4 mx-4">
		<div class="d-flex flex-column">
			<ul v-for="(product, index) in products" :key="index" class="card d-flex">
				<div class="card-body ml-auto">
					<div class="row">
						<div class="col m-auto">
							<img :src="product.file.route" :alt="product.name" class="rounded" width="200" height="200">
						</div>	
					<div class="col">
						<h1 class="h3"><b>{{product.name}}</b></h1>
					<p>{{product.details}}</p>
				<p><b> Costo de envio:</b> ${{product.shipping_cost}}</p>
			<p><b> Stock:</b> {{product.stock}}</p>
		<p><b> Subtotal:</b> ${{product.subtotal}}</p>
	
	<div class="d-flex">
		<button class="p-0 btn" @click="removeProduct(product.id)">
			<i class="fas fa-trash"></i>
		<span class="mx-2">quitar</span>
	</button>
<div>
	<button class="btn" @click="decrease(product)"><i class="fas fa-minus"></i></button>
<span>{{product.quantity}}</span>
<button class="btn" @click="increase(product)"><i class="fas fa-plus"></i></button>
					</div>
</div>
</div>
</div>
</div>
</ul>
</div>
		<div class="card h-100">
			<div class="m-3">
				<p><span class="text-success">Envio gratis despues de:</span>$100</p>
				<p class="">Total: <span class="h4 mx-2"> ${{total}}</span></p>
				<button class="btn btn-success">Realizar compra</button>
			</div>
		</div>
	</div>
</template>

<script setup>
	import {
		addObject,
		getObject,
		getProductsObject,
		deleteObject,
		addTotal,
	} from "@/helpers/LocalStorage";

	import { ref, onMounted} from "vue";

	const props = defineProps(["user"]);

	const user_data = ref({});
	const products = ref([]);
	const total = ref(0);

	const decrease = (product) => {
		if (product.quantity > 1) {
			let newQuantity = product.quantity - 1;
			let newSubtotal = product.price * newQuantity;

			product.quantity = newQuantity;
			product.subtotal = newSubtotal;

			const key = `${user_data.value.id}-${product.id}`;
			addObject(key, product);
			total.value = addTotal(user_data.value.id);
		}
	};
	const increase = (product) => {
		if (product.stock > product.quantity) {
			let newQuantity = product.quantity + 1;
			let newSubtotal = product.price * newQuantity;

			product.quantity = newQuantity;
			product.subtotal = newSubtotal;

			const key = `${user_data.value.id}-${product.id}`;
			addObject(key, product);
			total.value = addTotal(user_data.value.id);
		}
	};

	const removeProduct = (idProduct) => {
		const key = `${user_data.value.id}-${idProduct}`;
		deleteObject(key);

		products.value = getProductsObject(user_data.value.id);
		total.value = addTotal(user_data.value.id);
	};


	const index = () => {

		try {
			
			user_data.value = props.user;
			products.value = getProductsObject(user_data.value.id);
			total.value = addTotal(user_data.value.id);
		} catch (error) {
			console.log(error);
		}
	};

	onMounted(() => index());
</script>
