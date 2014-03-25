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

function getAllUrlParameters(object){
    object.url = 'http://ask.fm/feed/profile/'+getUrlParameters("name", "", true)+'.rss';
    object.number = getUrlParameters("number", "", true);
    if(object.number==false)object.number = 25;
}


function fillNth(object, n, where){
    if(n >= object.feeds.entries.length)return false;
    entry = object.feeds.entries[n];
    $('#'+where).append('<div style="padding-top: 10px"><img src="./static/images/askfm.png" align="right" style="height: 30px;"></div><section><div><a href='+"http://"+object.feeds.title.substring(object.feeds.title.indexOf("(")+1, object.feeds.title.indexOf(")"))+'><h4>'+object.feeds.title.replace(". Answers", "")+'</h4><h5><a href="'+entry.link+'">'+entry.title+"  ("+entry.publishedDate+")"+'</h5></a><div id="answer">'+entry.content.replace("\n", "<br>")+'</div></a><hr></div></section>');

}

function fillMain(object){
    console.log(object);
    console.log(object.feeds);
    if(object.feeds == undefined){
        setTimeout(function(){
            fillMain(object);
        }, 100);
        return;
    }
    for (var i = 0; i < object.feeds.entries.length; i++)
        fillNth(object, i, 'main');
}

function initializeFeed(object){
    console.log(object);
    $.jGFeed(object.url,
            function (feeds) {
                if (!feeds) {
                    alert('Trouble getting RSS feed :(');
                        return false;
                        }
                        object.feeds = feeds;
                        }, object.number);
                    }
