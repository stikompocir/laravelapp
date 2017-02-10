<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<title>Laravel App</title>
	<link rel="stylesheet" href="{{asset('bootstrap-3.3.6/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
	<div class="container">
		@include('navbar')
		@yield('main')	
	</div>

	@yield('footer')
	<script src="{{asset('js/jquery_2_2_1.min.js')}}" type="text/javascript" charset="utf-8" async defer></script>
	<script src="{{ asset('js/laravelapp.js') }}"></script>
	<script src="{{asset('bootstrap-3.3.6/js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>