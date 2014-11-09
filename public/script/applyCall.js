	function applyClick(id) {
		console.log("clicked");
		var applyurl = '/jobs/solicitate/' + id;

		$.get(applyurl, null, function(data) {
			changeButtonState(data, id);
		});
	}

	function changeButtonState(data, jobid) {
		console.log(jobid);
		//change apply button to cancel button
		$('#' + jobid).hide();
		$('#buttons').append('<a onClick = "cancelClick({{$data->PK_jobId}})" class="buttoncancel">Cancel</a>');
	}
