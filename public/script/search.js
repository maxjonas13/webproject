var searchstring = '';
var search;

$('#search-input').keyup(function(searchstring) {
	searchstring = $('#search-input').val();
	timeOutClear();
	setATimeout(searchstring);
});

function timeOutClear() {
	clearTimeout(search);
}

function setATimeout(searchstring) {
	search = setTimeout( function() {
		// console.log(searchstring);
		$.get('/search/inteligence/' + searchstring).done(function(data) {
			// console.log(data);
			showInteligence(data);
		}).fail(function() { 
       		$('#jobsresult').hide();
			$('#userresult').hide();
    	})
    },1500);
}

function showInteligence(data) {
	$('#searchresult').slideUp("fast");
	$('#jobsresult').empty().append("<h4> Jobs </h4>");
	$('#userresult').empty().append("<h4> Specialist </h4>");
	for(i = 0; i < data.length; i++) {
		for(y = 0; y < data[i].length; y++) {
			if (!('name' in data[i][y])) {
				if (!('title' in data[i][y])){
					console.log(error);
				}
				else{
					console.log(data[i][y]['title']);
					$('#jobsresult').show();
					$('#jobsresult').append("<p><a href='/jobs/details/" + data[i][y]['PK_jobId'] + "''>" + data[i][y]['title'] + "</a></p>")
				}
			}
			else{
				console.log(data[i][y]['name']);
				$('#userresult').show();
				$('#userresult').append("<p><a href='/profile/" + data[i][y]['PK_userId'] + "''>" + data[i][y]['name'] + "</a></p>")
			}

		}
	}
	$('#searchresult').slideDown("slow");
}