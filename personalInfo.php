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
<html>
<head>
	<title>Personal Information</title>
</head>
   <link rel="stylesheet" href="personalInfo.css">
<body>
	
	<br/><br/>
  <div class="personal_info">
      <div class="p_form">
    <form action="personalInfo.php" method="post" name="form1">
        <h1 style="color:#fff;"> Personal Information</h1>
		<input type="text" name="FirstName" placeholder="Enter your first name"><br>
        <input type="text" name="LastName" placeholder="Enter your last name"><br>
        <input type="text" name="FatherName" placeholder="Enter your father's name"><br>
        <input type="text" name="MotherName" placeholder="Enter your mother's name"><br>
        <input type="date" name="dob"><br>
          <select name="religion" id="religion">
                    <option name="religion" value="religion">Religion</option>
                    <option name="religion" value="muslim">Muslim</option>
                    <option name="religion" value="Hindu">Hindu</option>


                </select><br>
        <input type="text" placeholder="Enter your address here" name="address"><br>

        <input type="text" placeholder="Enter national id" name="nid"><br>
        <input type="text" placeholder="Enter your passport number" name="p_num"><br>
        <input type="text" placeholder="Enter your mobile number1" name="m_num"><br>
        <input type="email" placeholder="Enter alternative email" name="a_em"><br>
    

        <br>
        <input type="submit" value="save">
       

        
	</form>
      </div>
    </div>
   

        
   
	
</body>
    
    
</html>




<html>
<head>
	<title>Add Data</title>
</head>

<body>
    <?php
    
    
    
    
    ?>
<?php
//including the database connection file
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'personal');

if(isset($_POST['FirstName'])) {	
	$firstName =$_POST['FirstName'];
    $lastName=$_POST['LastName'];
    $fatherName=$_POST['FatherName'];
    $motherName=$_POST['MotherName'];
    $dob=$_POST['dob'];
    $religion=$_POST['religion'];
    $n_id=$_POST['nid'];
    $p_num=$_POST['p_num'];
    $m_num=$_POST['m_num'];
    $a_email=$_POST['a_em'];
    $user_id =  $_SESSION['user_id'];
    $address=$_POST['address'];
	
		
	// checking empty fields
	if(empty($firstName) || empty($lastName) || empty($fatherName) || empty($motherName)
      || empty($dob) || empty($religion) || empty($address) || empty($n_id)|| empty($p_num)|| empty($m_num)
      || empty($a_email)) {
				
		if(empty($firstName)) {
			echo "<font color='red'>FirstName field is empty.</font><br/>";
		}
		
		if(empty($lastName)) {
			echo "<font color='red'>lastName field is empty.</font><br/>";
		}
		
		if(empty($fatherName)) {
			echo "<font color='red'>fatherName field is empty.</font><br/>";
		}
           if(empty($motherName)) {
			echo "<font color='red'>motherName field is empty.</font><br/>";
		}
		
           if(empty($dob)) {
			echo "<font color='red'>dob field is empty.</font><br/>";
		}
		
           if(empty($religion)) {
			echo "<font color='red'>religion field is empty.</font><br/>";
		}
          if(empty($address)) {
			echo "<font color='red'>address field is empty.</font><br/>";
		}
		
           if(empty($n_id)) {
			echo "<font color='red'>n_id field is empty.</font><br/>";
		}
		
           if(empty($p_num)) {
			echo "<font color='red'>p_num field is empty.</font><br/>";
		}
		
           if(empty($m_num)) {
			echo "<font color='red'>m_num field is empty.</font><br/>";
		}
		if(empty($a_email)) {
			echo "<font color='red'>a_email field is empty.</font><br/>";
		}
       
		
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result="insert into p_info(firstName,lastName,fatherName
        ,motherName,dob,religion,address,n_id,p_num,m_num,a_email, user_id)values('$firstName','$lastName','$fatherName','$motherName','$dob','$religion',
        '$address',
        '$n_id','$p_num','$m_num','$a_email','$user_id')";
        mysqli_query($con,$result);
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index1.php'>View Result</a>";
	}
}
?>
</body>
</html>
