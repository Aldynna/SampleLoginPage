<?php
require 'dbconfig/config.php';
if (isset($_GET['username'])&&isset($_GET['counter']) )

{
	$user = $_GET['username'];
	$counter = $_GET['counter'];
}
function edit($user, $fn, $ln,$email,$pass, $error)

{
?>
<!DOCTYPE html>
<html>
<head>

<title>Edit Record</title>

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>

<form action="" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<div>

<p><strong>ID:</strong> <?php echo $id; ?></p>

<strong>First Name: *</strong> <input type="text" name="fname" value="<?php echo $fname; ?>"/><br/>

<strong>Last Name: *</strong> <input type="text" name="lname" value="<?php echo $lname; ?>"/><br/>
<strong>Password: *</strong> <input type="text" name="passnew" value="<?php echo $passnew; ?>"/><br/>
<strong>E-mail: *</strong> <input type="text" name="mailnew" value="<?php echo $mailnew; ?>"/><br/>
<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php

}
$fn=$_POST['fname'];
//$fn = mysqli_real_escape_string(htmlspecialchars($_POST['fname']));
$ln = mysqli_real_escape_string(htmlspecialchars($_POST['lname']));
$pass = mysqli_real_escape_string(htmlspecialchars($_POST['passnew']));
$email = mysqli_real_escape_string(htmlspecialchars($_POST['mailnew']));
$error = 'ERROR: Please fill in all required fields!';

mysqli_query("UPDATE korisnik SET ime='$fn', prezime='$ln', mail='$email', password='$pass' WHERE username='$user'") or die(mysqli_error());
header("Location: admin.php");


?>
