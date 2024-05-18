<x-app title="{{$product->name}}">
    <section>
        <div class="container py-2 ">

            <show-product :product ="{{ $product }}" :session="{{ $session }}" user="{{ Auth::user() }}" />
            
        </div>
    </section>
</x-app>
