@extends("layout.defaultedit")

@section('content')
	<!-- use of firstrow, it wil have a margin as high as the video player. -->
		<div class="firstrow"> 
			<div class="column col-md-2 col-sm-3"> </div>
			<div class="column col-md-8 col-sm-6" id="profile">  
				<h1>Edit Job</h1>
				<!-- var init for checkboxvalue -->
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
					@if($item->categoryName == 'IT')
						<?php $it = TRUE; ?>
					@endif
					@if($item->categoryName == 'Language')
						<?php $languages = TRUE; ?>
					@endif
					@if($item->categoryName == 'Finances')
						<?php $finances = TRUE; ?>
					@endif
					@if($item->categoryName == 'Repairs')
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
				<!-- error section -->
				@if($errors->count() > 0) 
					@foreach($errors->all() as $error)
					<ul>
						<li class="alert alert-danger">{{$error}}</li>
					</ul>
					@endforeach
				@endif
				<!-- open form tag -->
				{{ Form::open( array('url' => '/jobs/update') ) }}
					<div class="{{ $errors->get('title') ? 'has-error' : FALSE }}">
						{{ Form::text('title' , $data->title , array('placeholder'=> "Title")) }}
					</div>
					<br>
					<div class="{{ $errors->get('location') ? 'has-error' : FALSE }}">
						{{ Form::text('location' , $data->location , array('placeholder'=> "Location")) }}
					</div>
					<br>
					<div class="{{ $errors->get('description') ? 'has-error' : FALSE }}">						
						{{ Form::textarea('description' , $data->description , array('placeholder'=> "Description")) }}
					</div>
					{{ Form::hidden('id', $data->PK_jobId)}}
					<br>
			
					<div class="{{ $errors->get('grouped') ? 'has-error' : FALSE }}">
						{{ Form::checkbox('grouped[it]', $it ,$it, array('id'=> "it")) }}
						{{ Form::label('it', 'IT')}}

						
						{{ Form::checkbox('grouped[language]', $languages, $languages, array('id'=> "languages")) }}
						{{ Form::label('languages', 'Languages')}}

						<br>
						
						
						{{ Form::checkbox('grouped[finances]', $finances, $finances, array('id'=> "finances")) }}
						{{ Form::label('finances')}}
						
						
						{{ Form::checkbox('grouped[repairs]', $repairs, $repairs, array('id'=> "repairs")) }}
						{{ Form::label('repairs')}}
						
						<br>
						
						{{ Form::checkbox('grouped[math]', $math,$math, array('id'=> "math")) }}
						{{ Form::label('math', 'Math & Fysics')}}
		

						{{ Form::checkbox('grouped[art]', $art,$art, array('id'=> "art")) }}
						{{ Form::label('art', 'Art')}}

						<br>

						{{ Form::checkbox('grouped[cooking]', $cooking, $cooking, array('id'=> "cooking")) }}
						{{ Form::label('cooking', 'Cooking')}}

						
						{{ Form::checkbox('grouped[programming]', $programming,$programming, array('id'=> "programming")) }}
						{{ Form::label('programming', 'Programming')}}
					</div>
				
					<br>
					{{ Form::submit('Voeg job toe') }}
													
				<!-- close form tag -->
				{{ Form::close() }}

			</div>
		<div class="column col-md-2 col-sm-3"> </div>
	</div>
	</div>
</div>

@stop
