<?php

session_start();

if(isset($_SESSION['username'])){
	
	$name = $_GET['name'];	
	$id = $_SESSION['id'];
	require('db.php');
	$query = "DELETE FROM data WHERE uid='$id' and name='$name'";
	
	if(mysqli_query($con, $query)) header('Location: index.php');
	else{
		echo "Query Problem, please try again!!";
	}
	
}


?>