@extends("layout.default")

@section('content')
		<div class="firstrow"> 
			<div class="column col-md-2 col-sm-3"> </div>
			<div class="column col-md-8 col-sm-6" id="profile"> 

				@if(!empty($data->category[0]))
					<section class="profilestyle {{strtolower($data->category[0]->categoryName)}}">
				@else
					<section class="profilestyle">
				@endif
				<h1>Profile</h1>

				<div class="hexagon" style="background-image: url({{$data->profile->profilePicture}});">
				  <div class="hexTop"></div>
				  <div class="hexBottom"></div>
				</div>
				@if($data->PK_userId == Auth::User()->PK_userId)
				{{ HTML::link('profile/edit/'.$data->PK_userId, 'edit', array('class' => 'buttoncontact'), false)}}
				@else
				{{ HTML::link('profile/edit/'.$data->PK_userId, 'contact', array('class' => 'buttonapply'), false)}}
				@endif
				<h4>Rating</h4>

				<div class="rating" id="user{{$data->PK_userId}}">

					<!-- JONAS!!!!!!!! de variabele $rating bevat een int tussen 1 en 5 met de gemiddelde rating van de user deze kan je gebruiken om de sterren in de kleuren ;) ;) ;) ;) ;) ;) -->
					@if ($rating == 5) 
						<span class="stars highlight" id="5">☆</span>
						<span class="stars highlight" id="4">☆</span>
						<span class="stars highlight" id="3">☆</span>
						<span class="stars highlight" id="2">☆</span>
						<span class="stars highlight" id="1">☆</span>

					@elseif ($rating == 4) 
						<span class="stars" id="5">☆</span>
						<span class="stars highlight" id="4">☆</span>
						<span class="stars highlight" id="3">☆</span>
						<span class="stars highlight" id="2">☆</span>
						<span class="stars highlight" id="1">☆</span>
					
					@elseif ($rating == 3) 
						<span class="stars" id="5">☆</span>
						<span class="stars" id="4">☆</span>
						<span class="stars highlight" id="3">☆</span>
						<span class="stars highlight" id="2">☆</span>
						<span class="stars highlight" id="1">☆</span>
					
					@elseif ($rating == 2) 
						<span class="stars" id="5">☆</span>
						<span class="stars" id="4">☆</span>
						<span class="stars" id="3">☆</span>
						<span class="stars highlight" id="2">☆</span>
						<span class="stars highlight" id="1">☆</span>
					
					@elseif ($rating == 1) 
						<span class="stars" id="5">☆</span>
						<span class="stars" id="4">☆</span>
						<span class="stars" id="3">☆</span>
						<span class="stars" id="2">☆</span>
						<span class="stars highlight" id="1">☆</span>
					@else
						<span class="stars" id="5">☆</span>
						<span class="stars" id="4">☆</span>
						<span class="stars" id="3">☆</span>
						<span class="stars" id="2">☆</span>
						<span class="stars" id="1">☆</span>
					
					@endif

				</div>

				<h4>name:</h4>
				 <p>{{$data->name}} </p>

				<h4>email:</h4>
				 <p>{{$data->email}}</p>

				 <h4>website:</h4>
				 <p>{{$data->profile->website}}</p>

				<h4>twitter:</h4>
				 <p>twitter.com/{{$data->profile->twitter}}</p>

				<h4>github:</h4>
				 <p>github.com/{{$data->profile->github}}</p>

				<h4>linkedin:</h4>
				 <p>linkedin.com/in/{{$data->profile->linkedin}}</p>

				<h4>googleplus:</h4>
				 <p>googleplus.com/{{$data->profile->googleplus}}</p>

				<h4>instagram:</h4>
				 <p>instagram.com/{{$data->profile->instagram}}</p>

				<h4>myspace:</h4>
				 <p>myspace.com/{{$data->profile->myspace}}</p>

				<h4>Bio</h4>
				<p>{{nl2br($data->profile->bio)}}</p>
				<h4>Catergories</H4>
								<p>
						@foreach ($data->category as $categorieitem) 
							<span class="{{strtolower($categorieitem->categoryName)}}">{{$categorieitem->categoryName}}</span><br>
						@endforeach
					</p>
			
			</section>
		</div>
		<div class="column col-md-2 col-sm-3"> </div>
	</div>
</div>
	{{ HTML::script('script/rate.js'); }}
@stop
