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
@extends("layout.default")

@section('content')
		<div class="firstrow"> 
			<div class="column col-md-2 col-sm-3"> </div>
			<div class="column col-md-8 col-sm-6" id="profileedit">  
			<h1>Edit Profile</h1>
			@if($errors->count() > 0) 
				@foreach ($errors->all() as $error) 
					<ul>
						<li>{{$error}}</li>
					</ul>
				@endforeach
			@endif
			<div class="hexagon" style="background-image: url({{$data->profile->profilePicture}});">
				  <div class="hexTop"></div>
				  <div class="hexBottom"></div>
				</div>
			<!-- open form tag -->
			{{ Form::open( array('url' => '/profile/update', 'files' => TRUE) ) }}

				<p>{{ Form::label('name', 'Naam :') }}</p>
				{{ Form::text('name', $data->name) }}

				<p>{{ Form::label('email', 'E-mail:') }}</p>
				{{ Form::text('email' ,$data->email) }}		

				<p>{{ Form::label('password', 'Wachtwoord:') }}</p>
				{{ Form::password('password') }}
		
				<p>{{ Form::label('newpassword', 'Nieuw wachtwoord:') }}</p>
				{{ Form::password('newpassword') }}
			
				<p>{{ Form::label('website', 'Personal website:') }}</p>
				{{ Form::text('website' , $data->profile->website) }}
			
				<p>{{ Form::label('twitter', 'Twitter:') }}</p>
				{{ Form::text('twitter' ,$data->profile->twitter) }}
			
				<p>{{ Form::label('github', 'Github:') }}</p>
				{{ Form::text('github' ,$data->profile->github) }}
			
				<p>{{ Form::label('linkedin', 'Linkedin:') }}</p>
				{{ Form::text('linkedin' ,$data->profile->linkedin) }}
			
				<p>{{ Form::label('pintrest', 'Pintrest:') }}</p>
				{{ Form::text('pintrest' ,$data->profile->pintrest) }}
			
				<p>{{ Form::label('googleplus', 'Google+:') }}</p>
				{{ Form::text('googleplus' ,$data->profile->googleplus) }}
			
				<p>{{ Form::label('instagram', 'Instagram:') }}</p>
				{{ Form::text('instagram' ,$data->profile->instagram) }}
			
				<p>{{ Form::label('myspace', 'MySpace:') }}</p>
				{{ Form::text('myspace' ,$data->profile->myspace) }}
			
				<p>{{ Form::label('bio', 'Bio:') }}</p>
				{{ Form::textarea('bio' ,$data->profile->bio) }}
			
				<p>{{ Form::label('profilepicture', 'Profielfoto:') }}</p>
				{{ Form::file('profilepicture' ,'') }}


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



			
				<p>{{ Form::submit('Edit Profile', array('class' => 'button'))}}</p>

												
			<!-- close form tag -->
			{{ Form::close() }}

		</div>
		<div class="column col-md-2 col-sm-3"> </div>
		
	</div>
</div>

@stop