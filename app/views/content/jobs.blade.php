@extends("layout.default")

@section('content')
		<div class="firstrow"> 
			<div class="column col-md-2 col-sm-3"> 
				<p class="IT">IT</p>
				<p class="language">Language</p>
				<p class="finances">Finances</p>
				<p class="repairs">Repairs</p>
				<p class="math">Math & Fysics</p>
				<p class="art">Art</p>
				<p class="cooking">Cooking</p>
				<p class="programming">Programming</p>
			</div>
			<div class="column col-md-8 col-sm-6"> 
				@foreach ($data as $dataitem) 

					<section class="jobstyle {{$dataitem->category[0]->categoryName}}" >
					<h1 class='{{$dataitem->category[0]->categoryName}}'>
					{{$dataitem->title}}</h1>
					<p class="jobtextinfo"><b>Location:</b> <small>{{$dataitem->location}}</small> <b>created at:</b> <small>{{$dataitem->created_at}}</small> <b>by:</b> <small>{{$dataitem->user->name}}</small></p>
					<p>{{$dataitem->description}}</p>
					<a class="button" href="/jobs/details/{{$dataitem->PK_jobId}}">Details</a>
					<a class="buttonapply" onClick="registerclick()">Apply</a>

				</section>
				@endforeach
			</div>
			<div class="column col-md-2 col-sm-3"> </div>
	
	</div>
</div>


@stop