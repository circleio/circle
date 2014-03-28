<?php
session_start();
if(isset($_SESSION['username'])) {
    header('Location: home.php');
}
include 'includes.php';
include 'header.php';
?>
<title>Circle</title>
<div id="wrap">
    <div id="main" class="container clear-top">
       <div class="row">
           <div class="col-lg-6" id="circle-container">
	   </div>
	   <div class="col-lg-1"></div>
	   <div class="col-lg-5">
         <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="page-header">
                    <h1>SignUp</h1> 
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                            <label style="margin-top: 10px;" for="input_first_name" class="col-lg-3 control-label">First Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="signup_first_name" placeholder="First Name">
                            </div>
	    </div>
	</div><br>
	<div class="row">
	    <div class="col-lg-12">
                            <label style="margin-top: 10px;" for="input_last_name" class="col-lg-3 control-label">Last Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="signup_last_name" placeholder="Last Name">
                            </div>
	    </div>
	</div><br>
	<div class="row">
	    <div class="col-lg-12">
                            <label style="margin-top: 10px;" for="input_email" class="col-lg-3 control-label">Email</label>
                            <div class="col-lg-9">
                                <input type="email" class="form-control" id="signup_email" placeholder="Email">
                            </div>
	    </div>
	</div><br>
	<div class="row">
	    <div class="col-lg-12">
                            <label style="margin-top: 10px;" for="input_username" class="col-lg-3 control-label">Username</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="signup_username" placeholder="Username">
                            </div>
	    </div>
	</div><br>
	<div class="row">
	    <div class="col-lg-12">
                            <label style="margin-top: 10px;" for="input_password" class="col-lg-3 control-label">Password</label>
                            <div class="col-lg-9">
                                <input type="password" class="form-control" id="signup_password" placeholder="Password">
                            </div>
	    </div>
	</div><br>
	<div class="row">
	    <div class="col-lg-12">
                            <label for="input_verify_password" class="col-lg-3 control-label">Verify Password</label>
                            <div class="col-lg-9">
                                <input type="password" class="form-control" id="signup_verify_password" placeholder="Verify Password">
                            </div>
	    </div>
	</div><br>
	<div class="row">
	    <div class="col-lg-12">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary" onClick="signup();">SignUp</button>
                            </div>
            </div>
        </div>
	   </div>
       </div>
    </div>
</div>
<script src="static/js/d3.v3.min.js" charset="utf-8"></script>
<script src="static/js/circle.js"></script>
<script src="static/js/signup.js"></script>
<?php
include 'footer.php';
?>
