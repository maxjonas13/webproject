$('.buttonapply').click(function(e) {
	e.preventDefault();

	var applyurl = $('.buttonapply').attr("href");

	$.ajax({
		url: applyurl
	}).done(function() {
		$('.buttonapply').hide();
	});
	
})