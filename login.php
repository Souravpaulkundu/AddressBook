<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="bootstrap.css" />
<style>
body {
    background-color: lightblue;
}
</style>
</head>
<body>
<div class="backg">
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
			
			$username = $_REQUEST['username']; // removes backslashes
			//$username = mysqli_real_escape_string($con,$username); //escape s special characters in a string
			$password = sha1($_REQUEST['password']);
			//$password = mysqli_real_escape_string($con,$password);
			
		//Checking is user existing in the database or not
			$query = "SELECT * FROM user WHERE username='$username' and password='$password'";
			$result = mysqli_query($con,$query);
			$rows = mysqli_fetch_assoc($result);
			
			/*echo $username;
			echo "\n".$password;
			echo mysqli_num_rows($result);*/
			if(mysqli_num_rows($result)==1){
				$_SESSION['username'] = $username;
				$_SESSION['id']=$rows['id'];
				
				header("Location: index.php"); // Redirect user to index.php
				}
        
			else{
					echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
					}
		}
    else{
		?>
		<div class="form">
		<h1>Log In</h1>
		<form action="" method="post" name="login">
		<input class="form-control" type="text" name="username" placeholder="Username" required />
		<input class="form-control" type="password" name="password" placeholder="Password" required />
		<input class="btn btn-success"		name="submit" type="submit" value="Login" />
		</form>
		<p>Not registered yet? <a href='registration.php'>Register Here</a></p>

		</div>
		<?php 
		} ?>

</div>
</body>
</html>
