/*
 * User Registraiton JS Secton
 */
function SignUp() {
	var email=$('#Email').val();
	var name=$('#userid_reg').val();
	var pass=$('#password_reg').val();
	var retypepass=$('#reenterpassword').val();
	
	if(pass!=retypepass){
		alert("Pass doesn't match");
		return;
	}
	
	else {
            CallAjax();
	}
}


function CallAjax(){
    alert("Registration Complete");
}