function SignIn(){
    var UserName = $('#userid').val();
    var PassWord=$('#passwordinput').val();
    
    alert("Trying to Login with User : "+UserName+"Password :"+PassWord);
}

/*
 * User Registraiton JS Secton
 */


function SignUp() {
	var email=$('#Email').val();
	var name=$('#userid_reg').val();
	var pass=$('#password_reg').val();
	var retypepass=$('#reenterpassword').val();
	var User = [email,name,pass];
            
           // if(email.contains())
        if(pass!=retypepass){
		alert("Pass doesn't match");
		return;
	}
	
	else {
           PostData(User);          
	}
}



function  PostData(arguments){
                    var http = new XMLHttpRequest();
                    var url = "manager/user_manager/save_user_data.php";
                    var params = "email="+arguments[0]+"&name="+arguments[1]+"&password="+arguments[2];
                    http.open("POST", url, true);
                    
                    
                    //Send the proper header information along with the request
                    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    http.setRequestHeader("Content-length", params.length);
                    http.setRequestHeader("Connection", "close");

                    http.onreadystatechange = function() {//Call a function when the state changes.
                        if(http.readyState == 4 && http.status == 200) {
                                   
                                   
                                   alert("Registration Complete. Check email to activate !");
                                  // ShowStatus("Registration Complete. Check email to activate !");
                                   
//                               /    document.getElementById("regformstatus").innerHTML=http.responseText;
                                   
                                   
                            }
                        }
                        
                       http.send(params);
                    }               