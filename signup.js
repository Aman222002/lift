function validateForm(){

    var fname = document.getElementById("fname").value;
    var mobileNumber = document.getElementById("mobileNumber").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var address = document.getElementById("address").value;
    if(fname == "")
    {
        document.getElementById('fname1').innerHTML = "Please enter the  name.";
        document.getElementById('fname1').style.color="red";
        return false;
    }
    if((fname.length <= 2) || (fname.length > 11)){
        document.getElementById('fname1').innerHTML = "Please enter name length between 2 and 11.";
        document.getElementById('fname1').style.color="red";
        return false;
    }
    if(!isNaN(fname)){
        document.getElementById('fname1').innerHTML ="Please enter only letters.";
        document.getElementById('fname1').style.color="red";
        return false;
    }
    else{
        document.getElementById("fname1").innerHTML = "";
    }
  
    if(mobileNumber == "")
    {
        document.getElementById('mobileNumber1').innerHTML = "Please enter the contact number.";
        document.getElementById('mobileNumber1').style.color="red";
        return false;
    }
    if(isNaN(mobileNumber))
    {
        document.getElementById('mobileNumber1').innerHTML = "Please enter only digits not characters.";
        document.getElementById('mobileNumber1').style.color="red";
        return false;
    }
    if(mobileNumber.length != 10){
        document.getElementById('mobileNumber1').innerHTML = "Please enter 10 digits.";
        document.getElementById('mobileNumber1').style.color="red";
        return false;
    }
    else{
        document.getElementById("mobileNumber1").innerHTML = "";
    }
  
    if(email == "")
    {
        document.getElementById('email1').innerHTML = "Please enter the email address.";
        document.getElementById('email1').style.color="red";
  
        return false;
    }
    if(email.indexOf('@') <= 0){
        document.getElementById('email1').innerHTML = "Please enter the valid position of @.";
        document.getElementById('email1').style.color="red";
        return false;
    }
    if((email.charAt(email.length-4)!='.')  && (email.charAt(email.length-3)!='.')) {
        document.getElementById('email1').innerHTML = "Please enter the valid email id.";
        document.getElementById('email1').style.color="red";
        return false;
    }
    else{
        document.getElementById("email1").innerHTML = "";
    }
  
  
    if(password == "")
    {
        document.getElementById('password1').innerHTML = "Please enter the password.";
        document.getElementById('password1').style.color="red";
        return false;
    }
    if (!password.match(passwordPattern)) {
      document.getElementById("password1").innerHTML="Password must contain at least 6 characters, including one uppercase letter, one lowercase letter, and one digit";
      document.getElementById('password1').style.color="red";
      return false;
    }
    else{
        document.getElementById("password1").innerHTML = "";
    }
  
    if(confirmPassword == "")
    {
        document.getElementById('confirmPassword1').innerHTML = "Please enter the password.";
        document.getElementById('confirmPassword1').style.color="red";
        return false;
    }
    if(confirmPassword != password)
    {
        document.getElementById("confirmPassword1").innerHTML = "Please enter the correct password.";
        document.getElementById('confirmPassword1').style.color="red";
  
    }
     
    else{
        document.getElementById("confirmPassword1").innerHTML = "";
    }
  
    if(address == "")
    {
        document.getElementById('address1').innerHTML = "Please enter the address .";
        document.getElementById('address1').style.color="red";
  
        return false;
    }
    else{
        document.getElementById("address1").innerHTML = "";
    }
    return true;
  
  }