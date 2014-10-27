@extends("layout.default")

@section('content')
<div id="login">
        	{{ Session::get('error_message') }}

<!-- open form tag -->
{{ Form::open( array('url' => '/login/check') ) }}

	{{ Form::label('email', 'E-mail:') }}
	{{ Form::text('email' ,'') }}
								
	{{ Form::label('password', 'Wachtwoord:') }}
	{{ Form::password('password') }}

	{{ Form::submit('Login') }}
									
<!-- close form tag -->
{{ Form::close() }}

@if(Auth::check()) 
	{{"hellow you are logged in now."}}
@endif
</div>
@stop