@extends("layout.default")

@section('content')
		<div class="firstrow"> 
			<div class="column col-md-2 col-sm-3"> 
				<p class="it cat">IT</p>
				<p class="language cat">Language</p>
				<p class="finances cat">Finances</p>
				<p class="repairs cat">Repairs</p>
				<p class="math cat">Math & Fysics</p>
				<p class="art cat">Art</p>
				<p class="cooking cat">Cooking</p>
				<p class="programming cat">Programming</p>
			</div>
			<div class="column col-md-8 col-sm-6" id="jobcontainer"> 
				
			</div>
			<div class="column col-md-2 col-sm-3"> 
				@if(!Auth::user()->credit->credits > 0) 
					<p id="createJobError" class="alert alert-danger">You have no credits anymore.<br> You should help somebody else to get credits and to make your new job.</p>
				@else
				<a onClick='jobclick()'>
					<h1 class="ribbon">
				   		<strong class="ribbon-content">Create Job</strong>
					</h1>
				</a>
				@endif
			</div>
	
	</div>
</div>
		@if(Auth::check())
			@include('include.jobsCreate')
		@endif
{{ HTML::script('script/loadjobs.js'); }}
{{ HTML::script('script/applyCall.js'); }}
@stop