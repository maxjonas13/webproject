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
	<?php echo $item->categoryName;?>
	@if($item->categoryName == 'IT')
		<?php $it = TRUE; ?>
	@endif
	@if($item->categoryName == 'Languages')
		<?php $languages = TRUE; ?>
	@endif
	@if($item->categoryName == 'Finances')
		<?php $finances = TRUE; ?>
	@endif
	@if($item->categoryName == 'Repair')
		<?php $repairs = TRUE; ?>
	@endif
	@if($item->categoryName == 'Math')
		<?php $math = TRUE; ?>
	@endif
	@if($item->categoryName == 'Art')
		<?php $art = TRUE; ?>
	@endif
	@if($item->categoryName == 'Cooking')
		<?php $cooking = TRUE; ?>
	@endif
	@if($item->categoryName == 'Programming')
		<?php $programming = TRUE; ?>
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
				{{ Form::checkbox('grouped[languages]', '', $languages)}}
				
				{{ Form::label('finances')}}
				{{ Form::checkbox('grouped[finances]', '', $finances)}}
				
				{{ Form::label('repairs')}}
				{{ Form::checkbox('grouped[repair]', '', $repairs)}}
				
				{{ Form::label('math', 'Math & Fysics')}}
				{{ Form::checkbox('grouped[math]', '', $math)}}
				
				{{ Form::label('art', 'Art')}}
				{{ Form::checkbox('grouped[art]', '', $art)}}

				{{ Form::label('cooking', 'Cooking')}}
				{{ Form::checkbox('grouped[cooking]', '', $cooking)}}

				{{ Form::label('programming', 'Programming')}}
				{{ Form::checkbox('grouped[programming]', '', $programming)}}
		
			<br>
			{{ Form::submit('Voeg job toe') }}
											
		<!-- close form tag -->
		{{ Form::close() }}
		{{$data}}