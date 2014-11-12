@extends("layout.default")

@section('content')
		<!-- use of firstrow, it wil have a margin as high as the video player. -->
	<div class="firstrow"> 
		<div class="column col-md-2 col-sm-3"> </div>

		<div class="column col-md-8 col-sm-6"> 

			<!-- class has categroy name -->
			<section class="jobstyle {{strtolower($data['job']->category[0]->categoryName)}}">
					
				<!-- same for H1 -->
				<h1 class="{{strtolower($data['job']->category[0]->categoryName)}}">{{$data['job']->title}}</h1>
					
				<p><b>Description:</b></p>
				<p>{{$data['job']->description}}</p>
				<p><b>Owner:</b></p>
				<p>{{$data['job']->user->name}}</p>
				<p><b>Location:</b> </p>
				<p>{{$data['job']->location}}</p> 
				<p><b>created at:</b></p>
				<p>{{$data['job']->created_at->diffForHumans()}}</p> 
				<!-- diffForhumans so that timestamp is beeter readeble for humans -->
				<p><b>Catergories</b><p>
					
				<section id="category">
						
					@foreach ($data['job']->category as $categorieitem) 
						<!-- class has categroy name -->
						<p class="{{strtolower($categorieitem->categoryName)}}">
							{{$categorieitem->categoryName}}
						</p>
					
					@endforeach
				</section>

					<!-- check for login -->
					@if(Auth::check())
							
						@if(Auth::user()->PK_userId != $data['job']->user->PK_userId)
						<!-- init hasAplied false -->
							
						{{$hasApplied = false}}
							<!-- get all different candidates -->
								
							@foreach ($data['job']->candidate as $candidate)
								@if($candidate->FK_userId == Auth::User()->PK_userId && !$candidate->canceled )
									<?php $hasApplied = true ?>
								@endif
							@endforeach
								
							<section id="buttons">
								@if($hasApplied)
									<!-- cancel application -->
									<a onClick = "cancelClick({{$data['job']->PK_jobId}}, {{Auth::user()->PK_userId}})" id="{{$data['job']->PK_jobId}}"class="buttoncancel">Cancel</a>
								@else
									<!-- apply for job -->
									<a onClick = "applyClick({{$data['job']->PK_jobId}}, {{Auth::user()->PK_userId}})" id="{{$data['job']->PK_jobId}}" class="buttonapply">Apply</a>
								@endif
							</section>

						@else
							<!-- if the job is already done -->
							@if($data['job']->fixed)
								<!-- show alert -->
								<p class="alert alert-danger">This job is closed.</p>
							@else
							<!-- buttons to edit or close -->
								<a class="button" href="/jobs/edit/{{$data['job']->PK_jobId}}">Edit</a>
								<a class="button" onClick="closeJobCandidateClick()" title="">Close job</a>
							@endif
						@endif
					
					@endif
					
				</section>

				<section id="social">

					<p>
						<!-- social media like and share -->
						<div class="fb-share-button" data-href="http://www.jorenvanhocht.be/jobs/details/{{$data['job']->PK_jobId}}" data-layout="button_count"></div>

						<a class="twitter-share-button" href="https://www.jorenvanhocht.be/share" data-text="{{$data['job']->title}}" data-via="BeeHiveOfficial">Tweet</a>
					</p>

					<section class="comment">
						<!-- section for comments -->
					<h3>Comments</h3>

					@if(count($data['job']->comment) == 0)
						<p class="alert alert-info">There are currently no comments on this job.</p>
					@endif
							
					@foreach($data['job']->comment as $comment) 
						<section class="commentitem">
							<!-- only one comment here -->
							<a href="/profile/{{$comment->user->PK_userId}}">
								<h4>{{$comment->user->name}}</h4>
							</a>
									
							<!-- comment text -->
							<p>{{$comment->comment}}</p>
									
							<small>Posted {{$comment->created_at->diffForHumans()}}</small>
						</section>
					@endforeach

				</section>

				@if($errors->count() > 0 )
					<!-- error section for error display -->
					@foreach($errors->all() as $error)
						<ul>
							<li class="alert alert-danger">{{$error}}</li>
						</ul>
					@endforeach
				@endif
						
				@if(Auth::check())
					<!-- open form tag -->
					{{ Form::open( array('url' => '/comments/store') ) }}
							
						<div class="{{ $errors->get('comment') ? 'has-error' : FALSE }}">
							{{ Form::textarea('comment' ,'', array('placeholder'=> "Comment")) }}`
						</div>
								
						{{ Form::hidden('jobid', $data['job']->PK_jobId)}}
						<!-- hidden jobid to send to controller -->
															
						{{ Form::submit('Add comment') }}
																
							<!-- close form tag -->
					{{ Form::close() }}
				@else 
						
				<p class="alert alert-danger">You have to be logged in to place a comment.</p>
				<!-- alert when you're not logged in -->
						
				@endif
			</section>
		</div>
		<div class="column col-md-2 col-sm-3"> 
			<!-- section with candidates -->
			<h3>Candidates</h3>
			<section id="candidate">
				@foreach ($data['candidate'] as $candidate) 		
					<section id="candidate{{$candidate->PK_userId}}">
						<a href="/profile/{{$candidate->PK_userId}}">
							<!-- profile picture -->
							<div class="hexagon" style="background-image: url({{$candidate->profile->profilePicture}});">
								<div class="hexTop"></div>
								<div class="hexBottom"></div>
							</div>
							{{$candidate->name}}
						</a>
					</section>
				@endforeach
			</section>
		</div>
	</div>
</div>


@include('include.candidates')

<!-- script for applying to job -->
{{ HTML::script('script/applyCall.js'); }}
@stop