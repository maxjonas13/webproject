<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Skilz</title>
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
<!-- Content panel -->
<div id="content">
	<div class="menu-trigger"></div>
		<a href="/" title="Laravel PHP Framework"><img src="img/logo.png" alt="Laravel PHP Framework"></a>
	</header>
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
