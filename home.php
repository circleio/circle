<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: index.php');
}
include 'includes.php';
include 'header.php';
?>
<title>Circle</title>
<div id="wrap">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=420288881450005";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div id="main" class="container clear-top">
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="static/js/twitterfeed.js"></script>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="static/js/getAskFeed.js"></script>
<script src="static/js/includeFB.js"></script>
<script src="static/js/facebook_feed.js"></script>
<script>
var people = [
{"name":"amoghbl1"},
{"name":"PranayVk"},
{"name":"manishadsouza"}
];
var objects = new Array();
var obj = new Object();
window.onload = function(){
    for(i=0;i<people.length;i++){
        objects[i] = new Object();
        objects[i].url = makeAskRSSFeedUrl(people[i].name);
        objects[i].number = 25;
        objects[i].where = 'main';
        initializeFeed(objects[i]);
    }
    checkFeedStatus(people, objects);
}
</script>

<?php
include 'footer.php';
?>
