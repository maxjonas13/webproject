$('.stars').click(function(e) {
	e.preventDefault();

	rating = $(this).attr('id');
	user = $('.rating').attr('id');

	$.post( "/rate", { 'data[]': [ user, rating ] }).done(function() {
		$.get('/ratings/' + user, null, function(data) {
			console.log('The new average = ' + data);
		});
	}).fail(function() {
		console.log('something went wrong so you can show the user an error JONAS');
	});


});