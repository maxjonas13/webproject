$( document ).ready(function(){
	$('#videocontent').css("height", $('#video-container').height());
	$('#searchbar').css("margin-top", $('#videocontent').height());
	$('.firstrow').css("margin-top", $('#videocontent').height() + 100-20);

});
$( window ).resize(function(){
	$('#videocontent').css("height", $('video').height());
	$('#searchbar').css("margin-top", $('#videocontent').height());
	$('.firstrow').css("margin-top", $('#videocontent').height() + 100);
});