var twitter_url = window.location.href;
var pos = twitter_url.lastIndexOf('/');
twitter_url = twitter_url.substring(0, pos) + '/api/twitter/get_twitter.php';
var xmlhttp;
xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        var response = JSON.parse(xmlhttp.responseText);
        var html_response = '';
	for(var i=0;i<response.data.length;i++) {
            html_response += '<div class="row"><div class="col-lg-1"><img src="static/images/twitter.png" style="margin-top: 20px; width: 50px;"></div><div class="col-lg-10"><div class="row"><div class="col-lg-12"><span><a style="color: #fff; font-size: 3em;" href="https://twitter.com/' + response.data[i].screen_name + '">'+ response.data[i].name + '</a></span></div></div><div class="row"><div class="col-lg-12"><span style="font-size: 1.25em;" class="text-primary">' + response.data[i].text + '</span></div></div></div><div class="col-lg-1"></div></div><hr>'
	}
        $('#main').append(html_response);
    }
}
xmlhttp.open("GET", twitter_url + '?username=sambuddhabasu', true);
xmlhttp.send();
