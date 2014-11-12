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
		<title>You have reset you're password</title>
	</head>
	<body>
		<h1>Temorary password</h1>
		<p>
			You're temporary password is {{$temppass}}<br>
			You can log in with this email adres and the temporary password above. Don't forgot to change this again to a password of you're choise.
		</p>
		<p>
			If you didn't ask for this pleas change you're password as fast as possible and contact us.
		</p>
		<p>
			Have a nice day!<br>
			BeeHive
		</p>
		@include('include.footer')
	</body>
</html>