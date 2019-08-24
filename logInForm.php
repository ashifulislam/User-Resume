<?php
session_start();
if(isset($_POST['Email'])){
$con= mysqli_connect('localhost','root',"");
mysqli_select_db($con,'personal');
$email= $_POST['Email'];
$password= $_POST['Pass'];
$query="select * from usertable where email='$email' && password='$password'";
$result= mysqli_query($con,$query);
$num= mysqli_num_rows($result);
if($num==1){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['email']=$email;
    $_SESSION['user_id'] = $row['user_id'];
    header('location:profilePage1.html');
}
else{
    header('location:logInForm.html');
    $_SESSION['message']="invalid user name or password";
}
}
else{
    echo "Invalid attempt";
}






?>