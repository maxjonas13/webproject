<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BeeHive</title>
	{{ HTML::style('css/main.css'); }}
</head>
<body>
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
		<div class="column col-md-8 col-sm-6">
			<video autoplay loop muted>
				<source src="{{asset('assets/beehive.mp4')}}" type="video/mp4">
			</video>
		</div>
	</header>
</div>
</body>
</html>
