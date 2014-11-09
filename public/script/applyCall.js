	function applyClick(id) {
		var applyurl = '/jobs/solicitate/' + id;

		$.get(applyurl, null, function(data) {
			changeButtonState(data, id);
		});
	}

	function changeButtonState(data, jobid) {
		//change apply button to cancel button
		$('.buttonapply').hide();
		$('#buttons').append('<a onClick = "cancelClick(' + jobid + ')" id="' + jobid + '"class="buttoncancel">Cancel</a>');
	}

	function cancelClick(id) {
		var cancelurl = '/jobs/solicitate/cancel/' + id;

		$.get(cancelurl, null, function(data) {
			changeButtonStatecancel(id);
		});
	}

	function changeButtonStatecancel(jobid) {
		//change apply button to cancel button
		$('.buttoncancel').hide();
		$('#buttons').append('<a onClick = "applyClick(' + jobid + ')" id="' + jobid + '" class="buttonapply">Apply</a>');
	}
