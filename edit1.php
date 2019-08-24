<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:logInForm.html');
}

?>

<?php

include('include/header.php');


include('include/slideBar.php');
?>

<?php
// including the database connection file
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'personal');

if(isset($_POST['update']))
{	

	$id = $_POST['id'];
	
	$firstName =$_POST['FirstName'];
    $lastName=$_POST['LastName'];
    $fatherName=$_POST['FatherName'];
    $motherName=$_POST['MotherName'];
    $dob=$_POST['dob'];
    $religion=$_POST['religion'];
    $address=$_POST['address'];
    $n_id=$_POST['nid'];
    $p_num=$_POST['p_num'];
    $m_num=$_POST['m_num'];
    $a_email=$_POST['a_em'];
    $id=$_GET['id'];
 
    	
	
	// checking empty fields
	if(empty($firstName) || empty($lastName) || empty($fatherName) || empty($motherName)
      || empty($dob) || empty($religion) || empty($n_id)|| empty($p_num)|| empty($m_num)
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
       
		
		
	} else {	
       
		//updating the table
		$result="UPDATE p_info SET firstName='$firstName',lastName='$lastName',fatherName='$fatherName',motherName='$motherName',dob='$dob',religion='$religion',address='$address',n_id='$n_id',p_num='$p_num',m_num='$m_num',a_email='$a_email' WHERE id=$id";
        mysqli_query($con,$result);
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index1.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM p_info WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$firstName =$res['firstName'];
    $lastName=$res['lastName'];
    $fatherName=$res['fatherName'];
    $motherName=$res['motherName'];
    $dob=$res['dob'];
    $religion=$res['religion'];
    $address=$res['address'];
    $n_id=$res['n_id'];
    $p_num=$res['p_num'];
    $m_num=$res['m_num'];
    $a_email=$res['a_email'];
  
    	
	
}
?>
<html>
<head>	
	<title>Edit Data</title>
    <link rel="stylesheet" href="personalInfo.css">
</head>

<body>
	<a href="index1.php">Home</a>
	<br/><br/>
	
	<h1 style="text-align:center">Edit Personal Information</h1>
        <div class="personal_info">
            <form name="form1" method="post" action="edit1.php">
		<input type="text" name="FirstName" placeholder="Enter your first name" 
               value=<?php
                    echo $firstName;
                   ?>><br>
        <input type="text" name="LastName" placeholder="Enter your last name"
                value=<?php
                    echo $lastName;
                   ?>><br>
        <input type="text" name="FatherName" placeholder="Enter your father's name"
                value=<?php
                    echo $fatherName;
                   ?>><br>
        <input type="text" name="MotherName" placeholder="Enter your mother's name" value=<?php
                    echo $motherName;
                   ?>>
               <br>
        <input type="date" name="dob"  value=<?php
                    echo $dob;
                   ?>><br>
          <select name="religion" id="religion"  value=<?php
                    echo $religion;
                   ?>>
                    <option name="religion" value="religion">Religion</option>
                    <option name="religion" value="muslim">Muslim</option>
                    <option name="religion" value="Hindu">Hindu</option>


                </select>
        <input type="text" name="address"  value=<?php
                    echo $address;
                   ?>><br>
        <input type="text" placeholder="Enter national id" name="nid"
                value=<?php
                    echo $n_id;
                   ?>><br>
        <input type="text" placeholder="Enter your passport number" name="p_num"
                value=<?php
                    echo $p_num;
                   ?>><br>
        <input type="text" placeholder="Enter your mobile number1" name="m_num"
                value=<?php
                    echo $m_num;
                   ?>><br>
        <input type="email" placeholder="Enter alternative email" name="a_em"
                value=<?php
                    echo $a_email;
                   ?>><br>
        

        
			
				<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
				<input type="submit" name="update" value="Update">
			
        </div>
	</form>
</body>

