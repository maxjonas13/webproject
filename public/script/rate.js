$('.stars').click(function(e) {
	e.preventDefault();

	rating = $(this).attr('id');
	user = $('.rating').attr('id');
	user = user.replace('user', '')

	$.post( "/rate", { 'data[]': [ user, rating ] }).done(function() {
		$.get('/ratings/' + user, null, function(data) {
			console.log('The new average = ' + data);
			
			for (var i = 5; i >= 1; i--) {
				console.log(i);
				$("#"+i).removeClass("highlightfull");
			};
			for (var i = rating; i >= 1; i--) {
				console.log(i);
				$("#"+i).addClass( "highlightfull" );
			};
			$(".rating").append('<section class="alert alert-info rateMessage"><small>Thanks for your rating</small></section>');
		});
	}).fail(function() {
		console.log('something went wrong so you can show the user an error JONAS');
	});


});