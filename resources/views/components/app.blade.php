<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{-- csrf Token --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{$title ?? 'tienda virtual colombia'}}</title>

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
				{{-- <x-alerts /> --}}
			</div>

			{{ $slot}}

		</main>
	</div>
	
</body>
</html>