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
		<title>You got a new comment on youre job @ Beehive</title>
	</head>
	<body>
		<h1>{{$name}} , you got a new comment from {{$commentorName}}</h1>
		<p>
			{{nl2br($comment)}}
		</p>
		<p>
			<!-- once online change this path -->
			<a href="http://www.jorenvanhocht.be/jobs/details/{{$jobid}}">Reply on {{$commentorName}}</a>
		</p>
		<p>
			Have a nice day!<br>
			BeeHive
		</p>
		<!-- yield footer -->
		@include('include.footer')
	</body>
</html>