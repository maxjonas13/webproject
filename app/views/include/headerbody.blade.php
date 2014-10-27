<div class="header-unit">
		<div id="video-container">
			<div id='videocontent'>
				<h1 id="videotitle">Friends who help</h1>
				<button type="button">Register</button>
			</div>
			<video autoplay loop class="fillWidth">
				<source src="{{asset('assets/beehive.mp4')}}" type="video/mp4">
				Your browser does not support the video tag. I suggest you upgrade your browser.
			</video>
		</div><!-- end video-container -->
		<div id='searchbar' class="column col-md-12 col-sm-12">  
			<i class="icon-search"></i>
	        <input id="search-input" type="text" role="search" placeholder="Search for anything" autofocus="" onkeyup="if (event.keyCode == 13) { this.form.submit(); return false; }">
		    <label for="search-input" class="ui_search"></label>

		</div>
	</div><!-- end .header-unit -->