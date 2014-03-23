<title>Circle</title>
<?php
include 'includes.php';
include 'header.php';
?>
<div id="wrap">
    <div id="main" class="container clear-top">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="page-header">
                    <h1>LogIn</h1> 
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <form class="form-horizontal">
                    <fieldset>
                        <div class="form-group">
                            <label for="input_username" class="col-lg-3 control-label">Username</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input_password" class="col-lg-3 control-label">Password</label>
                            <div class="col-lg-9">
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary">LogIn</button>
                            </div>
                       </div>
                   </fieldset>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
