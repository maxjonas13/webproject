@if (Session::has('error_message'))
        	{{ Session::get('error_message') }}
@endif
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