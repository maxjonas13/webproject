	function applyClick(id, userid) {
		var applyurl = '/jobs/solicitate/' + id;

		$.get(applyurl, null, function(data) {
			changeButtonState(id, userid);
		});
	}

	function changeButtonState(jobid, userid) {
		//change apply button to cancel button
		$('.buttonapply').remove();
		$('#buttons').append('<a onClick = "cancelClick(' + jobid + ', ' + userid + ')" id="' + jobid + '"class="buttoncancel">Cancel</a>');
		$('#candidate').append('<p class="candidatetext">You have applied for this job</p>');
		
	}

	function cancelClick(id, userid) {
		var cancelurl = '/jobs/solicitate/cancel/' + id;

		$.get(cancelurl, null, function(data) {
			changeButtonStatecancel(id, userid);
		});
	}

	function changeButtonStatecancel(jobid, userid) {
		//change apply button to cancel button
		$('.buttoncancel').remove();
		$('#buttons').append('<a onClick = "applyClick(' + jobid + ', ' + userid + ')" id="' + jobid + '" class="buttonapply">Apply</a>');
		$('#candidate'+userid).remove();
		$('.candidatetext').remove();
	}
