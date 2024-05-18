<x-app title="Tienda electronica | home">
    @foreach ($categories as $cate)
        @php
            $count = 0;
        @endphp
        <div class="card my-3">
            <div class="card-header d-flex align-items-center">
                {{ $cate->name }}
                    <a href="{{route('categories.allProducts',$cate->id)}}" class="btn btn-outline-secondary ms-auto">Ver todo</a>
            </div>
            <div class="card-body d-flex flex-wrap justify-content-center">
                @foreach ($products as $product)
                    @if ($product->category->name == $cate->name && $count < 5)
                        @php
                            $count++;
                        @endphp
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
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
</x-app>
