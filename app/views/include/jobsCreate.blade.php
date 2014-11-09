<div id="jobcreate">
	<i class="icon-remove-sign" onClick='containerclick()'></i>
	@if($errors->count() > 0) 
	@foreach($errors->all() as $error)
	<ul>
		<li>{{$error}}</li>
	</ul>
	@endforeach
@endif
<!-- open form tag -->
<h1>Create Job</h1>
		{{ Form::open( array('url' => '/jobs/store') ) }}

			{{ Form::text('title' ,'', array('placeholder'=> "Title")) }}
			<br>
			{{ Form::text('location' ,'', array('placeholder'=> "Location")) }}
			<br>						
			{{ Form::textarea('description' ,'', array('placeholder'=> "Description")) }}
			<br>
			
			{{ Form::checkbox('grouped[it]','','', array('id'=> "it")) }}
			{{ Form::label('it"', 'IT')}}

			{{ Form::checkbox('grouped[languages]','','', array('id'=> "languages")) }}
			{{ Form::label('languages', 'Languages')}}
			<br>
			
			
			{{ Form::checkbox('grouped[finances]','','', array('id'=> "finances")) }}
			{{ Form::label('finances')}}
			
			{{ Form::checkbox('grouped[repair]','','', array('id'=> "repairs")) }}
			{{ Form::label('repairs')}}
			<br>	

			
			{{ Form::checkbox('grouped[math]','','', array('id'=> "math")) }}
			{{ Form::label('math', 'Math & Fysics')}}
			
			{{ Form::checkbox('grouped[art]','','', array('id'=> "art")) }}
			{{ Form::label('art', 'Art')}}
			<br>

			
			{{ Form::checkbox('grouped[cooking]','','', array('id'=> "cooking")) }}
			{{ Form::label('cooking', 'Cooking')}}

			{{ Form::checkbox('grouped[programming]','','', array('id'=> "programming")) }}
			{{ Form::label('programming', 'Programming')}}
			<br>

			<br>
			{{ Form::submit('Voeg job toe') }}
											
		<!-- close form tag -->
		{{ Form::close() }}
</div>
<div id="jobcreatecontainer" onClick="containerclick()">
</div>