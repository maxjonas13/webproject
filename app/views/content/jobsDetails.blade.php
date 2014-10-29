@extends("layout.defaultdetails")

@section('content')
		<div class="row"> 
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
						@if( Auth::user()->PK_userId == $data->FK_userId)
						<a class="button" href="/jobs/edit/{{$data->PK_jobId}}">Edit</a>
						@endif
						<a class="buttonapply" onClick="registerclick()">Apply</a>


					</section>
			</div>
			<div class="column col-md-2 col-sm-3"> </div>
	
	</div>
</div>


@stop