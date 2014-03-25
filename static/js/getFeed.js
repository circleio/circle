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

function fillMain(){
    number = getUrlParameters("number", "", true);
    if(number==false)number = 25;
    url = 'http://ask.fm/feed/profile/'+getUrlParameters("name", "", true)+'.rss';
    console.log(number);
    $.jGFeed(url,
            function (feeds) {
                console.log(JSON.stringify(feeds));
                if (!feeds) {
                    alert('Trouble getting RSS feed :(');
                        return false;
                        }
                        for (var i = 0; i < feeds.entries.length; i++) {
                            var entry = feeds.entries[i];
                            $('#main').append('<div style="padding-top: 10px"><img src="./static/images/askfm.png" align="right" style="height: 30px;"></div><section><div><a href='+"http://"+feeds.title.substring(feeds.title.indexOf("(")+1, feeds.title.indexOf(")"))+'><h4>'+feeds.title.replace(". Answers", "")+'</h4></a></div><div><a><a href="'+entry.link+'">'+entry.title+"  ("+entry.publishedDate+")"+'</a><br><div id="answer">'+entry.content.replace("\n", "<br>")+'</div></a><hr></div></section>');
                        }
                        }, number);

                    }

