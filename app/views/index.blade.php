<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BeeHive</title>
	{{ HTML::style('css/main.css'); }}
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	{{ HTML::script('script/covervideo.js'); }}
</head>
<body>

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
        <input id="search-input" type="text" role="search" placeholder="Search for anything" autofocus="" onkeyup="if (event.keyCode == 13) { this.form.submit(); return false; }">
	    <label for="search-input" class="ui_search"></label>

	</div>
	</div><!-- end .header-unit -->

	<div class="container"> 
	
		<header>
			<div class="row"> 
				<div class="column col-md-8 col-sm-6">  
					<h1>BeeHive</h1>
				</div>
				<div class="column col-md-4 col-sm-6">  
					<nav class='headernav'>
						  <a href="/login">Login</a>
						  <a href="/specialist">Specialist</a> 
						  <a href="/jobs">Jobs</a> 
						   
					</nav>
				</div>
			</div>
		</header>
		<div class="row"> 

		</div>
		
	</div>
</body>
</html>
