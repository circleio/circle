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


//      FB.login(function(response) {}, {scope: 'read_stream'});

    } else {


  //    FB.login(function(response) {}, {scope: 'read_stream'});

    }

  });

}

set = setInterval(function() {
//	if(typeof(access_token) == "string") {
		console.log("validating current access_token");
		validateAccessToken();
		clearInterval(set);
//	}
});
      var json;
        function validateAccessToken() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                json = JSON.stringify(eval("(" + xmlhttp.responseText + ")"));
                json = JSON.parse(json);
                if(json.valid == "true") {
		  hideLoginButtonFacebook();
		} else {
		 showLoginButtonFB();
		}
            }
        } 

            xmlhttp.open("GET","./api/validate_access_token.php?access_token=" + access_token , true);
            xmlhttp.send();

        }

        window.addEventListener("load", function() {    
                setTimeout(function() {
			if(access_token != undefined)
        	                validateAccessToken();
                 },1);
        });



        function hideLoginButtonFacebook() {
                document.getElementById("loginbuttonfb").innerHTML = "<div class='row'><div class='col-lg-12'>Connected as "+ json.info.name + "</div></div><br><div class='row'><div class='col-lg-12'>" + "<img src='http://graph.facebook.com/" + json.info.username + "/picture' /></div></div><br>" ;
		document.getElementById("removeFacebook").setAttribute("style", "display:block;");
}

 

        function uploadToServer(access_token) {
	        var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				if(access_token == "" || access_token == undefined) window.location.href += ""
                                validateAccessToken();
                        }
                }        

                xmlhttp.open("GET", "./api/upload_new_token.php?access_token=" + access_token, true);
                xmlhttp.send();
        }

    function removeFacebook() {
	document.getElementById("removeButtonFB").innerHTML = "<img src='./static/images/loading.gif' width='40px'> </img> <br> Logging out of facebook";
	FB.logout();
	access_token = ""
	uploadToServer();
    }

    function loginToFacebook() {
	document.getElementById("loginbuttonfb").innerHTML = "<img src='./static/images/loading.gif' width='40px'> </img> <br> Logging into facebook";
	try {
		FB.login(function() {}, {scope: "read_stream"});
	} catch(err) {
		FB.logout();
		FB.login(function() {}, {scope: "read_stream"});
	}
    }

function onPageLoad() {

FB.getLoginStatus(function(response) {

  if (response.status === 'connected') {

    var uid = response.authResponse.userID;
    var accessToken = response.authResponse.accessToken;
    uploadToServer(accessToken);

  } else if (response.status === 'not_authorized') {

    // the user is logged in to Facebook, 

    // but has not authenticated your app

  } else {

    // the user isn't logged in to Facebook.

  }

 });
}
  function showLoginButtonFB() {
	document.getElementById("loginbuttonfb").innerHTML = "<button class=\"btn btn-primary\" type=\"button\" onclick=\"loginToFacebook();\"> Authorize Account </button>";
  }
	
    </script>
