<!doctype html>
<html lang="en">
	<head>
		@include('include.header')
	</head>

	<body>
		@include('include.headerbody')
		@yield('content')
		@include('include.login')
		@include('include.register')	
	</body>
</html>
