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

function makeAskRSSFeedUrl(username){
    return 'http://ask.fm/feed/profile/'+username+'.rss';
}

function getAllUrlParameters(object){
    object.url = makeAskRSSFeedUrl(getUrlParameters("name", "", true));
    object.number = getUrlParameters("number", "", true);
    if(object.number==false)object.number = 25;
}


function fillNth(object, n, where){
    if(object.feeds == undefined)
        return false;
    if(n >= object.feeds.entries.length)return true;
    entry = object.feeds.entries[n];
    //console.log(entry);
    $('#'+where).append('<div style="padding-top: 10px"><div><a href="http://ask.fm/"><img src="./static/images/askfm.png" align="left" style="width: 30px;"></img></a></div><div style="padding-left: 35px"><a href='+"http://"+object.feeds.title.substring(object.feeds.title.indexOf("(")+1, object.feeds.title.indexOf(")"))+'><h4>'+object.feeds.title.replace(". Answers", "")+'</h4><h5><a href="'+entry.link+'">'+entry.title+"  ("+entry.publishedDate+")"+'</h5></a><div id="answer">'+entry.content.replace("\n", "<br>")+'</div></a></div><hr></div>');
    return true;
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
