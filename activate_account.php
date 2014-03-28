<?php
session_start();
include 'includes.php';
include 'header.php';
include 'dbconnect.php';

mysqli_select_db($connect, $dbname);

$result = mysqli_query($connect, "SELECT * from users where md5(email) = '$code';");
if(mysqli_num_rows($result)==0) {
    echo "Invalid code";
}
else {
    $result = mysqli_fetch_assoc($result);
    if($result['activated']) {
        echo "Your account has already been activated";
    }
    else {
        $id = $result['id'];
        $query = "UPDATE users SET activated=1 WHERE id='" . $id . "';";
        mysqli_query($connect, $query);
    }
}
?>

<title>Circle</title>
<body>
    <div id="wrap">
        <div id="main" class="container clear-top">
        </div>
    </div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<?php
include 'footer.php';
?>
</body>
