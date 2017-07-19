<?php

include("auth.php");
require('db.php');     //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Welcome Home</title>
<link rel="stylesheet" href="bootstrap.css" />
<link rel="stylesheet" href="css/s.css" />
<style>
div.form1 h4{
	color:#67FF11;
}
div.form1{
	
	background-color: #540D42;
}

</style>
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
		  <li class="logout pull-right"><a href="logout.php">Logout</a></li>
		</ul>

	</div>
	<?php
		if (isset($_REQUEST['Name'])){
	           $val=$_SESSION['username'];

				$idd = mysqli_query($con, "select id from users where username='$val'") ;

				while($iidd = mysqli_fetch_array($idd,MYSQLI_NUM)) {				
				$iid=implode(" ",$iidd);
				//echo "$iid";				
				}
				$usr=mysqli_query($con, "select username from users where id='$iid'") ;
				while($usrr = mysqli_fetch_array($usr,MYSQLI_NUM)) {
				$usnm=implode(" ",$usrr);
				//echo "$usnm";				
				}
				
		$Name = stripslashes($_REQUEST['Name']); // removes backslashes
		$Name = mysqli_real_escape_string($con,$Name); //escapes special characters in a string
		$Pnumber = stripslashes($_REQUEST['Pnumber']);
		$Pnumber = mysqli_real_escape_string($con,$Pnumber) ;
		$email = stripslashes($_REQUEST['Uemail']);
		$email = mysqli_real_escape_string($con,$email);

         $query = ("INSERT INTO data (uname, uid, name, Pnumber, Uemail) VALUES ('$usnm','$iid','$Name','$Pnumber','$email')" ) or die("failed here ") ;
         $result = mysqli_query($con,$query)   ; 
        if($result){
            echo "<div class='form'><h3>Your Contact Saved Successfully.</h3> <br/> <a href='dashboard.php'></a></div>";
			header("Location: dashboard.php");
        }
    }
	else{	
	?>
<div class="form1">
<h4>Add New Contact </h4>
<form name="Add New Contact" action="index.php" method="post">

<input class="input-group input-group-lg " type="text" name="Name" placeholder="Name" required />
<input class="input-group input-group-lg" type="text" name="Pnumber" placeholder="Phone Number" required />
<input class="input-group input-group-lg" type="email" name="Uemail" placeholder="Email" required />
<input class="btn btn-success" type="submit" name="submit" value="  Add" />
</form>	
</div>


	<?php } ?>
	
	<?php 
	
	$sql = "SELECT name, Pnumber, Uemail FROM data";
    $result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-striped'><tr>
	<th>Name</th>
	<th>Phone Number</th>
	<th>Email Address</th>
	<th>Delete </th>
	<th>Edit</th>
	</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
		<td>".$row["name"]."</td>
		<td>".$row["Pnumber"]."</td>
		<td>".$row["Uemail"]."</td>
		<td> <a href='delete.php?name='".$row['name']."'>delete </a></td>
		<td> <a href='update.php?name='".$row['name']."'> Update</a></td>
		
	</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";

}	
?>	
</body>
</html>
