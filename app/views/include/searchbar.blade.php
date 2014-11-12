<div id="searchbarin">  
	<!-- search icon -->
	<i class="icon-search"></i>
	{{ Form::open( array('url' => '/search') ) }}
		<!-- input field -->
	    <input id="search-input" name="search-input" type="text" role="search" placeholder="Search for anything" autofocus="">
		<label for="search-input" class="ui_search"></label>
		<div id="searchresult">
			<!-- section user searchresult -->
		   	<div id="userresult">
		    </div>
		    <!-- section job searchresult -->
		    <div id="jobsresult">
		    </div>
		</div>
	{{ Form::close() }}

</div>