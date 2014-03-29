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
    $('#'+where).append('<div class="row"><div class="col-lg-1"><div class="row"><div class="col-lg-12"><a><img src="static/images/askfm.png" style="width: 30px; margin-left: 35px; margin-top: 30px;"></a></div></div></div><div class="col-lg-10"><div class="row"><div class="col-lg-12"><a href="http://' + object.feeds.title.substring(object.feeds.title.indexOf("(")+1, object.feeds.title.indexOf(")")) + '"><h4>' + object.feeds.title.replace(". Answers", "") + '</h4></div></div><div class="row"><div class="col-lg-12"><h5><a href="' + entry.link + '">' + entry.title + '   (' + entry.publishedDate + ')</a></h5></div></div><div class="row"><div class="col-lg-12">' + entry.content.replace("\n", "<br>") + '</div></div><div style="padding-top: 10px"><div class="fb-send" data-href="'+entry.link+'" data-colorscheme="light" ></div><div class="fb-share-button" data-href="'+entry.link+'" data-type="button_count" style="padding-left: 10px"></div></div></div></div></div><hr>');
    FB.XFBML.parse();
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

function fillPeople(people, objects){
    for(i=0;i<people.length;i++)console.log(objects[i]);
    for(i=0;i<people.length*25;i++){
        fillNth(objects[i%people.length], Math.floor(i/people.length), objects[i%people.length].where);
    }
}

function fillPeople2(people, objects){
    var ti = 0;
    for(i=0;i<people.length;i++)console.log(objects[i]);
    for(i=0;i<people.length*25;i++){
        fillNth(objects[i%people.length], Math.floor(i/people.length), objects[i%people.length].where);
        if(ti < window.twitterFeedLength){
            putIthfeed(window.twitterResponseData[ti], "#main");
            ti = ti + 1;
        }
    }
}

function checkFeedStatus(people){
    for(i=0;i<people.length;i++)
        if(objects[i].feeds==undefined){
            setTimeout(function(){
                checkFeedStatus(people);
            }, 100);
            return;
        }
    fillPeople2(people, objects);
}

