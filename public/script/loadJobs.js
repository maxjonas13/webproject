$(document).ready(function() {
	/*$.ajax({
		url: '/jobs/filter',
		data: data
	}).done(function() {
		console.log('ready jobs are there!');
	})*/
	
	$.get('/jobs/filter/all', null, function(data) {
		for(i = 0; i < data.length; i++) {
			console.log(data[i]['title']);
		}
	});

	$('.it').click(function(e){
		console.log('it clicked');
		e.preventDefault();
		$.get('/jobs/filter/IT', null, function(data){
			console.log(data);
		});
	});
});