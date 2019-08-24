
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
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'personal');
if(isset($_POST['submit'])){
    $name = $_POST['skill_name'];
    $level = $_POST['skill_level'];
    $id = $_POST['user_id'];
    $show = $_POST['show_div'];
    $sql = "insert into `user_skill` (`skill_name`, `skill_level`,`user_id`,`show_div`) values ('$name','$level','$id','$show')";
    $insert = mysqli_query($con,$sql);
    if($insert){
        echo "Successfull!";
    }else{
        echo "error!";
    }
}

?>

<html>
    
    <head >
        <link rel="stylesheet" href="test.css">
    </head>
    <body>
        <div class="personal_info">
        <form action="test.php" method="post">
            <input type = "text" placeholder="Enter your skill name" name="skill_name" />
            <br><br>
            <h2 style="color:white;">Enter Percentage:</h2><br>
            <select name="skill_level" id="skill_level">
                <option value = "img/PHOTOSHOP-rate.png"> 90%</option>
                <option value = "img/illus-rate.png"> 80%</option>
                <option value = "img/indesign.png"> 50%</option>
                <option value = "img/indesign.png"> 40%</option>
            </select>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" >
            <h2 style="color:white;">Enter side:</h2><br>
            <select name="show_div" id="show_div">
                <option value = "left"> Left Side</option>
                <option value = "right"> Right Side</option>
                
            </select>
            <input type="submit" name="submit" value="Save"/>
        </form>
        </div>
    </body>
</html>