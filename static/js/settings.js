var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
    if(xmlhttp.readyState==4 && xmlhttp.status==200) {
        var response = JSON.parse(xmlhttp.responseText);
        if(response.status==0) {
            var html_response = '<div class="row"></div class="col-lg-12"><a href="api/twitter_get_token.php"><button class="btn btn-primary" type="button">Authorize Account</button></a></div></div>';
	}
        else {
            var html_response = '<div class="row"></div class="col-lg-12"><button class="btn btn-primary" onClick="disallow();" type="button">Unauthorize Account</button></div></div>';
	}
        $('#twitter_account').append(html_response);
    }
}
xmlhttp.open("GET", "api/twitter_check_token.php", true);
xmlhttp.send();
function disallow() {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if(xmlhttp.readyState==4 && xmlhttp.status==200) {
            location.reload();
	}
    }
    xmlhttp.open("GET", "api/twitter_remove_token.php", true);
    xmlhttp.send();
}
