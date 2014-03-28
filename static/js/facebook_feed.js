var facebook_url = window.location.href;
var pos = facebook_url.lastIndexOf('/');
facebook_url = facebook_url.substring(0, pos) + '/api/facebook_get_feeds.php';
var xmlhttp;
xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        var response = JSON.parse(xmlhttp.responseText);
	console.log(response);
    }
}
xmlhttp.open("GET", facebook_url, true);
xmlhttp.send();
