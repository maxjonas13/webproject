<div id="logincontainer" onClick="containerclick()">
</div>
<div id="login">
	<i class="icon-remove-sign" onClick='containerclick()'></i>
	<h1 id="videotitle">Login</h1>
    {{ Session::get('error_message') }}
	<!-- open form tag -->
		{{ Form::open( array('url' => '/login/check') ) }}

		{{ Form::text('email' ,'', array('placeholder'=> "email")) }}
									
		{{ Form::password('password', array('placeholder'=> "wachtwoord")) }}

		{{ Form::submit('Login') }}
										
	<!-- close form tag -->
	{{ Form::close() }}

	@if(Auth::check()) 
		{{"hellow you are logged in now."}}
	@endif
</div>