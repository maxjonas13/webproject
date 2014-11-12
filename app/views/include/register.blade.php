<div id="register">
	<i class="icon-remove-sign" onClick='containerclick()'></i>
		<h1>Registration</h1>
		@if($errors->count() > 0) 
			@foreach ($errors->all() as $error) 
				<ul>
					<li class="alert alert-danger popup" >{{$error}}</li>
				</ul>
			@endforeach
				@if(Session::get('register'))
					<script>
					$( document ).ready(function(){

						$('#registercontainer').show();
						$('#register').show();

					});
					</script>
				@endif
		@endif
		<!-- open form tag -->
		{{ Form::open( array('url' => '/register/save') ) }}
			<div class="{{ $errors->get('name') ? 'has-error' : FALSE }}">
				{{ Form::text('name' ,'', array('placeholder'=> "name")) }}
			</div>

			<div class="{{ $errors->get('firstname') ? 'has-error' : FALSE }}">							
				{{ Form::text('firstname' ,'', array('placeholder'=> "firstname")) }}
			</div>

			<div class="{{ $errors->get('email') ? 'has-error' : FALSE }}">							
				{{ Form::text('email' ,'', array('placeholder'=> "email")) }}
			</div>
			<div class="{{ $errors->get('password') ? 'has-error' : FALSE }}">						
				{{ Form::password('password', array('placeholder'=> "password")) }}
			</div>
			{{ Form::submit('Registreer') }}
											
		<!-- close form tag -->
		{{ Form::close() }}
	</div>
		
</div>
<div id="registercontainer" onClick="containerclick()">
</div>