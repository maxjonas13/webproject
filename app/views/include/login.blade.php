<div id="login">
	<!-- icon X to close window -->
	<i class="icon-remove-sign" onClick='containerclick()'></i>
	<div id="loginwindow">
	<h1 id="videotitle">Login</h1>
	@if(Session::get('error_message') != null)
	<ul><li class="alert alert-danger popup">{{ Session::get('error_message') }}</li></ul>
	<!-- script to show screen again if error detected -->
	<script>
	$( document ).ready(function(){

		$('#logincontainer').show();
		$('#login').show();

	});
	</script>
	@endif
	<!-- open form tag -->

		{{ Form::open( array('url' => '/login/check') ) }}
		<div class="{{ Session::get('error_message') != null ? 'has-error' : FALSE }}">
			{{ Form::text('email' ,'', array('placeholder'=> "email")) }}
		</div>
		<div class="{{ Session::get('error_message') != null ? 'has-error' : FALSE }}">							
			{{ Form::password('password', array('placeholder'=> "wachtwoord")) }}<br>
		</div>
		<a onclick='forgotten()' class="wachtwoordvergeten">wachtwoord vergeten?</a>
		<br>

		{{ Form::submit('Login') }}
										
	<!-- close form tag -->
	{{ Form::close() }}
	<h4>Or</h4>
	{{ HTML::link('login/fb', 'Login with facebook', array('class' => 'facebookbutton'), false)}}
	@if(Auth::check()) 
		{{"hellow you are logged in now."}}
	@endif
	</div>
	<div id="wwvergeten">
		<h1>wachtwoord vergeten</h1>
		@if($errors->count() > 0) 
		@foreach ($errors->all() as $error) 
			<ul>
				<li class="alert alert-danger popup" >{{$error}}</li>
			</ul>
		@endforeach
	@endif
	<!-- open form tag -->
			{{ Form::open( array('url' => '/resetwachtwoord') ) }}
			<div class="{{ $errors->get('email') ? 'has-error' : FALSE }}">
				{{ Form::text('email' ,'', array('placeholder'=> "email")) }}
			</div>
			{{ Form::submit('Send new password') }}
											
		<!-- close form tag -->
		{{ Form::close() }}
	</div>
</div>
<div id="logincontainer" onClick="containerclick()">
</div>
<div id="wwvergeten">
</div>
{{ HTML::script('script/wwforgoten.js'); }}