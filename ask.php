<title>Circle</title>
<?php
session_start();
if(!isset($_SESSION['username'])) {
        //header('Location: index.php');
}
include 'includes.php';
include 'header.php';
?>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="static/js/getAskFeed.js"></script>
<script src="static/js/includeFB.js"></script>
<script>
var people = [
{"name":"amoghbl1"},
{"name":"PranayVk"},
{"name":"manishadsouza"}
];
var objects = new Array();
var obj = new Object();
//window.onload = getAllUrlParameters(obj);
//window.onload = initializeFeed(obj);
//window.onload = fillMain(obj);
window.onload = function(){
    for(i=0;i<people.length;i++){
        objects[i] = new Object();
        objects[i].url = makeAskRSSFeedUrl(people[i].name);
        objects[i].number = 25;
        objects[i].where = 'main';
        initializeFeed(objects[i]);
    }
    //check feed status will also fill into the location as specified by the objects.
    checkFeedStatus(people, objects);
}
</script>
<div id="wrap">
    <div id="main" class="container clear-top">
    <!--<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-type="button_count"></div>-->
    </div>  
</div>
<head>
</head>
<body>
<div id="fb-root"></div>
</body>
<?php
include 'footer.php';
?>
