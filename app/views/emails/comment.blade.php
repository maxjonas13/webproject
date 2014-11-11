<doctype html>
<html>
	<head>
		<title>You got a new comment on youre job @ Beehive</title>
	</head>
	<body>
		<h1>{{$name}} , you got a new comment from {{$commentorName}}</h1>
		<p>
			{{nl2br($comment)}}
		</p>
		<p>
			<!-- once online change this path -->
			<a href="jobs/details/{{$jobid}}">Reply on {{$commentorName}}</a>
		</p>
		<p>
			Have a nice day!<br>
			BeeHive
		</p>
	</body>
</html>