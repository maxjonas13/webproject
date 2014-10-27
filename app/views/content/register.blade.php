@extends("layout.default")

@section('content')
@if($errors->count() > 0) 
	@foreach ($errors->all() as $error) 
		<ul>
			<li>{{$error}}</li>
		</ul>
	@endforeach
@endif
<!-- open form tag -->
{{ Form::open( array('url' => '/register/save') ) }}

	{{ Form::label('name', 'Naam :') }}
	{{ Form::text('name' ,'') }}
								
	{{ Form::label('firstname', 'Voornaam:') }}
	{{ Form::text('firstname' ,'') }}
								
	{{ Form::label('email', 'E-mail:') }}
	{{ Form::text('email' ,'') }}
								
	{{ Form::label('password', 'Wachtwoord:') }}
	{{ Form::password('password') }}

	{{ Form::submit('Registreer') }}
									
<!-- close form tag -->
{{ Form::close() }}
@stop