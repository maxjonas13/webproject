<!doctype html>
<html lang="en">
	<head>
		@include('include.header')
	</head>

	<body>
		@include('include.headerbody')
		@yield('content')
		@include('include.videoheader')
		@include('include.footer')
		@if(Auth::check())
			@include('include.jobsCreate')
		@else
			@include('include.login')
			@include('include.register')
		@endif
	</body>
</html>
