
var userEmail = ["alya", "mirul", "hanani", "mira", "nurul", "kina", "maria"];
var userPass = ["alya", "mirul", "hanani", "mira", "nurul", "kina", "maria"];
var userPhone = ["alya", "mirul", "hanani", "mira", "nurul", "kina", "maria"];
var userName = ["alya", "mirul", "hanani", "mira", "nurul", "kina", "maria"];
var userAddress = ["alya", "mirul", "hanani", "mira", "nurul", "kina", "maria"];

var admin = ["admin", "superadmin"];
var adminPass = ["admin", "superadmin"];

function Login(){
    var email = $("#email").val(); //get email value
    var password = $("#password").val();  //get password value

    //for admins only
    for(i=0; i<admin.length; i++){
        if(email == admin[i])
            if(password == adminPass[i]){
                localStorage.setItem("status","logged in")
                location.assign("admin.html");//go to homepage admin
                return; //stop the function
            }
    }

    //for users only
    for(i=0; i<userEmail.length; i++){
        if(email == userEmail[i])
            if(password == userPass[i]){
                localStorage.setItem("status","logged in")
                location.assign("homepage.html");//go to homepage user
                return;//stop the function
            }
    }

    if(email=="" || password == ""){
        window.alert("Please fill in both fields.");
    }

    //window.alert("Email does not exist");
    return;
}

function SignUp(){
    var name = $("#userName").val();  //get name value
    var email = $("#userEmail").val(); //get email value
    var password = $("#userPassword").val();  //get password value
    var phone = $("#userPhone").val();  //get phone value
    


    //1. check if the email already exists
    for(i=0; i<userEmail.length; i++){
        if(email == userEmail[i]){
            alert("Email exists in the system");
            return;//stop the function
        }
    }

    //add new elements to the user array
    userName.push(name);
    userEmail.push(email);
    userPass.push(password);
    userPhone.push(phone);
    
    alert("Sign up successful");

    return;

}

function clearSignUp(){
    //$("#userName").val() = "sup";
    //document.getElementById("#userName").innerHTML = "Johnny Bravo";
    $("input:text").val("");
    $("input:password").val("");
}