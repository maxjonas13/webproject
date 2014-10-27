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
	<video id="videobackground" autoplay loop muted>
			<source src="{{asset('assets/beehive.mp4')}}" type="video/mp4">
	</video>
	<div id="videooverlay"></div>

	<div class="container"> 
	
		<header>
			<div class="row"> 
				<div class="column col-md-8 col-sm-6">  
					<h1>BeeHive</h1>
				</div>
				<div class="column col-md-4 col-sm-6">  
					<nav class='headernav'>
						  <a href="/Jobs/">Jobs</a> 
						  <a href="/Specialist/">Specialist</a> 
						  <a href="/Login/">Login</a> 
					</nav>
				</div>
			</div>
		</header>

		<div id='videocontent' class="column col-md-12 col-sm-12">
			<h1 id="videotitle">Friends who help</h1>
			<button type="button">Register</button>
		</div>

		<div id='searchbar' class="column col-md-12 col-sm-12">
			<h1>Searchbar</h1>
		</div>
	</div>
</body>
</html>
