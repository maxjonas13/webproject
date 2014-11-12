@extends("layout.defaulthome")

@section('content')
	<!-- content with video background and searchbar -->
	@include('include.videoheader')
	<!-- job view -->
	@include('content.jobs')
@stop
