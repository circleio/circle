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

      fbConnected = response;

    } else if (response.status === 'not_authorized') {


      FB.login(function(response) {}, {scope: 'read_stream'});

    } else {


      FB.login(function(response) {}, {scope: 'read_stream'});

    }

  });

}
    </script>
