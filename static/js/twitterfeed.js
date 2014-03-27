var twitter_url = window.location.href;
var pos = twitter_url.lastIndexOf('/');
twitter_url = twitter_url.substring(0, pos) + '/api/twitter_get_timeline.php';
var xmlhttp;
xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        var response = JSON.parse(xmlhttp.responseText);
        var html_response = '';
	for(var i=0;i<response.data.length;i++) {
            html_response += '<div class="row"><div class="col-lg-1"><a href="https://twitter.com/"><img src="static/images/twitter.png" style="margin-top: 20px; margin-left: 35px; width: 30px;"></a></div><div class="col-lg-10"><div class="row"><div class="col-lg-12"><h4><a style="color: #fff;" href="https://twitter.com/' + response.data[i].screen_name + '">'+ response.data[i].name + '</a></h4></div></div><div class="row"><div class="col-lg-12"><h5 class="text-primary">' + response.data[i].text + '</h5></div></div></div><div class="col-lg-1">';
            if(!response.data[i].retweeted) {
                html_response += '<div class="row"><div class="col-lg-12"><img id="' + response.data[i].id + '"onClick="retweet_id(\'' + response.data[i].id + '\');" src="static/images/twitter_retweet.jpg" style="margin-top: 20px; width: 30px;"></div></div>';
	    }
	    else {
                html_response += '<div class="row"><div class="col-lg-12"><img id="' + response.data[i].id + '"onClick="destroy_tweet(\'' + response.data[i].id + '\');" src="static/images/twitter_cancel_retweet.jpg" style="margin-top: 20px; width: 30px;"></div></div>';
	    }
	    html_response += '</div></div><hr>';
	}
        $('#main').append(html_response);
    }
}
xmlhttp.open("GET", twitter_url + '?username=sambuddhabasu', true);
xmlhttp.send();
function retweet_id(tweet_id) {
    var xmlhttp=new XMLHttpRequest();
    var image = document.getElementById(tweet_id);
    image.src="static/images/loading.gif";
    xmlhttp.onreadystatechange=function() {
        if(xmlhttp.readyState==4 && xmlhttp.status==200) {
            image.src="static/images/twitter_cancel_retweet.jpg";
	    image.onclick = null;
	    image.addEventListener('click', function() { destroy_tweet(tweet_id); });
	}
    }
    var url = 'api/twitter_retweet.php?id=' + tweet_id;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}
function destroy_tweet(tweet_id) {
    var xmlhttp=new XMLHttpRequest();
    var image = document.getElementById(tweet_id);
    image.src="static/images/loading.gif";
    xmlhttp.onreadystatechange=function() {
        if(xmlhttp.readyState==4 && xmlhttp.status==200) {
	    image.src="static/images/twitter_retweet.jpg";
	    image.onclick = null;
	    image.addEventListener('click', function() { retweet_id(tweet_id); });
	}
    }
    var url = 'api/twitter_destroy_tweet.php?id=' + tweet_id;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}
