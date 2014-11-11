	function applyClick(id, userid) {
		var applyurl = '/jobs/solicitate/' + id;

		$.get(applyurl, null, function(data) {
			changeButtonState(id, userid);
			getSolicitants(id);
		});
	}

	function changeButtonState(jobid, userid) {
		//change apply button to cancel button
		$('.buttonapply').remove();
		$('#buttons').append('<a onClick = "cancelClick(' + jobid + ', ' + userid + ')" id="' + jobid + '"class="buttoncancel">Cancel</a>');
		
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

	function getSolicitants(id) {
		$.get('/jobs/solicitants/' + id, null, function(data) {
			$('#candidate').empty();
			for(i = 0; i < data.length; i++) {
				$('#candidate').append("<section id='candidate " + data[i][0]["PK_userId"] + "'><a href='/profile/'" + data[i][0]["PK_userId"] + "> <div class='hexagon' style='background-image: url("+ data[i][0]["profile"]["profilePicture"] +")'> <div class='hexTop'></div><div class='hexBottom'></div></div>" + data[i][0]["name"] + "</a></section>  ");
			}
		});
	}