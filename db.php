<?php

$con = mysqli_connect("localhost","root","","register") or die("failed here ")  ;

if($con)
{//echo"connected";
}
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  
        //$query = "INSERT INTO data (username, mail, name, Pnumber, Uemail) VALUES ('u','name','n','8','e')" or die("failed here ")  ;
        //$result = mysqli_query($con,$query) or die(mysqli_error($con));
		//var_dump($result);
		//if ($con->query($query) === TRUE) {
    //echo "New record created successfully";
 //}
       // if($result){
       //     echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        //}
		//else
		//{echo"notihnnandnas";
	
	//}
?>