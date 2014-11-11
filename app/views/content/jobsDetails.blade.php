@extends("layout.default")

@section('content')
		<div class="firstrow"> 
			<div class="column col-md-2 col-sm-3"> </div>
			<div class="column col-md-8 col-sm-6">  
					<section class="jobstyle {{strtolower($data['job']->category[0]->categoryName)}}">
						<h1 class="{{strtolower($data['job']->category[0]->categoryName)}}">{{$data['job']->title}}</h1>
						<p><b>Description:</b></p>
						<p>{{$data['job']->description}}</p>
						<p><b>Owner:</b></p>
						<p>{{$data['job']->user->name}}</p>
						<p><b>Location:</b> </p>
						<p>{{$data['job']->location}}</p> 
						<p><b>created at:</b></p>
						<p>{{$data['job']->created_at}}</p> 
						<p><b>Catergories</b><p>
							<section id="category">
						@foreach ($data['job']->category as $categorieitem) 
							<p class="{{strtolower($categorieitem->categoryName)}}">{{$categorieitem->categoryName}}</p>
						@endforeach
							</section>
						@if(Auth::check())
							@if(Auth::user()->PK_userId != $data['job']->user->PK_userId)
							{{$hasApplied = false}}
								@foreach ($data['job']->candidate as $candidate)
									@if($candidate->FK_userId == Auth::User()->PK_userId && !$candidate->canceled )
									<?php $hasApplied = true ?>
									@endif
								@endforeach
								<section id="buttons">
								@if($hasApplied)
									<a onClick = "cancelClick({{$data['job']->PK_jobId}}, {{Auth::user()->PK_userId}})" id="{{$data['job']->PK_jobId}}"class="buttoncancel">Cancel</a>
								@else
									<a onClick = "applyClick({{$data['job']->PK_jobId}}, {{Auth::user()->PK_userId}})" id="{{$data['job']->PK_jobId}}" class="buttonapply">Apply</a>
								@endif
								</section>
							@else
								
								@if($data['job']->fixed)
									<p class="alert alert-danger">This job is closed.</p>
								@else
									<a class="button" href="/jobs/edit/{{$data['job']->PK_jobId}}">Edit</a>
									<a class="button" onClick="closeJobCandidateClick()" title="">Close job</a>
								@endif
							@endif
						@endif
						<div class="fb-share-button" data-href="http://projectweb.app:8000/jobs/details/{{$data['job']->PK_jobId}}" data-layout="button_count"></div>
					</section>

					<section>
						<section class="comment">
						<h3>Comments</h3>
							@if(count($data['job']->comment) == 0)
								<p class="alert alert-info">There are currently no comments on this job.</p>
							@endif
							@foreach($data['job']->comment as $comment) 
								<section class="commentitem">
									<a href="/profile/{{$comment->user->PK_userId}}"><h4>{{$comment->user->name}}</h4></a>
									<p>{{$comment->comment}}</p>
									<small>Posted at:{{$comment->created_at}}</small>
								</section>
							@endforeach
						</section>

						@if($errors->count() > 0 )
							@foreach($errors->all() as $error)
								<ul>
									<li>{{$error}}</li>
								</ul>
							@endforeach
						@endif
						
						@if(Auth::check())
							<!-- open form tag -->
							{{ Form::open( array('url' => '/comments/store') ) }}

								{{ Form::textarea('comment' ,'', array('placeholder'=> "Comment")) }}
								{{ Form::hidden('jobid', $data['job']->PK_jobId)}}
															
								{{ Form::submit('Add comment') }}
																
							<!-- close form tag -->
							{{ Form::close() }}
						@else 
							<p class="alert alert-danger">You have to be logged in to place a comment.</p>
						@endif
					</section>
			</div>
			<div class="column col-md-2 col-sm-3"> 
				<h3>Candidates</h3>
				<section id="candidate">
				@foreach ($data['candidate'] as $candidate) 		
					<section id="candidate{{$candidate->PK_userId}}">
						<a href="/profile/{{$candidate->PK_userId}}">
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

{{ HTML::script('script/applyCall.js'); }}
@stop