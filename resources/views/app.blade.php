<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<!-- Latest compiled and minified CSS -->
	{!! Html::style('/packages/bootstrap/css/bootstrap.min.css') !!}

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<!-- Latest compiled and minified jquery -->
	<script src="https://code.jquery.com/jquery-3.0.0.min.js" integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="<?php echo asset('css/effect13.css')?>" type="text/css">
	<link rel="stylesheet" href="<?php echo asset('css/thumbnail.css')?>" type="text/css">
	<link rel="stylesheet" href="<?php echo asset('css/admin.css')?>" type="text/css">
	<link rel="stylesheet" href="<?php echo asset('css/pages.css')?>" type="text/css">
	<!-- Fonts -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

	<style>
		body {
			font-family: 'Lato';
		}

	</style>

	@yield('pagetitle')
	@yield('head')
</head>

<body>
	@yield('content')
</body>

	@yield('footer')
</html>