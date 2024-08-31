<x-app title="Tienda electronica | home">

    <div class="slider" >
        <div class="slider--inner" id="slider--inner">
            <img src="/storage/images/ecommerce/promocion/prom1.jpg" alt="promocion">
            <img src="/storage/images/ecommerce/promocion/prom2.jpg" alt="promocion">
            <img src="/storage/images/ecommerce/promocion/prom3.jpg" alt="promocion">
        </div>
        <button class="returnLeft position-absolute" id="back">hola</button>
        <button class="returnRight position-absolute">adios</button>
    </div>
    @foreach ($categories as $cate)
        @php
            $count = 0;
        @endphp
        <div class=" my-4" style="margin: 0 4rem 0 4rem;">
            <div class="d-flex align-items-center my-2">
                    <h1 class="h4">{{ $cate->name }}</h1>
                    <a href="{{route('categories.allProducts',$cate->id)}}" class="btn btn-outline-secondary ms-auto">Ver todo</a>
            </div>
            <div class=" d-flex flex-wrap justify-content-center">
                @foreach ($products as $product)
                    @if ($product->category->name == $cate->name && $count < 5)
                        @php
                            $count++;
                        @endphp
                        <a href="{{route('products.info',$product->id)}}" class="text-decoration-none text-reset">
                            <div class="card mx-2" style="width: 15rem; height: 29rem;">
                                <img src="{{$product->file->route}}" class="card-img-top" alt="imagen-producto" width="1520" height="250">
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
