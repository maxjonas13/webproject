<div id="register">
	<i class="icon-remove-sign" onClick='containerclick()'></i>
		<h1>Registration</h1>
		@if($errors->count() > 0) 
			@foreach ($errors->all() as $error) 
				<ul>
					<li>{{$error}}</li>
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

			{{ Form::text('name' ,'', array('placeholder'=> "name")) }}
										
			{{ Form::text('firstname' ,'', array('placeholder'=> "firstname")) }}
										
			{{ Form::text('email' ,'', array('placeholder'=> "email")) }}
										
			{{ Form::password('password', array('placeholder'=> "password")) }}

			{{ Form::submit('Registreer') }}
											
		<!-- close form tag -->
		{{ Form::close() }}
	</div>
		
</div>
<div id="registercontainer" onClick="containerclick()">
</div>