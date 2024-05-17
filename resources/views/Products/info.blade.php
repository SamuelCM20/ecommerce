<x-app title="{{$product->name}}">
    <section>
        <div class="container py-2 ">


            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-1 shadow-sm" style="border-top:solid rgba(44, 62, 80, 0.8)  4px">
                        <div class="card-body text-center">
                            <form id="form" action="" method="POST"
                                enctype="multipart/form-data">
                                <div class="marcoProfile">

                                    <img src="{{$product->file->route}}" alt="Producto" class="img-fluid rounded" width="300" height="300">
                                </div>
                                
								<h1 class="h3 my-3">Descripicion:</h1>

								<p class="">{{$product->description}}</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">

                            <div class="row">
                                <div class="col m-auto d-flex mt-3">
                                    <h1 class="card-text h2">{{$product->name}}</h1>
                                </div> 
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3 m-auto">
                                    <p class="mb-0"><b>Detalles:</b></p>
					
                                </div>
                                <div class="col-sm-9 m-auto d-flex mt-3">
                                    <p class="card-text">{{$product->details}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3 m-auto">
                                    <p class="card-text" class="mb-0"><b>Costo de envio:</b></p>
					
                                </div>
                                <div class="col-sm-9 m-auto d-flex mt-3">
                                    <p class="card-text h5">$ {{$product->shipping_cost}}</p>
                                </div>
                            </div>
                           
                            <hr>
                            <div class="row">
                                <div class="col-sm-3 m-auto">
                                    <p class="card-text" class="mb-0"><b>Precio:</b></p>
					
                                </div>
                                <div class="col-sm-9 m-auto d-flex mt-3">
                                    <h1 class="card-text h3">$ {{$product->price}}</h1>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col d-grid gap-2">
										<button class="btn btn-success mb-1 btn-block">Comprar ahora</button>
										<button class="btn btn-outline-primary">Añadir al carrito</button>
                               
                                </div>
                            </div>

                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-app>
