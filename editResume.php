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
        
        <h1 class="h">Upload Resume</h1>
        <div class="subNav">
                   <ul >
                       <li><a href="personalInfo.php">Personal</a>
                       </li>
                        <li><a href="education.php">Education & Trainning</a> </li>
                        <li><a href="employment.php">Employment</a> </li>
                        <li><a href="test.php">Skills</a> </li>
                        <li><a href="soft.php">Soft Skills</a> </li>

                   </ul>
        </div>
        
               
    </body>
</html>
