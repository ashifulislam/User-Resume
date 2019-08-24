function checkNameLength(){
    var name=document.forms['regForm']['fullname'].value;
    if(name.length<5){
        alert("Name can not be in less than 5 character");
    }
}
function checkMatchPassword(){
    var pass1=document.forms['regForm']['password'].value;
    var retypePass1=document.forms['regForm']['reType'].value;
    if(pass1!=retypePass1){
        alert("Password did not match");
    }
}
function checkAge(){
    var age=document.forms['regForm']['age'].value;
    if(age<18){
        alert("Age is under18");
    }
}
