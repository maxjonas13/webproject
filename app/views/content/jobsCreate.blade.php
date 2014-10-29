@if($errors->count() > 0) 
	@foreach($errors->all() as $error)
	<ul>
		<li>{{$error}}</li>
	</ul>
	@endforeach
@endif
<!-- open form tag -->
		{{ Form::open( array('url' => '/jobs/store') ) }}

			{{ Form::text('title' ,'', array('placeholder'=> "Title")) }}
			<br>
			{{ Form::text('location' ,'', array('placeholder'=> "Location")) }}
			<br>						
			{{ Form::textarea('description' ,'', array('placeholder'=> "Description")) }}
			<br>
			{{ Form::label('grouped["it"]', 'IT')}}
			{{ Form::checkbox('grouped[it]')}}

			{{ Form::label('languages', 'Languages')}}
			{{ Form::checkbox('grouped[languages]')}}
			
			{{ Form::label('finances')}}
			{{ Form::checkbox('grouped[finances]')}}
			
			{{ Form::label('repairs')}}
			{{ Form::checkbox('grouped[repair]')}}
			
			{{ Form::label('math', 'Math & Fysics')}}
			{{ Form::checkbox('grouped[math]')}}
			
			{{ Form::label('art', 'Art')}}
			{{ Form::checkbox('grouped[art]')}}

			{{ Form::label('cooking', 'Cooking')}}
			{{ Form::checkbox('grouped[cooking]')}}

			{{ Form::label('programming', 'Programming')}}
			{{ Form::checkbox('grouped[programming]')}}

			<br>
			{{ Form::submit('Voeg job toe') }}
											
		<!-- close form tag -->
		{{ Form::close() }}