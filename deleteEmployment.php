<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:logInForm.html');
}

?>
<?php
//including the database connection file
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'personal');

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($con, "DELETE FROM employment WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:employmentIndex.php");
?>

