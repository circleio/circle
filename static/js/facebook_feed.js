var facebook_url = window.location.href;
var pos = facebook_url.lastIndexOf('/');
facebook_url = facebook_url.substring(0, pos) + '/api/facebook_get_feeds.php';
var xmlhttp;
xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        var response = JSON.parse(xmlhttp.responseText);
        html_response = '';
	for(var i=0; i<response.data.length; i++) {
            html_response += '<div class="row"><div class="col-lg-1"><a href="https://facebook.com/"><img src="static/images/facebook.png" style="margin-top: 20px; margin-left: 35px; width: 30px;"></a></div><div class="col-lg-10"><div class="row"><div class="col-lg-12"><h4>' + response.data[i].message + '</h4></div></div></div><div class="col-lg-1"></div></div>';
	}
    }
    $('#main').append(html_response);
}
xmlhttp.open("GET", facebook_url, true);
xmlhttp.send();
