$( document ).ready(function(){

	$('#searchbar').css("top", $('#videocontent').height());

});
$( window ).resize(function(){

	$('#searchbar').css("top", $('video').height());

});