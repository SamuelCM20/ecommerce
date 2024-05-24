<x-app title="Resultados para {{$query}}">
	<div class="my-3">
		<div class="m-3">
			<h1 class="h3">{{$query}}</h1>
			<p class="text-body">{{$count}} resultados</p>
		</div>
		<div class="d-flex flex-wrap justify-content-center">
			@foreach ($result as $product)
			<a href="{{route('products.info',$product->id)}}" class="text-decoration-none text-reset">
						<div class="card mx-2" style="width: 15rem;">
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
