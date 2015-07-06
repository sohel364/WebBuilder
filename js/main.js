function SignIn(){
    var UserName =$('#userid').val();
    var PassWord=$('#passwordinput').val();
    var User = [UserName,PassWord];
    var isSucceeded = false;
    
    if(UserName!="" && PassWord!=""){
        var responseText=PostDataSignIn(User);
        if(responseText=="1"){
            isSucceeded = true;
        }
        else {
            isSucceeded = false;
        }
    }
    
    if(isSucceeded){
        $("#regformstatus").html('Successfully Logged In');
        $('#myModal').modal('hide')
        var redirectURL ="http://localhost/WebBuilder/index.php?username="+UserName+"&password="+PassWord+"&isSuccess="+isSucceeded;
        window.location.href=redirectURL;
    }
    else{
        $("#regformstatus").html('Error!Please try again');
        $('#myModal').modal('hide')
    }
}


function PostDataSignIn(args){
                    var http = new XMLHttpRequest();
                    var url = "webbuilderservices/UserService.php";
                    var params ="username="+args[0]+"&password="+args[1];
                    http.open("POST", url, true);
                    var res = "0";
                    //Send the proper header information along with the request
                    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    http.setRequestHeader("Content-length", params.length);
                    http.setRequestHeader("Connection", "close");

                    http.onreadystatechange = function() {//Call a function when the state changes.
                        if(http.readyState == 4 && http.status == 200) {
                                    var returned_string = vhr.responseText;
                                    //console.log(returned_string.charAt(0));
                                    return returned_string.charAt(0);
                            }
                        }                        
                       http.send(params);
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
           PostDataRegistration(User);          
	}
}



function  PostDataRegistration(arguments){
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