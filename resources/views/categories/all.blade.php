<x-app title="{{$category->name}}">

	<div class="my-3">
		<div class="d-flex align-items-center justify-content-center">
			<h1 class="h2 m-3">Todo acerca de {{ $category->name }}</h1>
		</div>
		<div class="d-flex flex-wrap justify-content-center">
		 	@foreach ($products as $product)
					<a href="{{route('products.info',$product->id)}}" class="text-decoration-none text-reset">
						<div class="card mx-2 my-2" style="width: 15rem; height: 29rem;">
							<img src="{{$product->file->route}}" class="card-img-top" alt="imagen-producto" width="150" height="250">
							<div class="card-body">
								<h2 class="card-title h5"><b>{{ $product->name }}</b></h2>
								<p class="card-text">{{ $product->details }}.</p>
								<h3 class="card-text">${{ $product->price }}.</h3>
							</div>
							<div class="card-footer d-flex m-auto">
								<p class="cart-text">Ver mas</p>
							</div>
						</div>
					</a>
			@endforeach
		</div> 
	</div>
</x-app>