
<?php
$host="localhost:3306"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="mydb"; // Database name
//$tbl_name="korisnik"; // Table name

// Connect to server and select databse.
$con=mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
<div id="main-wrapper">
<center>
<h2>Registration Form</h2>
<img src="imgs/bus_blue.jpg" class="avatar"/>
</center>
<form class="myform" action="register.php"method="post">
<label><b>Username:</b></label><br>
<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
<label><b>Password:</b></label><br>
<input name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
<label><b>Confirm Password:</b></label><br>
<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>
</form>
<?php
if(isset($_POST['submit_btn']))
{
//echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
if($password==$cpassword)
{
$query= "select * from user WHERE username='$username'";
$query_run = mysqli_query($con,$query);
if(mysqli_num_rows($query_run)>0)
{
	// there is already a user with the same username
echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
}
else
{
$query= "insert into user values('$username','$password')";
$query_run = mysqli_query($con,$query);
if($query_run)
{
echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
}
else
{
echo '<script type="text/javascript"> alert("Error!") </script>';
}
}
}
else{
echo '<script type="text/javascript"> alert("Password and confirm password does not match!") </script>';
}
}
?>
</div>
</body>
</html>