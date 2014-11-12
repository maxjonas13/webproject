<div id="closejobCandidate">
	<!-- icon X to close window -->
	<i class="icon-remove-sign" onClick='containerclick()'></i>
	@if($errors->count() > 0) 
	<!-- check for errors -->
	@foreach($errors->all() as $error)
	<ul>
		<!-- class alert danger for attention -->
		<li class="alert alert-danger">{{$error}}</li>
	</ul>
	@endforeach
@endif
<!-- open form tag -->
<h1>Select a candidate who helped you:</h1>
@foreach ($data['candidate'] as $candidate) 		
	<section id="candidate{{$candidate->PK_userId}}">
		<a href="/jobs/close/{{$data['job']->PK_jobId}}/{{$candidate->PK_userId}}">
			<div class="hexagon" style="background-image: url({{$candidate->profile->profilePicture}});">
				<div class="hexTop"></div>
				<div class="hexBottom"></div>
			</div>
			{{$candidate->name}}
		</a>
	</section>
@endforeach
</div>
<div id="closejobCandidateContainer" onClick="containerclick()">
</div>