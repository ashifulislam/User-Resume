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

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result="SELECT * FROM education ORDER BY id DESC";
$prince=mysqli_query($con,$result);
 // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="personalInfo.php">Add New Data</a><br/><br/>
    <a href="profilePage1.html">Home</a>
<h1 style="text-align:center">Edit Education & Trainning Info</h1>
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Title</td>
		<td>From</td>
		<td>To</td>
        <td>Institue Name</td>
        <td>Group</td>
        <td>Gpa</td>
         <td>Scale</td>
        <td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($prince)) { 		
		echo "<tr>";
		echo "<td>".$res['title']."</td>";
		echo "<td>".$res['from_d']."</td>";
		echo "<td>".$res['to_d']."</td>";	
        echo "<td>".$res['i_n']."</td>";	
        echo "<td>".$res['group_e']."</td>";	
        echo "<td>".$res['gpa']."</td>";
        echo "<td>".$res['scale']."</td>";	
		echo "<td><a href=\"educationEdit.php?id=$res[id]\">Edit</a> | <a href=\"deleteEducation.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
