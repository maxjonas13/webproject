@extends("layout.default")

@section('content')
		<div class="row"> 
			<div class="column col-md-2 col-sm-3"> </div>
			<div class="column col-md-8 col-sm-6" id="profile">  
				<h1>Profile</h1>
				
				<div class="hexagon" style="background-image: url({{$data->profile->profilePicture}});">
				  <div class="hexTop"></div>
				  <div class="hexBottom"></div>
				</div>
				<p>name: {{$data->name}} </p>
				<p>email: {{$data->email}}</p>
				<p>username: {{$data->profile->username}}</p>
				<p>twitter: {{$data->profile->twitter}}</p>
				<p>github: {{$data->profile->github}}</p>
				<p>linkedin: {{$data->profile->linkedin}}</p>
				<p>googleplus: {{$data->profile->googleplus}}</p>
				<p>instagram: {{$data->profile->instagram}}</p>
				<p>myspace: {{$data->profile->myspace}}</p>
				<p>website: {{$data->profile->website}}</p>
				<h4>Bio</h4>
				<p>{{nl2br($data->profile->bio)}}</p>
				{{ HTML::link('profile/edit/'.$data->PK_userId, 'edit', array('class' => 'button'), false)}}
			<div class="column col-md-2 col-sm-3"> </div>

		</div>
		
	</div>


@stop
