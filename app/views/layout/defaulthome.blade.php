<!doctype html>
<html lang="en">
	<head>
		@include('include.header')
	</head>

	<body>
		@include('include.login')
		@include('include.register')
		@include('include.headerbody')
		@include("include.searchbar")
		@yield('content')
		@include('include.videoheader')
		@include('include.footer')
	</body>
</html>
