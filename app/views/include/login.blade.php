<div id="login">
	<i class="icon-remove-sign" onClick='containerclick()'></i>
	<h1 id="videotitle">Login</h1>
	@if(Session::get('error_message') != null)
	{{ Session::get('error_message') }}
	<script>
	$( document ).ready(function(){

		$('#logincontainer').show();
		$('#login').show();

	});
	</script>
	@endif
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
<div id="logincontainer" onClick="containerclick()">
</div>