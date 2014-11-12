@extends("layout.default")

@section('content')
	<div class="firstrow">
		<!-- use of firstrow, it wil have a margin as high as the video player. -->
		<div class="column col-md-2 col-sm-3"  style="display: block;">

		</div>
		<div class="column col-md-8 col-sm-6"  style="display: block;">
			<h1>Search results</h1>
			<h2>Specialist</h2>
			<p>
				<!-- get every user -->
				@foreach($users as $user) 
					<a href="/profile/{{$user->PK_userId}}">{{$user->name}}</a>
				@endforeach
			</p>

			<h2>Jobs</h2>
			<p>
				@foreach($jobs as $job) 
				<!-- get every job -->
					<a href="/jobs/details/{{$job->PK_jobId}}">{{$job->title}}</a>
				@endforeach
			</p>
		</div>
		<div class="column col-md-2 col-sm-3"  style="display: block;">
			
		</div>
	</div>
@stop


