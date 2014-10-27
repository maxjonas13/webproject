$( document ).ready(function(){

	$('#logincontainer').hide();
	$('#login').hide();

	$('#registercontainer').hide();
	$('#register').hide();

});

function containerclick(){

	$('#registercontainer').fadeOut( 200 );
	$('#register').fadeOut( 200 );
	$('#logincontainer').fadeOut( 200 );
	$('#login').fadeOut( 200 );

}

function loginclick(){

	$('#logincontainer').fadeIn( 200 );
	$('#login').fadeIn( 200 );
	

}

function registerclick(){

	$('#registercontainer').fadeIn( 200 );
	$('#register').fadeIn( 200 );

}