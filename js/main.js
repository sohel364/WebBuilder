/*
 * User Registraiton JS Secton
 */
function SignUp() {
	var email=$('Email');
	var name=$('userid');
	var pass=$('password');
	var retypepass=$('reenterpassword');
	
	if(pass!=retypepass){
		alert("Pass doesn't match");
		return
	}
	
	else {
		alert(email+name+pass+reenterpassword);
	}
}