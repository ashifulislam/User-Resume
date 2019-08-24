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
	$title =$_POST['title1'];
    $from=$_POST['from1'];
    $to=$_POST['to1'];
    $i_name=$_POST['ins_name1'];  
    $address=$_POST['ins_address1'];
    

     $user_id =$_SESSION['user_id'];
	
    	
	
	// checking empty fields
	if(empty($title) || empty($from) || empty($to) || empty($i_name)
      || empty($address)){
				
		if(empty($title)) {
			echo "<font color='red'>title field is empty.</font><br/>";
		}
		
		if(empty($from)) {
			echo "<font color='red'>from field is empty.</font><br/>";
		}
		
		if(empty($to)) {
			echo "<font color='red'>to field is empty.</font><br/>";
		}
           if(empty($i_name)) {
			echo "<font color='red'>organization name field is empty.</font><br/>";
		}
		
           if(empty($address)) {
			echo "<font color='red'>organization address field is empty.</font><br/>";
		}
		
           
		

		
		
	} else {	
       
		//updating the table
		$result="UPDATE employment SET title='$title',from_d='$from',to_d='$to',i_n='$i_name',address='$address' WHERE id=$id";
        mysqli_query($con,$result);
		
		//redirectig to the display page. In our case, it is index.php
		header("Location:employmentIndex.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM employment WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$title =$res['title'];
    $from=$res['from_d'];
    $to=$res['to_d'];
    $i_name=$res['i_n'];  
    $address=$res['address'];
     
	
    	
	
}
?>
<html>
<head>	
	<title>Edit Data</title>
    <link rel="stylesheet" href="personalInfo.css">
</head>

<body>
	
	<br/><br/>
	
	
        <div class="personal_info">
            <form name="form1" method="post" action="employmentEdit.php">
		  <select name="title1" id="religion" value=<?php
                 echo $title ?>>
                    <option name="exam" value="Web Designer">Web Designer</option>
                    <option name="exam" value="Android Developer">Android Developer</option>
                    <option name="exam" value="Desktop Developer">Desktop Developer</option>
                </select><br><br>
        <input type="dob" name="from1" placeholder="Enter duration from"
                value=<?php
                    echo $from;
                   ?>><br>
        <input type="dob" name="to1" placeholder="Enter duration to"
                value=<?php
                    echo $to;
                   ?>><br>
        <input type="text" name="ins_name1" placeholder="Enter your organization name" value=<?php
                    echo $i_name;
                   ?>>
               <br>
         <input type="text" name="ins_address1" placeholder="Enter your organization address" value=<?php
                    echo $address;
                   ?>>
               <br>
        
        
       
    
        
                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
				<input type="submit" name="update" value="Update">
			
        
	</form>
    </div>
</body>

