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
		console.log(searchstring);
		$.get('/search/inteligence/' + searchstring, null, function(data) {
			console.log(data);
			showInteligence(data);
		})
	},1500);
}

function showInteligence(data) {
	for(i = 0; i < data.length; i++) {
		for(y = 0; y < data[i].length; y++) {
			console.log(data[i][y]);
		}
	}
}