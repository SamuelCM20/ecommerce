<x-app title="Tienda electronica | home">
    @foreach ($categories as $cate)
        @php
            $count = 0;
        @endphp
        <div class="card my-3">
            <div class="card-header">
                {{ $cate->name }}
            </div>
            <div class="card-body d-flex flex-wrap justify-content-center">
                @foreach ($products as $product)
                    @if ($product->category->name == $cate->name && $count < 5)
                        @php
                            $count++;
                        @endphp
                        <a href="" class="text-decoration-none text-reset">
                            <div class="card mx-2" style="width: 15rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h2 class="card-title h5"><b>{{ $product->name }}</b></h2>
                                    <p class="card-text">{{ $product->details }}.</p>
                                    <h3 class="card-text">${{ $product->price }}.</h3>
                                </div>
                                <div class="card-body d-flex m-auto">
                                    <a href="#" class="btn btn-success">Añadir al carrito</a>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
</x-app>
