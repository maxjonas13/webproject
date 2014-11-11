@if($errors->count() > 0) 
	@foreach ($errors->all() as $error) 
		<ul>
			<li>{{$error}}</li>
		</ul>
	@endforeach
@endif
<!-- open form tag -->
		{{ Form::open( array('url' => '/resetwachtwoord') ) }}

		{{ Form::text('email' ,'', array('placeholder'=> "email")) }}

		{{ Form::submit('Send new password') }}
										
	<!-- close form tag -->
	{{ Form::close() }}