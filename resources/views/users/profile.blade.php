	<x-app title="{{$user->name}}">
		<section>
			<div class="container py-2">
				<div class="row">
					<div class="col-sm-5">
						<div class="card mb-1 shadow-sm" style="border-top:solid rgba(44, 62, 80, 0.8)  4px">
							<div class="card-body text-center d-flex m-auto ">
								<form id="form" action="" method="POST" enctype="multipart/form-data">
									<div class="imageContent mb-4">
										<img src="{{$userWithFile->file->route}}" class="rounded-circle" width="200" height="200">
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="card mb-4 shadow-sm">
							<div class="card-body">
								<div class="row mb-4">
									<div class="col m-auto d-flex my-3">
										<h1 class="card-text h2">{{$user->full_name}}</h1>
									</div>
									<hr>
									<div class="col mt-3">
										<p class="card-text h4"><b>Informacion basica: </b></p>
									</div>
								</div>
								<div class="row my-3">
									<div class="col-sm-5">
										<p class="card-text h5"><b>Cedula: </b></p>
									</div>
									<div class="col-sm-4 ">
										<p class="card-text">{{$user->number_id}}</p>
									</div>
								</div>
								<div class="row my-3">
									<div class="col-sm-5">
										<p class="card-text h5"><b>Direccion: </b></p>
									</div>
									<div class="col-sm-4 ">
										<p class="card-text">{{$user->address}}</p>
									</div>
								</div>
								<div class="row my-3">
									<div class="col-sm-5">
										<p class="card-text h5"><b>Celular: </b></p>
									</div>
									<div class="col-sm-4 ">
										<p class="card-text">{{$user->phone}}</p>
									</div>
								</div>
								<div class="row my-3">
									<div class="col-sm-5">
										<p class="card-text h5"><b>Correo Electronico: </b></p>
									</div>
									<div class="col-sm-4 ">
										<p class="card-text">{{$user->email}}</p>
									</div>
								</div>
								<div class="card-footer">
									<div class="d-grid gap-2">
										<a href="{{route('products.home')}}" class="btn btn-outline-secondary">Volver</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</section>
	</x-app>