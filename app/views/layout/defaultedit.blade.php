<!doctype html>
<html lang="en">
	<head>
		@include('include.header')
	</head>

	<body>
		<div class="page-wrap">
			@include("include.searchbar")	
			@include('include.headerbody')
			@yield('content')
		</div>
		@include('include.footer')
	</body>
</html>
