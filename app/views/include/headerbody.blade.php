		<header id='header'>
			<div class="row"> 
				<div class="column col-md-1 col-sm-1">  
					<!-- title -->
					<a id="homelink" href="/"><h1>BeeHive</h1></a>
				</div>
				<div class="column col-md-11 col-sm-11">
				  <!-- nivigation  -->
					<nav class='headernav'>
						@if (Auth::check())
						<!-- check if logged in -->
							 <a id="logout" href="/logout">Logout</a>
							 <a href="/profile/{{Auth::user()->PK_userId}}">Profile</a> 
						@else
							<a id="loginlink" onClick='registerclick()'>Register</a>
							<a id="loginlink" onClick='loginclick()'>Login</a>
						@endif
						  <a href="/about">About</a>
						  <a href="/specialists">Specialist</a> 
						  <a href="/jobs">Jobs</a> 
						   
					</nav>
				</div>
			</div>
		</header>
		<!-- opening container tag -->
	<div class="container"> 