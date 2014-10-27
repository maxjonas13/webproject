		<header id='header'>
			<div class="row"> 
				<div class="column col-md-8 col-sm-6">  
					<a id="homelink" href="/"><h1>BeeHive</h1></a>
				</div>
				<div class="column col-md-4 col-sm-6">  
					<nav class='headernav'>
						@if (Auth::check())
							 <a id="logout" href="/logout">Logout</a>
						@else
							<a id="loginlink" onClick='loginclick()'>Login</a>
						@endif
						  
						  <a href="/specialist">Specialist</a> 
						  <a href="/jobs">Jobs</a> 
						   
					</nav>
				</div>
			</div>
		</header>
			<div class="container"> 