	function applyClick(id) {
		console.log("clicked");
		var applyurl = '/jobs/solicitate/' + id;

		$.get(applyurl, null, function(data) {
			changeButtonState(data, id);
		});
	}

	function changeButtonState(data, jobid) {
		//change apply button to cancel button
		$('#' + jobid).css("background-color", "red");
	}
