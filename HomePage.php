<?php
session_start();
if(!isset($_SESSION['Email'])){
    header('location:logInForm.html');
}


?>


<!DOCTYPE html>
<html lan="en">
    <head>
    </head>
    <body>
        <p>My name is ashiful islam prince
       
        <?php
            
            
            
            echo $_SESSION['Email'];
            echo "<br>";
            
            ?></p>
         <a href="LogOut.php">LogOut</a>
    </body>
</html>