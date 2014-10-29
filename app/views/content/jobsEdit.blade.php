<?php
$it = FALSE;
$languages = FALSE;
$finances = FALSE;
$repairs = FALSE;
$math = FALSE;
$art = FALSE;
$cooking = FALSE;
$programming = FALSE;
?>
@foreach($data->category as $item)
	@if($item == 'IT')
		{{{$it = TRUE}}}
	@endif
@endforeach

@if($errors->count() > 0) 
	@foreach($errors->all() as $error)
	<ul>
		<li>{{$error}}</li>
	</ul>
	@endforeach
@endif
<!-- open form tag -->
		{{ Form::open( array('url' => '/jobs/update') ) }}

			{{ Form::text('title' , $data->title , array('placeholder'=> "Title")) }}
			<br>
			{{ Form::text('location' , $data->location , array('placeholder'=> "Location")) }}
			<br>						
			{{ Form::textarea('description' , $data->description , array('placeholder'=> "Description")) }}
			<br>
	
				{{ Form::label('grouped["it"]', 'IT')}}
				{{ Form::checkbox('grouped[it]', '', $it)}}

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
		{{$data}}