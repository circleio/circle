<title>Circle</title>
<?php
session_start();
if(!isset($_SESSION['username'])) {
        header('Location: index.php');
}
include 'includes.php';
include 'header.php';
?>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="static/js/getAskFeed.js"></script>
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
    for(i=0;i<people.length;i++)
        fillMain(objects[i]);
}
function fillPeople(){
for(i=0;i<people.length*25;i++)
        fillNth(objects[i%people.length], i/people.length, objects[i%people.length].where);
}
function checkFeedStatus(){
    for(i=0;i<people.length;i++)
        if(objects[i].feeds==undefined){
            setTimeout(function(){
                checkFeedStatus();
            }, 100);
            return;
        }
    fillPeople();
}
</script>
<div id="wrap">
    <div id="main" class="container clear-top">
    </div>
</div>
<head>
</head>
<div id="results"></div>
<?php
include 'footer.php';
?>
