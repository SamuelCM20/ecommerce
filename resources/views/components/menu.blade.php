<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid m-3">
        {{-- Imagen --}}
        <a class="navbar-brand" href="{{ route('products.home') }}">
            <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30"
                height="24" class="d-inline-block align-text-top">
            Ecommerce
        </a>
		@if (!Request::is('login','register','password/reset','password/email'))
			
		
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="">Home</a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrate</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{Auth::user()->file->route}}" alt="avatar-user" width="30" height="30"
                                class="d-inline-block align-text-top rounded-circle me-1">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('users.profile')}}">Perfil</a></li>
                            @role('admin')
                            <li><a class="dropdown-item" href="{{route('users.index')}}">Usuarios</a></li>
                            <li><a class="dropdown-item" href="{{route('products.index')}}">Productos</a></li>
                            <li><a class="dropdown-item" href="{{route('categories.index')}}">Categorias</a></li>
                            @endrole
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
								<a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión
                           	 	</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
							</li>
                        </ul>
                    </li>
                @endguest

               
                <li class="nav-item" title="cart">
                    <a class="nav-link" href="{{route('products.cart')}}">
                        <i class="fa-solid fa-cart-shopping fs-4"></i></a>
                    </li>
                    
                    
                </ul>
                
                
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
           
            </div>
		@endif
    </div>
</nav>
