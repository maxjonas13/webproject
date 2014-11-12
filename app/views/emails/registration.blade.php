<doctype html>
<html>
	<head>
		<style>
			h1, h2, h3, h4{
				color: #bd6100;
				-webkit-font-smoothing: antialiased;
			}
			p{
				margin: 20px;
				display: block;
				text-align: justify;
				width: 90%;
				-webkit-margin-before: 1em;
				-webkit-margin-after: 1em;
				-webkit-margin-start: 0px;
				-webkit-margin-end: 0px;
				line-height: 1.7em;
				-webkit-font-smoothing: antialiased;
				font-weight: normal !important;
			}
			html, body {
			  height: 100%;
			}

			body{
				 background-color: #CCC;
			}
		</style>
		<title>Beehive Registration</title>
	</head>
	<body>
		<h1>Welcome to BeeHive</h1>
		<p>
		Thanks for you're registration!<br>
		Naam = {{$name}}<br>
		email = {{$email}}<br>
		</p>
		@include('include.footer')
	</body>
</html>