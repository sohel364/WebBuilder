/*
 * User Registraiton JS Secton
 */
function SignUp() {
	var email=$('#Email').val();
	var name=$('#userid_reg').val();
	var pass=$('#password_reg').val();
	var retypepass=$('#reenterpassword').val();
	var User = [email,name,pass];
	if(pass!=retypepass){
		alert("Pass doesn't match");
		return;
	}
	
	else {
           if(PostData(User)=="1"){
               alert("Succeeded");
               
           }
           else {
               alert("Failed");
           }
           //sleep();
	}
}

function  PostData(arguments){
                    var http = new XMLHttpRequest();
                    var url = "manager/user_manager/save_user_data.php";
                    var params = "email="+arguments[0]+"&name="+arguments[1]+"&password="+arguments[2];
                    http.open("POST", url, true);
                    
                    var ret=0;
                    //Send the proper header information along with the request
                    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    http.setRequestHeader("Content-length", params.length);
                    http.setRequestHeader("Connection", "close");

                    http.onreadystatechange = function() {//Call a function when the state changes.
                        if(http.readyState == 4 && http.status == 200) {
                            if(http.responseText=='1'){
                                ret=http.responseText;
                                   document.getElementById("regformstatus").innerHTML="Please Activate your account from your email";
                            }
                        }
                    }
                    http.send(params);
                    
                 
            }