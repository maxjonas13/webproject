<div id="searchbarin">  
	
			<i class="icon-search"></i>
			{{ Form::open( array('url' => '/search') ) }}
	        <input id="search-input" name="search-input" type="text" role="search" placeholder="Search for anything" autofocus="">
		    <label for="search-input" class="ui_search"></label>
		    <div id="searchresult">
		    	<div id="userresult">
		    	</div>
		    	<div id="jobsresult">
		    	</div>
		    </div>
	{{ Form::close() }}
</div>