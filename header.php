<script src="static/js/login.js"></script>
<div class="navbar navbar-default navbar-fixed-top">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="<?php echo $BASE_URL; ?>">Circle</a>
</div>
<div class="navbar-collapse collapse navbar-responsive-collapse">
<ul class="nav navbar-nav">
<li><a>Contact Us</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<?php
if($_SESSION['username']) {
    echo '<li><a>Settings</a></li>' .
        '<li><a>' . $_SESSION['username'] . '</a></li>' .
        '<li><button type="submit" class="btn btn-link" onClick="logout();">LogOut</button></li>';
}
else {
    echo '<li><input type="text" class="form-control" id="login_username" placeholder="Username"></li>' .
	'<li> &nbsp;&nbsp;&nbsp; </li>'.
        '<li><input type="password" class="form-control" id="login_password" placeholder="Password"></li>' .
	'<li> &nbsp;&nbsp;&nbsp; </li>'.
        '<li><button type="submit" class="btn btn-primary" onClick="login();">LogIn</button></li>';
}
?>
<li>&nbsp;&nbsp;&nbsp;</li>
</ul>
</div>
</div>
