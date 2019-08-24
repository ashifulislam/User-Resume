<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:logInForm.html');
}?>
<?php

include('include/header.php');


?>

<?php

include('include/slideBar.php');


?>

<html>
<head>
	<title>Employement Information</title>
    <link rel="stylesheet" href="personalInfo.css">
</head>
   
<body>
	
	<br/><br/>
  <div class="personal_info">
      <div class="p_form">
    <form action="employment.php" method="post" name="form1">
        <h1 style="color:#fff;"> Employement Information</h1><br>
        
        <h2 style="color:white;">Job Title:</h2><br>
		        <select name="title" id="religion" >
                    <option name="exam" value="Web Designer">Web Designer</option>
                    <option name="exam" value="Android Developer">Android Developer</option>
                    <option name="exam" value="Desktop Developer">Desktop Developer</option>
                </select><br><br>
        <h2 style="color:white;">From:</h2><br>
        <div id="from">
        <input type="date" name="from" ><br><br>
        </div>
        <h2 style="color:white;">To:</h2><br>
        <input type="date" name="to" ><br><br>
        
        <input type="text" placeholder="Enter Organization Name" name="ins_name"><br>
        <br>
        <input type="text" placeholder="Enter Organization address" name="ins_address"><br>
        <br>
       
        
        <input type="submit" value="save">
        

        
	</form>
      </div>
    </div>
    <?php
//including the database connection file
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'personal');

if(isset($_POST['title'])) {	
	$title =$_POST['title'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    $i_name=$_POST['ins_name'];  
    $address=$_POST['ins_address'];
    
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
		// if all the fields are filled (not empty) 
			
		//insert data to database	
			$result="insert into employment(title,from_d,to_d,i_n,address,user_id)values('$title','$from','$to','$i_name','$address',$user_id)";
       $rslt = mysqli_query($con,$result);
		
        if($rslt){
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='educationIndex.php'>View Result</a>";
        }else{
            echo mysqli_error($con);
        }
	}
}
?>
    </body>
</html>