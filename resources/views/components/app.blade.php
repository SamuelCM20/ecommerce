<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	{{-- csrf Token --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{env('APP_NAME')}} | {{$title ?? 'tienda virtual colombia'}}</title>

	{{-- Scripts --}}
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="cuerpo">

	<div class="bg" style="flex-direction: column; min-height: 100vh;">

		{{-- Menu --}}
		<x-menu />

		{{-- Content --}}
		<main id="app" class="m-3">
			<div class="container mt-4">
				<x-alerts />
			</div>

			{{ $slot}}

		</main>
        <script src="{{ asset('js/slider.js') }}"></script>
		
	</div>

	<footer class="bg-body-tertiary text-center text-lg-start">
		<!-- Copyright -->
		<div id="footer-body" class="text-center p-3">
			<div>
				<a href="" class="text-body text-decoration-none">
					<i class="fa-brands fa-linkedin text-light"></i>
				</a>
				<a href="" class="text-body text-decoration-none mx-5">
					<i class="fa-brands fa-github text-light"></i>
				</a>
				<a href="" class="text-body text-decoration-none">
					<i class="fa-brands fa-google text-light"></i>
				</a>
			
			</div>

			<p class="my-2">© 2020 Copyright: <span class="fst-italic">Samuel Caldon</span></p>  
		</div>
	  </footer>

</body>
<script src="{{ asset('js/localStorageUtils.js') }}"></script>
</html>