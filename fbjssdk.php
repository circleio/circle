<div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '420288881450005',
          status     : true,
          xfbml      : true
        });
      };
      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/all.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));

window.onload = function() {

FB.Event.subscribe('auth.authResponseChange', function(response) {

    // Here we specify what we do with the response anytime this event occurs. 

    if (response.status === 'connected') {
	access_token = response.authResponse.accessToken;
        fbConnected = response;
	uploadToServer(access_token);
	hideLoginButtonFacebook();
    } else if (response.status === 'not_authorized') {


      FB.login(function(response) {}, {scope: 'read_stream'});

    } else {


      FB.login(function(response) {}, {scope: 'read_stream'});

    }

  });

}

set = setInterval(function() {
	if(typeof(access_token) == "string") {
		hideLoginButtonFacebook();
		clearInterval(set);
	}
});
      var json;
        function validateAccessToken() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                json = JSON.stringify(eval("(" + xmlhttp.responseText + ")"));
                json = JSON.parse(json);
                if(json.valid) hideLoginButtonFacebook();
            }
        } 

            xmlhttp.open("GET","./api/validate_access_token.php?access_token=" + access_token , true);
            xmlhttp.send();

        }

        window.addEventListener("load", function() {    
                setTimeout(function() {
                        validateAccessToken();
                 },1);
        });



        function hideLoginButtonFacebook() {
                document.getElementById("loginbuttonfb").innerHTML = "Connected as "+ json.info.name + "<br>" + "<img src='http://graph.facebook.com/" + json.info.username + "/picture' />" ;
	}

 

        function uploadToServer(access_token) {
	        var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                validateAccessToken();
                        }
                }        

                xmlhttp.open("GET", "./api/upload_new_token.php?access_token=" + access_token, true);
                xmlhttp.send();
        }

    </script>
