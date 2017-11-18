
<?php
$host="localhost:3306"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="mydb"; // Database name
//$tbl_name="korisnik"; // Table name

// Connect to server and select databse.
$conn =mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
<div id="main-wrapper">
<center>
<h2>Admin Page</h2>
<h3>Welcome

<?php echo $_SESSION['username'] ?>
</h3>
<img src="imgs/bus_blue.jpg" class="avatar"/>
</center>
<form class="myform" action="adminpage.php" method="post">
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

<div>

<?php 
$sql = "SELECT * FROM korisnik";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr ><td >". $row["username"]. " - Username: " . $row["username"]. " Ime " . $row["ime"]. " Prezime ". $row["prezime"]."</td></tr>";
    }
} else {
    echo '0 results';
}

?>
</div>
</body>
</html>