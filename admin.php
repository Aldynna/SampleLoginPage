
<?php
session_start();
require 'dbconfig/config.php';
if(isset($_POST['logout']))
{
session_destroy();
header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin page</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
   
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style>
	.linija { border-style:hidden; }
	</style>
</head>

<body style="background-image: url(pozadinareg.jpg); background-size:cover;">
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Stranica za administratore</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<form class="navbar-form navbar-right" method="post" action="pocetna.php">
				<div class="form-group">
					<a href="registracija.php"><input type="button" id="register_btn" class="button" value="Unesite novog korisnika" /></a>
					
				</div>
			</form>
        </div>
<!--/.navbar-collapse -->
    </div>
</nav>

	<div style="margin-top: 150px; margin-left: 200px;">
		<table id="myTable" style="width:80%;">
			<form action='drugiadmin.php' method='post'>
				<tr>
					<th style="height: 50px;  text-align: center; background-color: #699bcc; color: white;">Korisničko ime</th>
					<th style="height: 50px;  text-align: center; background-color: #699bcc; color: white;">Ime</th>
					<th style="height: 50px;  text-align: center; background-color: #699bcc; color: white;">Prezime</th>
					<th style="height: 50px;  text-align: center; background-color: #699bcc; color: white;">E-mail</th>
					<th style="height: 50px;  text-align: center; background-color: #699bcc; color: white;">Uredi</th>
					<th style="height: 50px;  text-align: center; background-color: #699bcc; color: white;">Obriši</th>
				</tr>
			
<?php 
$sql = "SELECT * FROM korisnik";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
$counter = 0; 
    while($row = mysqli_fetch_assoc($result)) {
$counter++;
	echo 
			"<tr>
				<td style='height: 50px;' id='uname'>". $row["username"]. "</td> 
				<td style='height: 50px;'> " . $row["ime"]. " </td>
				<td style='height: 50px;'> " . $row["prezime"]. " </td>
				<td style='height: 50px;'> " . $row["mail"]. " </td>
             
				<td style='height: 50px;'><a><input type='button' id='register_btn' class='btn btn-primary' data-toggle='collapse' data-target='#$counter' aria-expanded='false' aria-controls='#$counter' value='Uredi' /></a></td> 
				<td style='height: 50px;'><a href='delete.php?username=" . $row['username'] . "'><input type='button' id='register_btn' class='btn btn-primary' value='Obriši' ></a></td> 
   
				<td>
					<div class='collapse' id='$counter' aria-expanded='false'>
						<form  method='post' class='navbar-form navbar-right'  name='poc' role='form' > Uredi korisnika: <br>
							<input type='text' id='namenew'+$counter name='namenew'+$counter placeholder='Unesi novo ime'>
							<input type='text' id='lnamenew'+$counter name='lnamenew'+$counter placeholder='Unesi novo prezime'>
							<input type='password' id='password'+$counter name='password'+$counter placeholder='Unesi novi password'>
							<input type='text' id='mail'+$counter name='mail'+$counter placeholder='Unesi novi mail'>
							<a href='edit.php?username=" . $row['username'] . "&counter=".$counter."'><input type='button' id='register_btn' class='btn btn-primary' value='Snimi' /></a>
						</form>
					</div>
				</td>
			</tr> ";
    }
} else {
    echo '0 results';
}

?>
 


</form>
</table>
</div>
<div id="navbar" class="navbar-collapse collapse"  style="margin: 30px 50px 0 50px; width: 50%;">
			<form class="navbar-form navbar-right" method="post" action="pocetna.php">
				<div class="form-group">
					<input name="logout" type="submit" class="btn btn-success" id="logout_btn" value="Odjavi se"><br>
					
				</div>
			</form>
        </div>

<div style="font-size: 15px; color: #c9c9c9; border-top: 1px solid #efefef; padding: 13px 0; text-align: center; margin: 10px 0 0 0;">
		<p>&copy; Planer za putovanja. Sva prava zadržana</p>
		</div>
</body>
</html>