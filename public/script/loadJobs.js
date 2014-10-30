$(document).ready(function() {
	/*$.ajax({
		url: '/jobs/filter',
		data: data
	}).done(function() {
		console.log('ready jobs are there!');
	})*/
	
	$.get('/jobs/filter/all', null, function(data) {
		getView(data);
	});

	$('.it').click(function(e){
		console.log('it clicked');
		e.preventDefault();
		$.get('/jobs/filter/IT', null, function(data){
			getView(data);

		});
	});

	$('.language').click(function(e){
		console.log('language clicked');
		e.preventDefault();
		$.get('/jobs/filter/language', null, function(data){
			getView(data);
		});
	});

	$('.finances').click(function(e){
		console.log('finances clicked');
		e.preventDefault();
		$.get('/jobs/filter/finances', null, function(data){
			getView(data);
		});
	});

	$('.repairs').click(function(e){
		console.log('repairs clicked');
		e.preventDefault();
		$.get('/jobs/filter/repairs', null, function(data){
			getView(data);
		});
	});

	$('.math').click(function(e){
		console.log('math clicked');
		e.preventDefault();
		$.get('/jobs/filter/math', null, function(data){
			getView(data);
		});
	});

	$('.art').click(function(e){
		console.log('art clicked');
		e.preventDefault();
		$.get('/jobs/filter/art', null, function(data){
			getView(data);
		});
	});

	$('.cooking').click(function(e){
		console.log('cooking clicked');
		e.preventDefault();
		$.get('/jobs/filter/cooking', null, function(data){
			getView(data);
		});
	});

	$('.programming').click(function(e){
		console.log('programming clicked');
		e.preventDefault();
		$.get('/jobs/filter/programming', null, function(data){
			getView(data);
		});
	});
});

function getView(data){
	$('#jobcontainer').empty();
	for(i = 0; i < data.length; i++) {
			tag = '<section class="jobstyle '+ data[i]['category'][0]['categoryName']+'" ><h1 class=' + data[i]['category'][0]["categoryName"] + '>'+ data[i]["title"] +'</h1><p class="jobtextinfo"><small><strong>Location: </strong>' + data[i]["location"]+'<strong> Created at: </strong>' + data[i]["created_at"] +'<strong> By: </strong> ' + data[i]['user']['name'] + '</small></p><p>' + data[i]["description"] + '</p><a class="button" href="/jobs/details/' + data[i]["PK_jobId"] + '">Details</a><a class="buttonapply" onClick="registerclick()">Apply</a></section>';
			/* Write the text */
			document.getElementById('jobcontainer').innerHTML += tag;
			console.log(data[i]);
		}
};