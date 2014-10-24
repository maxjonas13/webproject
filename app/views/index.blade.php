<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FixBuddy</title>
	{{ HTML::style('css/main.css'); }}
</head>
<body>
	<header>
		<nav id="slide-menu">
			<ul>
				<li class="timeline">Profile</li>
				<li class="events">Jobs</li>
				<li class="calendar">Super Hero's</li>
				<li class="sep settings">Settings</li>
				<li class="logout">Logout</li>
			</ul>
		</nav>
	</header>
		<!-- Content panel -->

		<div id="content">
			<div class="menu-trigger"></div>	
			<a href="/" title="logo"><img src="img/logo.png" alt="Laravel PHP Framework"></a>
			<div id="pagecontent">
				
				<div class="postcontent webdesign">
					<img src="http://www.remood.net/files/portfolio/2013-innostrom/innostrom-logodesign-webdesign.jpg">
					<h1>Uitwerking innostrom</h1>
					<p>Ik zoek iemand dat mijn website innostrom kan uitwerken tot een werkende responsif website</p>
				</div>

				<div class="postcontent reparaties">
					<img src="http://www.nrc.nl/inbeeld/files/2011/12/2912webapp16-980x656.jpg">
					<h1>Iemand dat dit kan repareren?</h1>
					<p>Mijn man was bezig aan ons huis, er is iets mis gelopen, het zou geweldig zijn als er iemand was dat ons kan helpen</p>
				</div>

				<div class="postcontent School">
					<img src="http://www.expertessayswriters.com/images/Essay.jpg">
					<h1>Ik zoek specialist in frans?</h1>
					<p>Ik moest voor het school een essay schrijven in het frans, ik zou graag iemand willen vragen om mijn Essay na te lezen, compensatie is ne bak bier!</p>
				</div>

				<div class="postcontent School">
					<img src="http://www.expertessayswriters.com/images/Essay.jpg">
					<h1>Ik zoek specialist in frans?</h1>
					<p>Ik moest voor het school een essay schrijven in het frans, ik zou graag iemand willen vragen om mijn Essay na te lezen, compensatie is ne bak bier!</p>
				</div>

				<div class="postcontent School">
					<img src="http://www.expertessayswriters.com/images/Essay.jpg">
					<h1>Ik zoek specialist in frans?</h1>
					<p>Ik moest voor het school een essay schrijven in het frans, ik zou graag iemand willen vragen om mijn Essay na te lezen, compensatie is ne bak bier!</p>
				</div>

				<div class="postcontent School">
					<img src="http://www.expertessayswriters.com/images/Essay.jpg">
					<h1>Ik zoek specialist in frans?</h1>
					<p>Ik moest voor het school een essay schrijven in het frans, ik zou graag iemand willen vragen om mijn Essay na te lezen, compensatie is ne bak bier!</p>
				</div>

				<div class="postcontent School">
					<img src="http://www.expertessayswriters.com/images/Essay.jpg">
					<h1>Ik zoek specialist in frans?</h1>
					<p>Ik moest voor het school een essay schrijven in het frans, ik zou graag iemand willen vragen om mijn Essay na te lezen, compensatie is ne bak bier!</p>
				</div>

			</div>
	</div>


<script>
(function() {
	var $body = document.body
	, $menu_trigger = $body.getElementsByClassName('menu-trigger')[0];

	if ( typeof $menu_trigger !== 'undefined' ) {
		$menu_trigger.addEventListener('click', function() {
			$body.className = ( $body.className == 'menu-active' )? '' : 'menu-active';
		});
	}

}).call(this);
</script>
</body>
</html>
