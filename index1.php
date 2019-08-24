<?php
//including the database connection file
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'personal');

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result="SELECT * FROM p_info ORDER BY id DESC";
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
<h1 style="text-align:center">Edit Personal Information</h1>
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>firstName</td>
		<td>lastName</td>
		<td>fatherName</td>
        <td>motherName</td>
        <td>dob</td>
        <td>religion</td>
         <td>address</td>
        <td>n_id</td>
        <td>p_num</td>
        <td>m_num</td>
        <td>a_email</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($prince)) { 		
		echo "<tr>";
		echo "<td>".$res['firstName']."</td>";
		echo "<td>".$res['lastName']."</td>";
		echo "<td>".$res['fatherName']."</td>";	
        echo "<td>".$res['motherName']."</td>";	
        echo "<td>".$res['dob']."</td>";	
        echo "<td>".$res['religion']."</td>";
        echo "<td>".$res['address']."</td>";
        echo "<td>".$res['n_id']."</td>";	
        echo "<td>".$res['p_num']."</td>";
        echo "<td>".$res['m_num']."</td>";
        echo "<td>".$res['a_email']."</td>";
        
        
		echo "<td><a href=\"edit1.php?id=$res[id]\">Edit</a> | <a href=\"delete1.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
