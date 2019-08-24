hfh<?php
session_start();
    if(isset($_POST['fullname'])){
    $con= mysqli_connect('localhost','root',"");
    mysqli_select_db($con,'personal');
    $fullname= $_POST['fullname'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $age= $_POST['age'];
    $religion=$_POST['religion'];
    $gender= $_POST['gender'];
    $query= "select * from usertable where email='$email'";
    $result= mysqli_query($con,$query);
    $num= mysqli_num_rows($result);
    if($num==1){
        echo "This email already taken please give new email";
    }
    else{
        $query2="insert into usertable(fullname,email,password,age,religion,gender)
        values('$fullname','$email','$password','$age','$religion','$gender')";
        mysqli_query($con,$query2);
        echo "Registration is successfull";
        header('location:logInForm.html');

    }
    }else{
        echo "Invalid attempt";
    }









?>