var facebook_url = window.location.href;
var pos = facebook_url.lastIndexOf('/');
var response
facebook_url = facebook_url.substring(0, pos) + '/api/facebook_get_feeds.php';
var xmlhttp;
xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        response = JSON.parse(xmlhttp.responseText);
        html_response = '';
	
	for(var i=0; i<response.data.length; i++) {
            if(response.data[i].picture) response.data[i].picture = response.data[i].picture.replace(/_s/, '_n');
	    var shares = (response.data[i].shares)?("<strong> Shares </strong> &nbsp&nbsp&nbsp&nbsp" +response.data[i].shares.count):"";
	    var likes = (response.data[i].likes)?(" <img src=\"https://cdn2.iconfinder.com/data/icons/business-icons-2-3/256/Best_Choice-32.png\" /> &nbsp&nbsp&nbsp" +response.data[i].likes.data.length):"";
	    var page_link = 'https://facebook.com/'+response.data[i].from.id;
	    var link = (response.data[i].actions == undefined)?(response.data[i].link):(response.data[i].actions[0].link);
	    if(response.data[i].to) {
			response.data[i].from.name = response.data[i].from.name + " <img src=\"https://cdn2.iconfinder.com/data/icons/snipicons/5000/arrow-right-128.png\" width=\"40px\" height=\"40px\" /> " + response.data[i].to.data[0].name;

	}
	
	    if(response.data[i].type == "photo" && response.data[i].status_type == "added_photos") {
		if(response.data[i].message == undefined) response.data[i].message = "<img width=\"200px\" src=\"" + response.data[i].picture + "\" />";
		else response.data[i].message = response.data[i].message + "<br><br> <img width=\"200px\" src=\"" + response.data[i].picture + "\" />";
	    } else if( response.data[i].type == "link" && response.data[i].status_type == "shared_story") {
		if(response.data[i].message == undefined) response.data[i].message = "<img width=\"200px\" src=\"" + response.data[i].picture + "\" />";
		else response.data[i].message = response.data[i].message + "<br><br> <img width=\"200px\" src=\"" + response.data[i].picture + "\" />";

		if(response.data[i].name !=undefined) response.data[i].message += "<br><br> <h6>" + response.data[i].name + "</h6>";
	    } else if( response.data[i].type == "photo" && response.data[i].status_type == "tagged_in_photo") {
	        response.data[i].message = response.data[i].story + "<br><br> <img width=\"200px\" src=\"" +  "\" />";
	    } else if(response.data[i].type == "link") {
		if(response.data[i].caption) response.data[i].message = response.data[i].caption;
		if(response.data[i].description) response.data[i].message += "<br>" + response.data[i].description;
	    }
	html_response += '<div class="row">  <div class="col-lg-1"> <a href="https://facebook.com/"> <img src="static/images/facebook.png" style="margin-top: 20px; margin-left: 35px; width: 30px;"></a> </div> <div class="col-lg-10"> <div class="row">   <a href=\'' + page_link + '\' > <h4>' + response.data[i].from.name  +  '</h4> </a> </div> <div class="row"> <div class="col-lg-12">    <h5> <a href=\''+ link  + '\' >' + response.data[i].message + ' </a> </h5> <div class="row"> <table> <td> ' + likes + ' </td>  </table> </div> </div> </div> </div> <div class="col-lg-1"> </div> </div> <hr>';
	}
        $('#main').append(html_response);
    }
}
xmlhttp.open("GET", facebook_url, true);
xmlhttp.send();
