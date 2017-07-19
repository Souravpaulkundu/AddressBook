<?php

include("auth.php");
require('db.php');     //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/s.css" />
</head>
<body>
	<div class="home">
		 <!-- <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
		<p>This is secure area.</p>
        -->
		<ul>
		  <li><a href="index.php">Home</a></li>
		  <li><a href="#news" color : red>About</a></li>
		  <li ><a href="#contact">Contact</a></li>
		  <li class="logout"><a href="logout.php">Logout</a></li>
		</ul>

	</div>
	<?php
		if (isset($_REQUEST['Name'])){
	           $val=$_SESSION['username'];
				
				$idd = mysqli_query($con, "select id from users where username='$val'") ;

				while($iidd = mysqli_fetch_array($idd,MYSQLI_NUM)) {				
				$iid=implode(" ",$iidd);
				echo "$iid  ";				
				}
				$usr=mysqli_query($con, "select username from users where id='$iid'") ;
				while($usrr = mysqli_fetch_array($usr,MYSQLI_NUM)) {
				$usnm=implode(" ",$usrr);
				echo "$usnm  ";		
                $n=mysqli_query($con, "select name from data where uid='$iid' and uname='$usnm'") ;
				while($nn = mysqli_fetch_array($n,MYSQLI_NUM)) {
				$nn=implode(" ",$nn);
				echo "$nn  ";				
				}
			}
				
		$Name = stripslashes($_REQUEST['Name']); // removes backslashes
		$Name = mysqli_real_escape_string($con,$Name); //escapes special characters in a string
		$Pnumber = stripslashes($_REQUEST['Pnumber']);
		$Pnumber = mysqli_real_escape_string($con,$Pnumber) ;
		$email = stripslashes($_REQUEST['Uemail']);
		$email = mysqli_real_escape_string($con,$email);
 	    echo "$Name";
		echo "$Pnumber";
		echo "$email";
      $query ="UPDATE data SET uname='$usnm', uid='$iid', name='$Name', Pnumber='$Pnumber',uemail='$email' WHERE uid='$iid' and name='$nn'";
       $result = mysqli_query($con,$query)   ; 
        if($result){
            echo "<div class='form'><h3>Your Contact Saved Successfully.</h3> <br/> </a></div>";
			//header("Location: dashboard.php");
        }
    }
	else{	
	?>
<div class="form1">
<h1>Registration</h1>
<form name="Add New Contact" action="" method="post">
<input type="text" name="Name" placeholder=" Update Name" required />
<input type="text" name="Pnumber" placeholder="Update Phone Number" required />
<input type="email" name="Uemail" placeholder="Update Email" required />
<input type="submit" name="submit" value="Add" />
</form>	
</div>


	<?php } ?>
	
	
</body>
</html>
