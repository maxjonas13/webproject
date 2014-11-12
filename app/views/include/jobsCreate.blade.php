<div id="jobcreate">
	<i class="icon-remove-sign" onClick='containerclick()'></i>
	<h1>Create Job</h1>
	@if($errors->count() > 0) 
		@foreach ($errors->all() as $error) 
			<ul>
				<li>{{$error}}</li>
			</ul>
		@endforeach
			<script>
				$( document ).ready(function(){
					$('#jobcreatecontainer').show();
					$('#jobcreate').show();

				});
			</script>
	@endif
@if(!Auth::user()->credit->credits > 0) 
	<p id="createJobError" class="alert alert-danger">You have no credits anymore. Help somebody else to get credits again.</p>
@else
<!-- open form tag -->
		{{ Form::open( array('url' => '/jobs/store') ) }}
			<div class="{{ $errors->get('title') ? 'has-error' : FALSE }}">
				{{ Form::text('title' ,'', array('placeholder'=> "Title")) }}
			</div>
			<br>
			<div class="{{ $errors->get('location') ? 'has-error' : FALSE }}">
				{{ Form::text('location' ,'', array('placeholder'=> "Location")) }}
			</div>
			<br>
			<div class="{{ $errors->get('description') ? 'has-error' : FALSE }}">						
			{{ Form::textarea('description' ,'', array('placeholder'=> "Description")) }}
		</div>
			<br>
			<div class="{{ $errors->get('grouped') ? 'has-error' : FALSE }}">	
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
			</div>
			<br>
			{{ Form::submit('Voeg job toe') }}
											
		<!-- close form tag -->
		{{ Form::close() }}
@endif
</div>
<div id="jobcreatecontainer" onClick="containerclick()">
</div>