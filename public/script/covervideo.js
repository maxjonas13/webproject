$( document ).ready(function(){
	$('#video-container').css("height", $('video').height());
	$('#videocontent').css("height", $('#video-container').height());
	$('#searchbar').css("margin-top", $('#videocontent').height());
	$('.firstrow').css("margin-top", $('#videocontent').height() + 100-20);

});
$( window ).resize(function(){
	$('#video-container').css("height", $('video').height());
	$('#videocontent').css("height", $('#video-container').height());
	$('#searchbar').css("margin-top", $('#videocontent').height());
	$('.firstrow').css("margin-top", $('#videocontent').height() + 100-20);
});