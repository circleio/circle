function login() {
    var username = document.getElementById('login_username');
    var password = document.getElementById('login_password');
    if(username.value=='')
        username.style.border = '1px solid red';
    else
        username.style.border = '0px';
    if(password.value=='')
        password.style.border = '1px solid red';
    else
        password.style.border = '0px';
    if(username.value!='' && password.value!='') {
        var login_url = window.location.href;
        var pos = login_url.lastIndexOf('/');
	login_url = login_url.substring(0, pos) + '/api/validate_login.php';
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                console.log(xmlhttp.responseText);
		var response = JSON.parse(xmlhttp.responseText);
                if(response.status == 0) {
                    username.style.border = '1px solid red';
                    password.style.border = '1px solid red';
                }
		else {
                    location.reload();
		}
            }
        }
    var details = "username="+username.value+"&password="+password.value;
    xmlhttp.open("POST", login_url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(details);
    }
}
function logout() {
    var logout_url = window.location.href;
    var pos = logout_url.lastIndexOf('/');
    logout_url = logout_url.substring(0, pos) + '/api/logout.php';
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState==4 && xmlhttp.status==200) {
            location.reload();
        }
    }
    xmlhttp.open("GET", logout_url, true);
    xmlhttp.send();
}

window.onkeydown = function(event) {
	if(event.keyCode == 13) {
		login();	
	}
}
