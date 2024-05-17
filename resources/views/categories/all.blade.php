<x-app title="{{$category->name}}">

	<div class="card my-3">
		<div class="card-header d-flex align-items-center justify-content-center">
			<h1 class="h2 m-3">Todo acerca de {{ $category->name }}</h1>
		</div>
		<div class="card-body d-flex flex-wrap justify-content-center">
		 	@foreach ($products as $product)
					<a href="{{route('products.info',$product->id)}}" class="text-decoration-none text-reset">
						<div class="card mx-2 my-2" style="width: 15rem;">
							<img src="{{$product->file->route}}" class="card-img-top" alt="imagen-producto" width="150" height="250">
							<div class="card-body">
								<h2 class="card-title h5"><b>{{ $product->name }}</b></h2>
								<p class="card-text">{{ $product->details }}.</p>
								<h3 class="card-text">${{ $product->price }}.</h3>
							</div>
							<div class="card-footer d-flex m-auto">
								<a href="#" class="btn btn-success">Añadir al carrito</a>
							</div>
						</div>
					</a>
			@endforeach
		</div> 
	</div>
</x-app>