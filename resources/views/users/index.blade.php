<x-app title="Usuarios">
    <section class="container">

        <div class="d-flex justify-content-center my-4">
            <h1>Listado de Usuarios</h1>
        </div>

        <The-User-List :users="{{ $users }}" :roles_data="{{ $roles }}" />
    </section>
</x-app>
