<!doctype html>
<html lang="en">
	<head>
		@include('include.header')
	</head>

	<body>
		@include("include.searchbar")	
		@include('include.headerbody')
		@yield('content')
		@include('include.footer')
	</body>
</html>
