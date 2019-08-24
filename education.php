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
	<title>Education Information</title>
    <link rel="stylesheet" href="personalInfo.css">
</head>
   
<body>
	
	<br/><br/>
  <div class="personal_info">
      <div class="p_form">
    <form action="education.php" method="post" name="form1">
        <h1 style="color:#fff;"> Education Information</h1><br>
        
        <h2 style="color:white;">Exam Title:</h2><br>
		        <select name="title" id="religion" >
                    <option name="exam" value="SSC">SSC</option>
                    <option name="exam" value="HSC">HSC</option>
                    <option name="exam" value="DIPLOMA">DIPLOMA</option>
                </select><br><br>
        <h2 style="color:white;">From:</h2><br>
        <div id="from">
        <input type="date" name="from" ><br><br>
        </div>
        <h2 style="color:white;">To:</h2><br>
        <input type="date" name="to" ><br>
        
        <input type="text" placeholder="Enter Institue Name" name="ins_name"><br>
        <br>
        <h2 style="color:white">Group:</h2><br>
         <select name="group" id="religion" >
                    <option name="group" value="Science">Science</option>
                    <option name="group" value="Arts">Arts</option>
                    <option name="group" value="Commerce">Commerce</option>
                </select><br>
        <input type="text" placeholder="enter your gpa" name="gpa">
        <br>
        <input type="number" placeholder="enter scale" name="scale" min="1" max="5">
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
    $group=$_POST['group'];
    $gpa=$_POST['gpa'];
    $scale=$_POST['scale'];
     $user_id =$_SESSION['user_id'];
	
		
	// checking empty fields
	if(empty($title) || empty($from) || empty($to) || empty($i_name)
      || empty($group) || empty($gpa) || empty($scale)) {
				
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
			echo "<font color='red'>institution name field is empty.</font><br/>";
		}
		
           if(empty($group)) {
			echo "<font color='red'>group field is empty.</font><br/>";
		}
		
           if(empty($gpa)) {
			echo "<font color='red'>gpa field is empty.</font><br/>";
		}
          if(empty($scale)) {
			echo "<font color='red'>scale field is empty.</font><br/>";
		}
		

	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
			$result="insert into education(title,from_d,to_d,i_n,group_e,gpa,scale,user_id)values('$title','$from','$to','$i_name','$group','$gpa',
        '$scale',$user_id)";
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