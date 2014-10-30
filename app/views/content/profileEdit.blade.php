@extends("layout.default")

@section('content')
		<div class="row"> 
			<div class="column col-md-2 col-sm-3"> </div>
			<div class="column col-md-8 col-sm-6" id="profileedit">  
			<h1>Edit Profile</h1>
			@if($errors->count() > 0) 
				@foreach ($errors->all() as $error) 
					<ul>
						<li>{{$error}}</li>
					</ul>
				@endforeach
			@endif
			<div class="hexagon" style="background-image: url({{$data->profile->profilePicture}});">
				  <div class="hexTop"></div>
				  <div class="hexBottom"></div>
				</div>
			<!-- open form tag -->
			{{ Form::open( array('url' => '/profile/update', 'files' => TRUE) ) }}

				<p>{{ Form::label('name', 'Naam :') }}</p>
				{{ Form::text('name', $data->name) }}

				<p>{{ Form::label('email', 'E-mail:') }}</p>
				{{ Form::text('email' ,$data->email) }}		

				<p>{{ Form::label('password', 'Wachtwoord:') }}</p>
				{{ Form::password('password') }}
		
				<p>{{ Form::label('newpassword', 'Nieuw wachtwoord:') }}</p>
				{{ Form::password('newpassword') }}
			
				<p>{{ Form::label('website', 'Personal website:') }}</p>
				{{ Form::text('website' , $data->profile->website) }}
			
				<p>{{ Form::label('twitter', 'Twitter:') }}</p>
				{{ Form::text('twitter' ,$data->profile->twitter) }}
			
				<p>{{ Form::label('github', 'Github:') }}</p>
				{{ Form::text('github' ,$data->profile->github) }}
			
				<p>{{ Form::label('linkedin', 'Linkedin:') }}</p>
				{{ Form::text('linkedin' ,$data->profile->linkedin) }}
			
				<p>{{ Form::label('pintrest', 'Pintrest:') }}</p>
				{{ Form::text('pintrest' ,$data->profile->pintrest) }}
			
				<p>{{ Form::label('googleplus', 'Google+:') }}</p>
				{{ Form::text('googleplus' ,$data->profile->googleplus) }}
			
				<p>{{ Form::label('instagram', 'Instagram:') }}</p>
				{{ Form::text('instagram' ,$data->profile->instagram) }}
			
				<p>{{ Form::label('myspace', 'MySpace:') }}</p>
				{{ Form::text('myspace' ,$data->profile->myspace) }}
			
				<p>{{ Form::label('bio', 'Bio:') }}</p>
				{{ Form::textarea('bio' ,$data->profile->bio) }}
			
				<p>{{ Form::label('profilepicture', 'Profielfoto:') }}</p>
				{{ Form::file('profilepicture' ,'') }}
			
				<p>{{ Form::submit('Edit Job', array('class' => 'button'))}}</p>

												
			<!-- close form tag -->
			{{ Form::close() }}

		</div>
		<div class="column col-md-2 col-sm-3"> </div>
		
	</div>
</div>

@stop