<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="/css/layout.css"/>
	<title>Tutorial</title>
</head>
<body>
	@include('layout.header')
	<div class="content">
		<div class="container">
			@yield('content')
		</div>
	</div>
	@include('layout.footer')
</body>
</html>