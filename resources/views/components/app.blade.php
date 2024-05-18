<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{-- csrf Token --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{env('APP_NAME')}} | {{$title ?? 'tienda virtual colombia'}}</title>

	{{-- Scripts --}}
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

	<div class="bg-">

		{{-- Menu --}}
		<x-menu />

		{{-- Content --}}
		<main id="app" class="m-3">
			<div class="container mt-4">
				<x-alerts />
			</div>

			{{ $slot}}

		</main>
	</div>

<footer class="bg-dark text-white mt-5 p-14">
    <div class="container">
		<div class="row">
			<div class="col-sm-6">
                <p class="text-center">
                    <b>Tienda Virtual Colombia</b>
                </p>
            </div>
            <div class="col-sm-6">
                <p class="text-center">
                    <b>Todos los derechos reservados</b>
                </p>
            </div>
        </div>
</footer>	
</body>
<script src="{{ asset('js/localStorageUtils.js') }}"></script>
</html>