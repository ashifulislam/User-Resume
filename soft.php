<?php

include('include/header.php');


?>

<?php

include('include/slideBar.php');


?>

<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:logInForm.html');
}
?>
<?php 
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'personal');
if(isset($_POST['submit'])){
    $name = $_POST['skill_name'];
    $level = $_POST['skill_level'];
    $id = $_POST['user_id'];

    $sql = "insert into `user_skills1` (`soft_skill`, `soft_level`,`user_id`) values ('$name','$level','$id')";
    $insert = mysqli_query($con,$sql);
    if($insert){
        echo "Successfull!";
    }else{
        echo "error!";
    }
}

?>

<html>
    
    <head  >
        <link rel="stylesheet" href="soft.css">
    </head>
    <body>
        <div class="personal_info">
        <form action="soft.php" method="post">
            <input type = "text" placeholder="enter your soft skill name" name="skill_name" /><br>
           <br><br>
            <h2 style="color:white;">Enter Percentage:</h2><br>
            <select name="skill_level" id="soft_level">
                <option value = "90"> 90%</option>
                <option value = "80"> 80%</option>
                <option value = "50"> 50%</option>
            </select>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" >
            <input type="submit" name="submit" value="Save"/>
        </form>
        </div>
    </body>
</html>