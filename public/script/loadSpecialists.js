//declare some global variables
pagenumber = null;
classes = Array();

//check if the document is ready
$(document).ready(function() {
	//document is ready

	//get all the users
	$.get('/specialists/all', null, function(data) {
		getOverview(data);
	});

	//get all the users with category it
	$('.it').click(function(e){
		e.preventDefault();
		$.get('/specialists/filter/IT', null, function(data){
			getView(data, "it");

		});
	});

	//get all the users with category language
	$('.language').click(function(e){
		e.preventDefault();
		$.get('/specialists/filter/language', null, function(data){
			getView(data, "language");
		});
	});

	//get all the users with category finances
	$('.finances').click(function(e){
		e.preventDefault();
		$.get('/specialists/filter/finances', null, function(data){
			getView(data, 'finances');
		});
	});

	//get all the users with category repairs
	$('.repairs').click(function(e){
		e.preventDefault();
		$.get('/specialists/filter/repairs', null, function(data){
			getView(data, "repairs");
		});
	});

	//get all the users with category math
	$('.math').click(function(e){
		e.preventDefault();
		$.get('/specialists/filter/math', null, function(data){
			getView(data, "math");
		});
	});

	//get all the users with category art
	$('.art').click(function(e){
		e.preventDefault();
		$.get('/specialists/filter/art', null, function(data){
			getView(data, "art");
		});
	});

	//get all the users with category cooking
	$('.cooking').click(function(e){
		e.preventDefault();
		$.get('/specialists/filter/cooking', null, function(data){
			getView(data, "cooking");
		});
	});

	//get all the users with category programming
	$('.programming').click(function(e){
		e.preventDefault();
		$.get('/specialists/filter/programming', null, function(data){
			getView(data, "programming");
		});
	});
	
});

//function to show the job overview
function getOverview(data){
	//console.log(data['data']);
	//make sure the jobcontainer is empty
	$('#jobcontainer').empty();
	
	//loop true the users, data['data'] => beceause off pagination data is in another data array
	for(i = 0; i < data['data'].length; i++) {
		//put the content in the variable tag
		//console.log(data['data'][i]['category']);
		tag = '<section class="jobstyle '+ data['data'][i]['category'][0]['categoryName'].toLowerCase() +'" ><h1 class=' + data['data'][i]['category'][0]['categoryName'].toLowerCase() + '>'+ data['data'][i]["name"] + '</h1><div class="hexagon" style="margin-bottom:20px; background-image: url('+data['data'][i]["profile"]["profilePicture"] + ');"><div class="hexTop"></div><div class="hexBottom"></div></div><p class="biospecialist">' + data['data'][i]["profile"]["bio"] +'</p><a style="margin-top:40px;" class="button" href="/profile/' + data['data'][i]["PK_userId"] + '">Details</a></section>';
		
		//add the tag variable to the content off jobcontainer
		document.getElementById('jobcontainer').innerHTML += tag;
	}

	//JONAS YOU CAN USE CURRENT TO CHECK WICH IS THE CURRENT PAGE AND GIVE IT ANOTHER STYLE, GRTZ JOREN
	//put the pagination data in a variable
	total = data['total'];
	perPage = data['per_page'];
	current = data['current_page'];
	lastPage = data['last_page'];
	
	//loop true the number of pages
	for(i = 0; i < lastPage; i++) {
		//pagenumber + 1 because i = 0
		pagenumber = i + 1;
		//put the page number in a class together with "page", this will be used ass the classname off the link
		classes[i] = "page" + pagenumber;

		//append the link to the jobcontainer
		$('#jobcontainer').append ('<section id="pagination"></section>');
		$('#pagination').append ( '<a href="" class="'+classes[i]+'"> ' + pagenumber + ' </a>');
	}

	//loop true the classes
	for(i = 0; i < classes.length; i++) {
		//check if there is clicked on a page number
		$('.' + classes[i]).click(function(e) {
			//there has been clicked on a page number

			//prevent the link to go to another page
			e.preventDefault();

			//retrieve the next page with users
			//replace has been used filter the numbers out off the classname so we know wich page we have to load
			$.get('/specialists/all?page=' + e.target.className.replace(/[^0-9]/g, ''), null, function(data){
				//load the getOverview function again with data
				getOverview(data);
			});
		});
	}
	
};

//function to show the users off the choosen category
function getView(data , cat) {
	//make sure the jobcontainer is empty
	$('#jobcontainer').empty();

	//check if there are users for the selected category
	if(data['data'].length == 0) {
		tag = 'There are currently no specialists for this category.';

		//add the tag variable to the content off jobcontainer
		document.getElementById('jobcontainer').innerHTML += tag;
	}

	//loop true the users, data['data'] => beceause off pagination data is in another data array
	for(i = 0; i < data['data'].length; i++) {
		
		//put the content in the variable tag
		tag = '<section class="jobstyle '+ data['data'][i]['category'][0]['categoryName'].toLowerCase() +'" ><h1 class=' + data['data'][i]['category'][0]['categoryName'].toLowerCase() + '>'+ data['data'][i]["name"] + '</h1><div class="hexagon" style="margin-bottom:20px; background-image: url('+data['data'][i]["profile"]["profilePicture"] + ');"><div class="hexTop"></div><div class="hexBottom"></div></div><p class="biospecialist">' + data['data'][i]["profile"]["bio"] +'</p><a style="margin-top:40px;" class="button" href="/profile/' + data['data'][i]["PK_userId"] + '">Details</a></section>';
		//add the tag variable to the content off jobcontainer
		document.getElementById('jobcontainer').innerHTML += tag;
	}

	//JONAS YOU CAN USE CURRENT TO CHECK WICH IS THE CURRENT PAGE AND GIVE IT ANOTHER STYLE, GRTZ JOREN
	//put the pagination data in a variable
	total = data['total'];
	perPage = data['per_page'];
	current = data['current_page'];
	lastPage = data['last_page'];
	
	//loop true the number of pages
	for(i = 0; i < lastPage; i++) {
		//pagenumber + 1 because i = 0
		pagenumber = i + 1;
		//put the page number in a class together with "page", this will be used ass the classname off the link
		classes[i] = "page" + pagenumber;

		//append the link to the jobcontainer
		$('#jobcontainer').append ('<section id="pagination"></section>');
		$('#pagination').append ( '<a href="" class="'+classes[i]+'"> ' + pagenumber + ' </a>');
	}

	//loop true the classes
	for(i = 0; i < classes.length; i++) {
		//check if there is clicked on a page number
		$('.' + classes[i]).click(function(e) {
			//there has been clicked on a page number
			
			//prevent the link to go to another page
			e.preventDefault();

			//retrieve the next page with users
			//replace has been used filter the numbers out off the classname so we know wich page we have to load
			$.get('/specialists/filter/' + cat.toLowerCase() + '?page=' + e.target.className.replace(/[^0-9]/g, ''), null, function(data){
				//load the getOverview function again with data
				getView(data, cat);
			});
		});
	}

}


