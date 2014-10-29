@extends("layout.default")

@section('content')
		<div class="row"> 
			<div class="column col-md-2 col-sm-3"> </div>
			<div class="column col-md-8 col-sm-6">  
					<section class="jobstyle {{$data->category[0]->categoryName}}">

						<h1 class="{{$data->category[0]->categoryName}}">{{$data->title}}</h1>
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
							<p class="{{$categorieitem->categoryName}}">{{$categorieitem->categoryName}}</p>
						@endforeach
						<a class="button" href="/jobs/details/{{$data->PK_jobId}}">Details</a>
						<a class="buttonapply" onClick="registerclick()">Apply</a>


					</section>
			</div>
			<div class="column col-md-2 col-sm-3"> </div>
	
	</div>
</div>


@stop