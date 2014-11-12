@extends("layout.default")

@section('content')
		<div class="firstrow"> 
			<!-- use of firstrow, it wil have a margin as high as the video player. -->
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
				<!-- will yield specialist from include view with ajax call-->
			</div>
			<div class="column col-md-2 col-sm-3"> </div>
	
	</div>
</div>

<!-- script with ajax call -->
{{ HTML::script('script/loadSpecialists.js'); }}
@stop