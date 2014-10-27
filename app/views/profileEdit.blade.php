<!--
@if($errors->count() > 0) 
	@foreach ($errors->all() as $error) 
		<ul>
			<li>{{$error}}</li>
		</ul>
	@endforeach
@endif-->
<!-- open form tag -->
{{ Form::open( array('url' => '/profile/update', 'files' => TRUE) ) }}

	{{ Form::label('name', 'Naam :') }}
	{{ Form::text('name', $data->name) }}
<br>																
	{{ Form::label('email', 'E-mail:') }}
	{{ Form::text('email' ,$data->email) }}
<br>								
	{{ Form::label('password', 'Wachtwoord:') }}
	{{ Form::password('password') }}
<br>
	{{ Form::label('newpassword', 'Nieuw wachtwoord:') }}
	{{ Form::password('newpassword') }}
<br>
	{{ Form::label('website', 'Personal website:') }}
	{{ Form::text('website' , $data->website) }}
<br>
	{{ Form::label('twitter', 'Twitter:') }}
	{{ Form::text('twitter' ,$data->twitter) }}
<br>
	{{ Form::label('github', 'Github:') }}
	{{ Form::text('github' ,$data->github) }}
<br>
	{{ Form::label('linkedin', 'Linkedin:') }}
	{{ Form::text('linkedin' ,$data->linkedin) }}
<br>
	{{ Form::label('pintrest', 'Pintrest:') }}
	{{ Form::text('pintrest' ,$data->pintrest) }}
<br>
	{{ Form::label('googleplus', 'Google+:') }}
	{{ Form::text('googleplus' ,$data->googleplus) }}
<br>
	{{ Form::label('instagram', 'Instagram:') }}
	{{ Form::text('instagram' ,$data->instagram) }}
<br>
	{{ Form::label('myspace', 'MySpace:') }}
	{{ Form::text('myspace' ,$data->myspace) }}
<br>
	{{ Form::label('bio', 'Bio:') }}
	{{ Form::textarea('bio' ,$data->bio) }}
<br>
	{{ Form::label('profilepicture', 'Profielfoto:') }}
	{{ Form::file('profilepicture' ,'') }}
<br>
	{{ Form::submit('Wijzig profiel') }}
									
<!-- close form tag -->
{{ Form::close() }}