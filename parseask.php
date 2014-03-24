<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">

function getUrlParameters(parameter, staticURL, decode){
   var currLocation = (staticURL.length)? staticURL : window.location.search,
        parArr = currLocation.split("?")[1].split("&"),
       returnBool = true;
    for(var i = 0; i < parArr.length; i++){
        parr = parArr[i].split("=");
        if(parr[0] == parameter){
            return (decode) ? decodeURIComponent(parr[1]) : parr[1];
            returnBool = true;
        }else{
            returnBool = false;            
        }
    }

    if(!returnBool) return false;  
}

(function ($) {
    $.extend({
        jGFeed: function (url, fnk, num, key) {
            if (url == null) {
                return false;
            }
            var gurl = "http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&callback=?&q=" + url;
            if (num != null) {
                gurl += "&num=" + num;
            }
            if (key != null) {
                gurl += "&key=" + key;
            }
            $.getJSON(gurl, function (data) {
                if (typeof fnk == "function") {
                    fnk.call(this, data.responseData.feed);
                } else {
                    return false;
                }
            });
        }
    });
})(jQuery);

$(window).ready(function () {
    $.jGFeed('http://ask.fm/feed/profile/'+getUrlParameters("name", "", true)+'.rss',
        function (feeds) {
            console.log(JSON.stringify(feeds));
            if (!feeds) {
                alert('Trouble getting RSS feed :(');
                return false;
            }
            for (var i = 0; i < feeds.entries.length; i++) {
                var entry = feeds.entries[i];
                $('#results').append('<a href="'+entry.link+'"><strong>'+entry.title+'</strong><br><em>'+entry.publishedDate+'</em></a><br>'+entry.contentSnippet+'</a><hr>');
            }
        }, 10);

});
</script>
<head>
</head>
<div id=content>
</div>
<div id="results"></div>
