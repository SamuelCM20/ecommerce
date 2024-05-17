<x-app title="Products">
    <section class="container">

        <div class="d-flex justify-content-center my-4">
            <h1>Listado de Productos</h1>
        </div>

        <The-Product-List :products="{{ $products }}" :category_data = "{{ $categories }}" />
    </section>
</x-app>
