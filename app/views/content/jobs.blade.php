@extends("layout.default")

@section('content')
		<!-- use of firstrow, it wil have a margin as high as the video player. -->
		<div class="firstrow"> 
			<div class="column col-md-2 col-sm-3"> 
				<!-- colomn with categories for sorting jobs on categorie -->
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
				<!-- will yield jobs from include view with ajax call-->
			</div>
			<div class="column col-md-2 col-sm-3">
				<!-- check for login -->
				@if(Auth::check()) 
					<!-- check if user has enough credits -->
					@if(!Auth::user()->credit->credits > 0) 
						<!-- error if not enough -->
						<p id="createJobError" class="alert alert-danger">
							You have no credits anymore.<br> You should help somebody else to get credits and to make your new job.
						</p>
					@else
						<!-- show content id enough credits-->
					<a onClick='jobclick()'>
						<!-- ribbon style button -->
						<h1 class="ribbon">
							<!-- content of ribbon 'create job' -->
					   		<strong class="ribbon-content">Create Job</strong>
						</h1>
					</a>
					@endif
				@endif
			</div>
		</div>
	</div>
</div>
<!-- check for login -->
@if(Auth::check())
	<!-- show job create if login is true -->
	@include('include.jobsCreate')
@endif
<!-- scripts for time mod, loading jobs and apply on jobs. -->
{{ HTML::script('script/timeago.js'); }}
<!-- script with ajax call -->
{{ HTML::script('script/loadJobs.js'); }}
{{ HTML::script('script/applyCall.js'); }}
@stop