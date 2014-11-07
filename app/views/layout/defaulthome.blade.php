<!doctype html>
<html lang="en">
	<head>
		@include('include.header')
	</head>

	<body>
		@if(Auth::check())
			@include('include.jobsCreate')
		@else
			@include('include.login')
			@include('include.register')
		@endif
		@include('include.headerbody')
		@yield('content')
		@include('include.videoheader')
		@include('include.footer')
	</body>
</html>
