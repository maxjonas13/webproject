<doctype html>
<html>
	<head>
		<!-- inline script to style email -->
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
		<title>You got a new solicitant on youre job @ Beehive</title>
	</head>
	<body>

		<h1>{{$name}} , you got a new solicitant</h1>
		<p>
			{{$nameSolicitant}} has solicitated on youre job {{$jobTitle}}. You can contact him/here on the e-mail adress {{$emailSolicitant}}
		</p>
		<p>
			Have a nice day!<br>
			BeeHive
		</p>
		<!-- yield footer -->
		@include('include.footer')
	</body>
</html>