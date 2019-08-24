<?php 
session_start();
session_destroy();
header('location: logInForm.html');


?>