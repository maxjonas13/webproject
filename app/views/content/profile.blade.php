@extends("layout.default")

@section('content')
		<!-- use of firstrow, it wil have a margin as high as the video player. -->
		<div class="firstrow"> 
			<div class="column col-md-2 col-sm-3"> </div>
			<div class="column col-md-8 col-sm-6" id="profile"> 
				<!-- check if categroy is selected, if yes have it styled -->
				@if(!empty($data->category[0]))
					<section class="profilestyle {{strtolower($data->category[0]->categoryName)}}">
				@else
					<section class="profilestyle">
				@endif
				<h1>Profile</h1>
				<!-- profile picture -->
				<div class="hexagon" style="background-image: url({{$data->profile->profilePicture}});">
				  <div class="hexTop"></div>
				  <div class="hexBottom"></div>
				</div>
				<!-- check if logged in -->
				@if(Auth::check())
					@if($data->PK_userId == Auth::User()->PK_userId)
						<!-- edit button -->
						{{ HTML::link('profile/edit/'.$data->PK_userId, 'edit', array('class' => 'buttoncontact'), false)}}
					@else
						<!-- contact button -->
						{{ HTML::link('mailto:' . $data->email, 'contact', array('class' => 'buttonapply'), false)}}
					@endif
				@endif
				@if (Auth::check())
					@if($data->PK_userId == Auth::User()->PK_userId)
						<h5>you have {{Auth::user()->credit->credits}} credits</h5><br>
					@endif
				@endif
				<h4>Rating</h4>
				<!-- rating section -->
				<div class="rating" id="user{{$data->PK_userId}}">					
					<!-- check what rating is selcted to display other view -->
					@if ($rating == 5) 
						<span class="stars highlight" id="5">☆</span>
						<span class="stars highlight" id="4">☆</span>
						<span class="stars highlight" id="3">☆</span>
						<span class="stars highlight" id="2">☆</span>
						<span class="stars highlight" id="1">☆</span>

					@elseif ($rating == 4) 
						<span class="stars" id="5">☆</span>
						<span class="stars highlight" id="4">☆</span>
						<span class="stars highlight" id="3">☆</span>
						<span class="stars highlight" id="2">☆</span>
						<span class="stars highlight" id="1">☆</span>
					
					@elseif ($rating == 3) 
						<span class="stars" id="5">☆</span>
						<span class="stars" id="4">☆</span>
						<span class="stars highlight" id="3">☆</span>
						<span class="stars highlight" id="2">☆</span>
						<span class="stars highlight" id="1">☆</span>
					
					@elseif ($rating == 2) 
						<span class="stars" id="5">☆</span>
						<span class="stars" id="4">☆</span>
						<span class="stars" id="3">☆</span>
						<span class="stars highlight" id="2">☆</span>
						<span class="stars highlight" id="1">☆</span>
					
					@elseif ($rating == 1) 
						<span class="stars" id="5">☆</span>
						<span class="stars" id="4">☆</span>
						<span class="stars" id="3">☆</span>
						<span class="stars" id="2">☆</span>
						<span class="stars highlight" id="1">☆</span>
					@else
						<span class="stars" id="5">☆</span>
						<span class="stars" id="4">☆</span>
						<span class="stars" id="3">☆</span>
						<span class="stars" id="2">☆</span>
						<span class="stars" id="1">☆</span>
					
					@endif

				</div>
				<h4>name:</h4>
				 <p>{{$data->name}} </p>

				<h4>email:</h4>
				<!-- link to mail:to -->
				 <p><a href="mailto:{{$data->email}}" title="Email {{$data->name}}">{{$data->email}}</a></p>

				 <h4>website:</h4>
				 @if($data->profile->website != NULL)
				 	<p><a href="{{$data->profile->website}}" title="Personal website of {{$data->name}}" target="_blank">{{$data->profile->website}}</a></p>
				 @else
				 	<p>Not available</p>
				 @endif

				<h4>twitter:</h4>
				@if($data->profile->twitter != NULL)
					<p><a href="http://www.twitter.com/{{$data->profile->twitter}}" title="Twitter account of {{$data->name}}" target="_blank">twitter.com/{{$data->profile->twitter}}</a></p>
				@else
					<p>Not available</p>
				@endif

				<h4>github:</h4>
				@if($data->profile->github != NULL)
				 	<p><a href="http://www.github.com/{{$data->profile->github}}" title="Github account of {{$data->name}}" target="_blank">github.com/{{$data->profile->github}}</a></p>
				 @else
				 	<p>Not available</p>
				 @endif

				<h4>linkedin:</h4>
				@if($data->profile->linkedin != NULL)
				 	<p><a href="http://be.linkedin.com/in/{{$data->profile->linkedin}}" title="Linkedin account of {{$data->name}}" target="_blank">linkedin.com/in/{{$data->profile->linkedin}}</a></p>
				 @else
				 	<p>Not available</p>
				 @endif

				<h4>googleplus:</h4>
				@if($data->profile->googleplus != NULL)
				 	<p><a href="http://www.googleplus.com/{{$data->profile->googleplus}}" title="Personal website of {{$data->name}}" target="_blank">googleplus.com/{{$data->profile->googleplus}}</a></p>
				 @else
				 	<p>Not available</p>
				 @endif

				<h4>instagram:</h4>
				@if($data->profile->github != NULL)
				 	<p><a href="http://www.instagram.com/{{$data->profile->instagram}}" title="Instagram account of {{$data->name}}" target="_blank">instagram.com/{{$data->profile->instagram}}</a></p>
				 @else
				 	<p>Not available</p>
				 @endif

				<h4>Pintrest:</h4>
				@if($data->profile->pintrest != NULL)
				 	<p><a href="http://www.pintrest.com/{{$data->profile->instagram}}" title="Pintrest account of {{$data->name}}" target="_blank">pintrest.com/{{$data->profile->pintrest}}</a></p>
				 @else
				 	<p>Not available</p>
				 @endif

				<h4>myspace:</h4>
				@if($data->profile->myspace != NULL)
				 	<p><a href="http://www.myspace.com/{{$data->profile->googleplus}}" title="Myspace account of {{$data->name}}" target="_blank">myspace.com/{{$data->profile->myspace}}</a></p>
				 @else
				 	<p>Not available</p>
				 @endif

				<h4>Bio</h4>
				@if($data->profile->bio != NULL)
					<p>{{nl2br($data->profile->bio)}}</p>
				@else 
					<p>Not available</p>
				@endif

				<h4>Catergories</H4>
				@if(count($data->category) > 0)
				<!-- check if user has category -->
								<p>
						@foreach ($data->category as $categorieitem) 
							<span class="{{strtolower($categorieitem->categoryName)}}">{{$categorieitem->categoryName}}</span><br>
						@endforeach
					</p>
				@else
					<p>This user has no categories selected</p>
				@endif
				
				<h4>Jobs</h4>
				<p>
					<!-- check if user has jobs -->
				@if(count($data->job) > 0)
					@foreach($data->job as $job)
						<a href="/jobs/details/{{$job->PK_jobId}}">{{$job->title}}</a><br>
					@endforeach
				@else
					<p>This user has no jobs</p>
				@endif</p>
			</section>
		</div>
		<div class="column col-md-2 col-sm-3"> </div>
	</div>
</div>
	<!-- script for rating -->
	{{ HTML::script('script/rate.js'); }}
@stop
