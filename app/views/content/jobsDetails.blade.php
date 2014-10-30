@extends("layout.default")

@section('content')
		<div class="firstrow"> 
			<div class="column col-md-2 col-sm-3"> </div>
			<div class="column col-md-8 col-sm-6">  
					<section class="jobstyle {{strtolower($data->category[0]->categoryName)}}">

						<h1 class="{{strtolower($data->category[0]->categoryName)}}">{{$data->title}}</h1>
						<p><b>Description:</b></p>
						<p>{{$data->description}}</p>
						<p><b>Owner:</b></p>
						<p>{{$data->user->name}}</p>
						<p><b>Location:</b> </p>
						<p>{{$data->location}}</p> 
						<p><b>created at:</b></p>
						<p>{{$data->created_at}}</p> 
						<p><b>Catergories</b><p>
						@foreach ($data->category as $categorieitem) 
							<p class="{{strtolower($categorieitem->categoryName)}}">{{$categorieitem->categoryName}}</p>
						@endforeach
						@if(Auth::check())
							@if( Auth::user()->PK_userId == $data->FK_userId)
							<a class="button" href="/jobs/edit/{{$data->PK_jobId}}">Edit</a>
							@endif
						@endif
						
						{{link_to('/candidates/apply/' . Auth::user()->PK_userId , 'Apply' , $attributes = array('class' => 'buttonapply'))}}
						@if(Auth::check())
							@if(Auth::user()->PK_userId == $data->user->PK_userId)
								@if($data->fixed)
									<a href="/jobs/open/{{$data->PK_jobId}}" title="">Open job</a>
								@else
									<a href="/jobs/close/{{$data->PK_jobId}}" title="">Close job</a>
								@endif
							@endif
						@endif

						@foreach($data->comment as $comment) 
							{{$comment->comment}}
							{{$comment->user->name}}
						@endforeach

						@if($errors->count() > 0 )
							@foreach($errors->all() as $error)
								<ul>
									<li>{{$error}}</li>
								</ul>
							@endforeach
						@endif
						<!-- ENKEL TONEN INDIEN EEN USER IS INGELOGD! -->
						<!-- open form tag -->
						{{ Form::open( array('url' => '/comments/store') ) }}

							{{ Form::textarea('comment' ,'', array('placeholder'=> "Comment")) }}
							{{ Form::hidden('jobid', $data->PK_jobId)}}
														
							{{ Form::submit('Add comment') }}
															
						<!-- close form tag -->
						{{ Form::close() }}

					</section>
			</div>
			<div class="column col-md-2 col-sm-3"> </div>
	
	</div>
</div>

{{ HTML::script('script/applyCall.js'); }}
@stop