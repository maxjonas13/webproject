	<div class="header-unit">
		<div id="video-container">
			<div id='videocontent'>
				@if (Auth::check())
					 <h1 id="videotitle">Hi, {{Auth::user()->name;}}</h1>
					 <a class="button" href="/profile/{{ Auth::user()->PK_userId;}}">Profile</a>
					 <a class="button" href="/logout">Logout</a>
				@else
					<h1 id="videotitle">Friends who help</h1>
					<a class="button" onClick="registerclick()">Register</a>
				@endif
			</div>
			<video autoplay loop muted class="fillWidth">
				<source src="{{asset('assets/beehive.mp4')}}" type="video/mp4">
				<img src="/images/headervideo.jpg" title="Your browser does not support the <video> tag">
				Your browser does not support the video tag. I suggest you upgrade your browser.
			</video>
		</div><!-- end video-container -->
		<div id='searchbar' class="column col-md-12 col-sm-12">  
			<i class="icon-search"></i>
	        <input id="search-input" type="text" role="search" placeholder="Search for anything" autofocus="">
		    <label for="search-input" class="ui_search"></label>
		    <div id="searchresult">
		    	<div id="userresult">
		    		<h4>Users</h4>
		    	</div>
		    	
		    	<div id="jobsresult">
		    		<h4>jobs</h4>
		    	</div>
		    </div>
	</div><!-- end .header-unit -->