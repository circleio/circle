function signup() {
    var s_first_name = document.getElementById('signup_first_name');
    var s_last_name = document.getElementById('signup_last_name');
    var s_email = document.getElementById('signup_email');
    var s_username = document.getElementById('signup_username');
    var s_password = document.getElementById('signup_password');
    var s_verify_password = document.getElementById('signup_verify_password');
    if(s_first_name.value=='')
        s_first_name.style.border = '1px solid red';
    else
        s_first_name.style.border = '0px';
    if(s_last_name.value=='')
        s_last_name.style.border = '1px solid red';
    else
        s_last_name.style.border = '0px';
    if(s_email.value=='')
        s_email.style.border = '1px solid red';
    else
        s_email.style.border = '0px';
    if(s_username.value=='')
        s_username.style.border = '1px solid red';
    else
        s_username.style.border = '0px';
    if(s_password.value=='')
        s_password.style.border = '1px solid red';
    else
        s_password.style.border = '0px';
    if(s_verify_password.value=='')
        s_verify_password.style.border = '1px solid red';
    else
        s_verify_password.style.border = '0px';
    if(s_password.value!=s_verify_password.value) {
        s_password.style.border = '1px solid red';
	s_verify_password.style.border = '1px solid red';
        return;
    }
    else if(s_password.value!='' && s_verify_password.value!=''){
        s_password.style.border = '0px';
        s_verify_password.style.border = '0px';
    }
    if(s_first_name.value!='' && s_last_name.value!='' && s_email.value!='' && s_username.value!='' && s_password.value!='' && s_verify_password.value!='') {
        var signup_url = window.location.href;
        var pos = signup_url.lastIndexOf('/');
	signup_url = signup_url.substring(0, pos) + '/api/validate_signup.php';
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                var response = JSON.parse(xmlhttp.responseText);
                if(response.status==0) {
                    if(response.username==0) {
                        s_username.style.border = "1px solid red";
		    }
		    else {
                        s_username.style.border = "0px";
		    }
		    if(response.email==0) {
                        s_email.style.border = "1px solid red";
		    }
		    else {
                        s_email.style.border = "0px";;
		    }
		}
		else {
                    console.log('Account created');
		}
            }
        }
        var details = "first_name=" + s_first_name.value + "&last_name=" + s_last_name.value + "&email=" + s_email.value + "&username=" + s_username.value + "&password=" + s_password.value;
        xmlhttp.open("POST", signup_url, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(details);
    }
}
