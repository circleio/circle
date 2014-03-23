function login() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var input_username = document.getElementById('input_username');
    var input_password = document.getElementById('input_password');
    if(username == '') {
        input_username.className = "form-group has-error";
    }
    else {
        input_username.className = "form-group";
    }
    if(password == '') {
	input_password.className = "form-group has-error";
    }
    else {
        input_password.className = "form-group";
    }
}
