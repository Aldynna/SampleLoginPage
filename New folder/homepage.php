
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
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
<div id="main-wrapper">
<center>
<h2>Home Page</h2>
<h3>Welcome

<?php echo $_SESSION['username'] ?>
</h3>
<img src="imgs/bus_blue.jpg" class="avatar"/>
</center>
<form class="myform" action="homepage.php" method="post">
<input name="logout" type="submit" id="logout_btn" value="Log Out"/><br>
</form>
<?php
if(isset($_POST['logout']))
{
session_destroy();
header('location:index.php');
}
?>
</div>
</body>
</html>