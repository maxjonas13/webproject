$( document ).ready(function(){

	$('#logincontainer').hide();
	$('#login').hide();

	$('#registercontainer').hide();
	$('#register').hide();

	$('#jobcreatecontainer').hide();
	$('#jobcreate').hide();

	$('#closejobCandidateContainer').hide();
	$('#closejobCandidate').hide();

});

function containerclick(){

	$('#registercontainer').fadeOut( 200 );
	$('#register').fadeOut( 200 );
	$('#logincontainer').fadeOut( 200 );
	$('#login').fadeOut( 200 );
	$('#jobcreatecontainer').fadeOut( 200 );
	$('#jobcreate').fadeOut( 200 );

	$('#closejobCandidateContainer').fadeOut( 200 );
	$('#closejobCandidate').fadeOut( 200 );

}

function loginclick(){

	$('#logincontainer').fadeIn( 200 );
	$('#login').fadeIn( 200 );
	

}

function registerclick(){

	$('#registercontainer').fadeIn( 200 );
	$('#register').fadeIn( 200 );

}

function jobclick(){

	$('#jobcreatecontainer').fadeIn( 200 );
	$('#jobcreate').fadeIn( 200 );

}

function closeJobCandidateClick() {
	$('#closejobCandidateContainer').fadeIn( 200 );
	$('#closejobCandidate').fadeIn( 200 );
}