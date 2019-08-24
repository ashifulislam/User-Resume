<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:logInForm.html');
}

?>
<?php

include('include/header.php');


?>

<?php

include('include/slideBar.php');


?>
<!DOCTYPE>
<html lan="en">
    <head>
        <link rel="stylesheet" href="editResume.css">
    </head>
    <body>
        
        <h1 class="h">Edit Resume</h1>
        <div class="subNav">
                   <ul >
                       <li><a href="index1.php">Personal</a>
                       </li>
                        <li><a href="educationIndex.php">Education & Trainning</a> </li>
                        <li><a href="employmentIndex.php">Employment</a> </li>
                        <li><a href="#">Skills</a> </li>
                        <li><a href="#">Additional Info</a> </li>

                   </ul>
        </div>
        
               
    </body>
</html>
