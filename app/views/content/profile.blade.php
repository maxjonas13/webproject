@extends("layout.default")

@section('content')
		<div class="firstrow"> 
			<div class="column col-md-2 col-sm-3"> </div>
			<div class="column col-md-8 col-sm-6" id="profile">  
				<h1>Profile</h1>
				
				<div class="hexagon" style="background-image: url({{$data->profile->profilePicture}});">
				  <div class="hexTop"></div>
				  <div class="hexBottom"></div>
				</div>
				<h4>name:</h4>
				 <p>{{$data->name}} </p>

				<h4>email:</h4>
				 <p>{{$data->email}}</p>

				 <h4>website:</h4>
				 <p>{{$data->profile->website}}</p>

				<h4>username:</h4>
				 <p>{{$data->profile->username}}</p>

				<h4>twitter:</h4>
				 <p>twitter.com/{{$data->profile->twitter}}</p>

				<h4>github:</h4>
				 <p>github.com/{{$data->profile->github}}</p>

				<h4>linkedin:</h4>
				 <p>linkedin.com/in/{{$data->profile->linkedin}}</p>

				<h4>googleplus:</h4>
				 <p>googleplus.com/{{$data->profile->googleplus}}</p>

				<h4>instagram:</h4>
				 <p>instagram.com/{{$data->profile->instagram}}</p>

				<h4>myspace:</h4>
				 <p>myspace.com/{{$data->profile->myspace}}</p>

				<h4>Bio</h4>
				<p>{{nl2br($data->profile->bio)}}</p>
				@if($data->PK_userId == Auth::User()->PK_userId)
				{{ HTML::link('profile/edit/'.$data->PK_userId, 'edit', array('class' => 'button'), false)}}
				@else
				{{ HTML::link('profile/edit/'.$data->PK_userId, 'contact', array('class' => 'buttonapply'), false)}}
				@endif
			

		</div>
		<div class="column col-md-2 col-sm-3"> </div>
	</div>
</div>

@stop
