
<?php
$host="localhost:3306"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="mydb"; // Database name
//$tbl_name="korisnik"; // Table name

// Connect to server and select databse.
$con =mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
<div id="main-wrapper">
<center>
<h2>Login Form</h2>
<img src="imgs/bus_blue.jpg" class="avatar"/>
</center>
<form class="myform" action="index.php" method="post">
<label><b>Username:</b></label><br>
<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
<label><b>Password:</b></label><br>
<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
<input name="login" type="submit" id="login_btn" value="Login"/><br>
<a href="register.php"><input type="button" id="register_btn" value="Register"/></a>
</form>
<?php



if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$query="select * from user WHERE username='$username' AND password='$password'";
$query_run = mysqli_query($con,$query);


//ovdje pocinje

if($username=="admin"){
	$_SESSION['username']= $username;
header('location:drugiadmin.php');
	
}





//ovdje zavrsava
else{
	if(mysqli_num_rows($query_run)>0){

// valid
$_SESSION['username']= $username;
header('location:homepage.php');
	}
else
{
// invalid
echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
}
}
}
?>
</div>
</body>
</html>