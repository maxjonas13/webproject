@extends("layout.default")

@section('content')
		<div class="firstrow"> 
			<div class="column col-md-2 col-sm-3"> 
				<p class="it"><a href="">IT</a></p>
				<p class="language">Language</p>
				<p class="finances">Finances</p>
				<p class="repairs">Repairs</p>
				<p class="math">Math & Fysics</p>
				<p class="art">Art</p>
				<p class="cooking">Cooking</p>
				<p class="programming">Programming</p>
			</div>
			<div class="column col-md-8 col-sm-6"> 
				
			</div>
			<div class="column col-md-2 col-sm-3"> </div>
	
	</div>
</div>

{{ HTML::script('script/loadjobs.js'); }}
@stop