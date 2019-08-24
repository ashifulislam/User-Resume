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
       
		//updating the table
		$result="UPDATE education SET title='$title',from_d='$from',to_d='$to',i_n='$i_name',group_e='$group',
        gpa='$gpa',scale='$scale' WHERE id=$id";
        mysqli_query($con,$result);
		
		//redirectig to the display page. In our case, it is index.php
		header("Location:educationIndex.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM education WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$title =$res['title'];
    $from=$res['from_d'];
    $to=$res['to_d'];
    $i_name=$res['i_n'];  
    $group=$res['group_e'];
    $gpa=$res['gpa'];
    $scale=$res['scale'];
     
	
    	
	
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
            <form name="form1" method="post" action="educationEdit.php">
		  <select name="title" id="religion"  value=<?php
                    echo $title;
                   ?>>
                    <option name="religion" value="SSC">SSC</option>
                    <option name="religion" value="HSC">HSC</option>
                    <option name="religion" value="DIPLOMA">DIPLOMA</option>


                </select>
        <input type="dob" name="from" placeholder="Enter duration from"
                value=<?php
                    echo $from;
                   ?>><br>
        <input type="dob" name="to" placeholder="Enter duration to"
                value=<?php
                    echo $to;
                   ?>><br>
        <input type="text" name="ins_name" placeholder="Enter your institution name" value=<?php
                    echo $i_name;
                   ?>>
               <br>
        <select name="group" id="religion"  value=<?php
                    echo $group;
                   ?>>
                    <option name="religion" value="SCIENCE">SCIENCE</option>
                    <option name="religion" value="ARTS">ARTS</option>
                    <option name="religion" value="COMMERCE">COMMERCE</option>


                </select>
        
        <input type="number" name="gpa" placeholder="enter gpa"  value=<?php
                    echo $gpa;
                   ?>><br>
        <input type="number" placeholder="Enter scale" name="scale"
                value=<?php
                    echo $scale;
                   ?>><br>
    
        
                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
				<input type="submit" name="update" value="Update">
			
        
	</form>
    </div>
</body>

