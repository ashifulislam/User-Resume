<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:logInForm.html');
}

$id = $_SESSION['user_id'];
?>
<head>
        <meta charset="UTF-8">
        <title>Resume Project</title>
        <link rel="stylesheet" href="style.CSS"/>
    </head>
    <body>
        <div class="maincontent">
         
            <div class="left_content">
                <div class="surname">
                    <div class="propic">
                        <img src="img/prince.JPG" alt="" class="profilepicture" >
                    </div>
                    <div class="names">
                         <?php 
                        $con=mysqli_connect('localhost','root','');
                        mysqli_select_db($con,'personal'); 
                        
                            $sql = "select * from p_info where user_id ='$id'";
                            $result = mysqli_query($con, $sql);
                            while($res = mysqli_fetch_assoc($result)){
                                echo "<h1>" .$res['firstName']. " " .$res['lastName']."<h1>";
                                echo "<h2>" .$res['lastName']. "</h2>";
                            }
                            ?>
                       <P>WEB DEVELOPER</P>
                    </div>
                </div>
                <div class="profile">
                    <div class="fullicon">
                        <img src="img/profile.png" alt="" class="icon">
                    </div>
                    <div class="title">
                        <h1>PROFILE</h1>
                    </div>
                    <div class="profile_line">
                        <img src="img/line.png" alt="" class="pline">
                    </div>
                    <div class="pdes">
                        <p><?php
//including the database connection file
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'personal');

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result="SELECT * FROM p_info  where user_id ='$id' ORDER BY id DESC";
$prince=mysqli_query($con,$result);
 // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>

<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>firstName</td>
		<td>lastName</td>
		<td>fatherName</td>
        <td>motherName</td>
        <td>dob</td>
        <td>religion</td>
        <td>n_id</td>
        <td>p_num</td>
        <td>m_num</td>
        <td>a_email</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_assoc($prince)) { 		
		echo "<tr>";
		echo "<td>".$res['firstName']."</td>";
		echo "<td>".$res['lastName']."</td>";
		echo "<td>".$res['fatherName']."</td>";	
        echo "<td>".$res['motherName']."</td>";	
        echo "<td>".$res['dob']."</td>";	
        echo "<td>".$res['religion']."</td>";	
        echo "<td>".$res['n_id']."</td>";	
        echo "<td>".$res['p_num']."</td>";
        echo "<td>".$res['m_num']."</td>";
        echo "<td>".$res['a_email']."</td>";	

	}
	?>
	</table>
</body>
</html>

                        </p>
                    </div>
                </div>
                <div class="contact">
                    <div class="fullicon">
                        <img src="img/contact.png" alt="" class="icon">
                    </div>
                    <div class="title">
                        <h1>CONTACT</h1>
                    </div>
                    <div class="contact_line">
                        <img src="img/line.png" alt="" class="cline">
                    </div>
                    <div class="Cdes">
                        <div class="c_left">
                            <p>ADDRESS</p>
                            <p>E-MAIL</p>
                            <p>PHONE</p>
                            <p>WEBSITE</p>
                        </div>
                        <div class="c_right">
                           <?php 
                        $con=mysqli_connect('localhost','root','');
                        mysqli_select_db($con,'personal'); 
                         
                            $sql = "select address from p_info where user_id ='$id'";
                            $result = mysqli_query($con, $sql);
                            while($res = mysqli_fetch_assoc($result)){
                                echo "<p>" .$res['address']. "<p>";
                            }
                            ?>
                             <?php 
                        $con=mysqli_connect('localhost','root','');
                        mysqli_select_db($con,'personal'); 
                         
                            $sql = "select email from usertable where user_id ='$id'";
                            $result = mysqli_query($con, $sql);
                            while($res = mysqli_fetch_assoc($result)){
                                echo "<p>" .$res['email']. "<p>";
                            }
                            ?>
                                  <?php 
                        $con=mysqli_connect('localhost','root','');
                        mysqli_select_db($con,'personal'); 
                         
                            $sql = "select m_num from p_info where user_id ='$id'";
                            $result = mysqli_query($con, $sql);
                            while($res = mysqli_fetch_assoc($result)){
                                echo "<p>" .$res['m_num']. "<p>";
                            }
                            ?>
                            
                            
                          
                        </div>
                    </div>
                </div>
                <div class="skills">
                    <div class="fullicon">
                        <img src="img/skills.png" alt="" class="icon">
                    </div>
                    <div class="title">
                        <h1>SKILLS</h1>
                    </div>
                    <div class="skills_line">
                        <img src="img/line.png" alt="" class="sline">
                    </div>
                    <div class="s_des">
                        <?php 
                        $con=mysqli_connect('localhost','root','');
                        mysqli_select_db($con,'personal'); 
                         
                            $sql = "select * from user_skills1 where user_id ='$id'";
                            $result = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_assoc($result)){ 
                            
                            echo "<p>".$row['soft_skill']."</p>"; 
                            $num = $row['soft_level']/10;
                            $count = 0; ?>
                         <div class="skills_dots">
                            <?php 
                            for($i=0;$i<12;$i++){
                                if($count < $num){  ?>
                                    <img src="img/blue-dot.png" alt="" class="dots">
                            <?php
                                    $count++;
                                }else{
                                    ?>
                                    <img src="img/ash-dot.png" alt="" class="dots">
                                <?php
                                }
                            }
                                ?>
                        </div>
                        <?php
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
            <div class="right_content">
                <div class="education">
                    <div class="fullicon">
                        <img src="img/education.png" alt="" class="icon">
                    </div>
                    <div class="title">
                        <h1>EDUCATION</h1>
                    </div>
                    <div class="edu_line">
                        <img src="img/line.png" alt="" class="Eline">
                    </div>
                    <div class="edu_des">
                        
                       <?php 
                        $con=mysqli_connect('localhost','root','');
                        mysqli_select_db($con,'personal'); 
                         
                            $sql = "select * from education where user_id ='$id'";
                            $result = mysqli_query($con, $sql);
                            while($res = mysqli_fetch_assoc($result)){ ?>
                                <div class="right_blackdots">
                                    <img src="img/black-dot.png" alt="" class="blackdots">
                                </div>
                           
                                <div class="Enames">
                                    <h1><?php echo $res['title']; ?> <span>// <?php echo $res['from_d'];?> - <?php echo $res['to_d']; ?></span></h1>
                                    <h1>Institution Name</h1>
                                    <p><?php echo $res['i_n'];?></p>
                                </div>  
                            <?php 
                            }
                            ?>
                            
                       
                    </div>
                </div>
                <div class="experience">
                    <div class="fullicon">
                        <img src="img/experiance.png" alt="" class="icon">
                    </div>
                    <div class="title">
                        <h1>EXPERIENCE</h1>
                    </div>
                    <div class="ex_line">
                        <img src="img/line.png" alt="" class="Eline">
                    </div>
                    <div class="edu_des">
                          <?php 
                        $con=mysqli_connect('localhost','root','');
                        mysqli_select_db($con,'personal'); 
                         
                            $sql = "select * from employment where user_id ='$id'";
                            $result = mysqli_query($con, $sql);
                            while($res = mysqli_fetch_assoc($result)){ ?>
                                <div class="right_blackdots">
                                    <img src="img/black-dot.png" alt="" class="blackdots">
                                </div>
                           
                                <div class="Exnames">
                                    <h1><?php echo $res['title']; ?> <span>// <?php echo $res['from_d'];?> - <?php echo $res['to_d']; ?></span></h1>
                                    <h1>Organization Name</h1>
                                    <p><?php echo $res['i_n'];?></p>
                                    <p><?php echo $res['address'];?></p>
                                </div>
                            <?php 
                            }
                            ?>
                    </div>
                </div>
                <div class="software">
                    <div class="fullicon">
                        <img src="img/software.png" alt="" class="icon">
                    </div>
                    <div class="title">
                        <h1>SOFTWARE</h1>
                    </div>
                    <div class="software_line">
                        <img src="img/line.png" alt="" class="Eline">
                    </div>
                    <?php
                        $con=mysqli_connect('localhost','root','');
                        mysqli_select_db($con,'personal');
                    ?>
                    <div class="softdes">
                        <div class="soft_left">
                            <?php 
                            $left_sql = "select * from user_skill where user_id ='$id' and show_div ='left'";
                            $result = mysqli_query($con, $left_sql);
                            while($row = mysqli_fetch_assoc($result)){ ?>
                            <p class="softnames"><?php echo $row['skill_name']; ?></p>
                            <img src="<?php echo $row['skill_level'] ?>" alt="" class="skillbar">
                            
                            <?php
                                
                            }
                            ?>
                          
                        </div>
                        <div class="soft_right">
                             <?php 
                            $left_sql = "select * from user_skill where user_id ='$id' and show_div ='right'";
                            $result = mysqli_query($con, $left_sql);
                            while($row = mysqli_fetch_assoc($result)){ ?>
                            <p class="softnames"><?php echo $row['skill_name']; ?></p>
                            <img src="<?php echo $row['skill_level'] ?>" alt="" class="skillbar">
                            
                            <?php
                                
                            }
                            ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>