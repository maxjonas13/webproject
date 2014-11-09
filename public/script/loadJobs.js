//declare some global variables
pagenumber = null;
classes = Array();

//check if the document is ready
$(document).ready(function() {
	//document is ready

	//get all the jobs
	$.get('/jobs/all', null, function(data) {
		getOverview(data);
	});

	//get all the jobs with category it
	$('.it').click(function(e){
		e.preventDefault();
		$.get('/jobs/filter/IT', null, function(data){
			getView(data, "it");

		});
	});

	//get all the jobs with category language
	$('.language').click(function(e){
		e.preventDefault();
		$.get('/jobs/filter/language', null, function(data){
			getView(data, "language");
		});
	});

	//get all the jobs with category finances
	$('.finances').click(function(e){
		e.preventDefault();
		$.get('/jobs/filter/finances', null, function(data){
			getView(data, 'finances');
		});
	});

	//get all the jobs with category repairs
	$('.repairs').click(function(e){
		e.preventDefault();
		$.get('/jobs/filter/repairs', null, function(data){
			getView(data, "repairs");
		});
	});

	//get all the jobs with category math
	$('.math').click(function(e){
		e.preventDefault();
		$.get('/jobs/filter/math', null, function(data){
			getView(data, "math");
		});
	});

	//get all the jobs with category art
	$('.art').click(function(e){
		e.preventDefault();
		$.get('/jobs/filter/art', null, function(data){
			getView(data, "art");
		});
	});

	//get all the jobs with category cooking
	$('.cooking').click(function(e){
		e.preventDefault();
		$.get('/jobs/filter/cooking', null, function(data){
			getView(data, "cooking");
		});
	});

	//get all the jobs with category programming
	$('.programming').click(function(e){
		e.preventDefault();
		$.get('/jobs/filter/programming', null, function(data){
			getView(data, "programming");
		});
	});
	
});

//function to show the job overview
function getOverview(data){
	//make sure the jobcontainer is empty
	$('#jobcontainer').empty();
	
	//loop true the jobs, data['data'] => beceause off pagination data is in another data array
	for(i = 0; i < data['data'].length; i++) {
		//put the content in the variable tag
		tag = '<section class="jobstyle '+ data['data'][i]['category'][0]['categoryName'].toLowerCase() +'" ><h1 class=' + data['data'][i]['category'][0]["categoryName"].toLowerCase() + '>'+ data['data'][i]["title"] +'</h1><p class="jobtextinfo"><small><strong>Location: </strong>' + data['data'][i]["location"]+'<strong> Created at: </strong>' + data['data'][i]["created_at"] +'<strong> By: </strong> ' + data['data'][i]['user']['name'] + '</small></p><p>' + data['data'][i]["description"] + '</p><a class="button" href="/jobs/details/' + data['data'][i]["PK_jobId"] + '">Details</a></section>';
		
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

			//retrieve the next page with jobs
			//replace has been used filter the numbers out off the classname so we know wich page we have to load
			$.get('/jobs/all?page=' + e.target.className.replace(/[^0-9]/g, ''), null, function(data){
				//load the getOverview function again with data
				getOverview(data);
			});
		});
	}
	
};

//function to show the jobs off the choosen category
function getView(data , cat) {
	//make sure the jobcontainer is empty
	$('#jobcontainer').empty();

	//loop true the jobs, data['data'] => beceause off pagination data is in another data array
	for(i = 0; i < data['data'].length; i++) {
		//put the content in the variable tag
		tag = '<section class="jobstyle '+ data['data'][i]['category'][0]['categoryName'].toLowerCase() +'" ><h1 class=' + data['data'][i]['category'][0]["categoryName"].toLowerCase() + '>'+ data['data'][i]["title"] +'</h1><p class="jobtextinfo"><small><strong>Location: </strong>' + data['data'][i]["location"]+'<strong> Created at: </strong>' + data['data'][i]["created_at"] +'<strong> By: </strong> ' + data['data'][i]['user']['name'] + '</small></p><p>' + data['data'][i]["description"] + '</p><a class="button" href="/jobs/details/' + data['data'][i]["PK_jobId"] + '">Details</a></section>';
		
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

			//retrieve the next page with jobs
			//replace has been used filter the numbers out off the classname so we know wich page we have to load
			$.get('/jobs/filter/' + cat.toLowerCase() + '?page=' + e.target.className.replace(/[^0-9]/g, ''), null, function(data){
				//load the getOverview function again with data
				getView(data, cat);
			});
		});
	}

}


