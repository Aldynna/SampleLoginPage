<?php
session_start();
require 'dbconfig/config.php';
if(isset($_POST['logout']))
{
session_destroy();
header('location:pocetna.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin page</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    
<link rel="stylesheet" href="css/style.css">
    

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>

<body>
 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
	
          <a class="navbar-brand" href="#">Prijavljeni ste kao administrator</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" method="post" action="pocetna.php">
            <div class="form-group">
<a href="registracija.php"><input type="button" id="register_btn" class="button" value="Create new user" /></a>
              <input name="logout" type="submit" class="btn btn-success" id="logout_btn" value="Log Out"/><br>
            </div>
  

          </form>
        </div>
<!--/.navbar-collapse -->
      </div>
    </nav>
<div style="position:relative; top: 100px;">
<table id="myTable" style="width:80%">
<form action='edit.php' method='post'>
    <tr>
        <th >Username</th>
        <th>Ime</th>
		<th>Prezime</th>
		<th>E-mail</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
	
<?php 

$sql = "SELECT * FROM korisnik";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
$counter = 0; 
    while($row = mysqli_fetch_assoc($result)) {

        echo "<tr ><td id='uname'>". $row["username"]. "</td> <td > " . $row["ime"]. " </td ><td > " . $row["prezime"]. " </td ><td > " . $row["mail"]. " </td >
             
<td><a ><input type='button' id='register_btn' class='btn btn-primary' data-toggle='collapse' data-target='#$counter' aria-expanded='false' aria-controls='#$counter' value='Edit' /></a></td> 
			
			<td><a href='delete.php?username=" . $row['username'] . "'><input type='button' id='register_btn' class='btn btn-primary' value='Brisi' /></a></td> 
   <td>

 <div class='collapse' id='$counter' aria-expanded='false'>

            
 <form  method='post' class='navbar-form navbar-right'  name='poc' role='form' >
Edit korisnika
            <input type='text' id='namenew<?php echo $counter; ?>' name='namenew<?php echo $counter; ?>' placeholder='Unesi novo ime'>
                        
<input type='text' id='lnamenew[]' name='lnamenew[]' placeholder='Unesi novo prezime'>
<input type='password' id='password'+$counter name='password'+$counter placeholder='Unesi novi password'>
<input type='text' id='mail$counter' name='mail'+$counter placeholder='Unesi novi mail'>




 <a href='edit.php?username=" . $row['username'] . "&counter=".$counter."&ime="$_POST["namenew$counter"]"'><input type='button' id='register_btn' class='btn btn-primary' value='Snimi' /></a></td> 
            </form>
           
          

        </div>
        </td>
  
</tr> "; echo'<script type="text/javascript"> alert("namenew'.$counter.'") </script>'; $counter++;
    }
} else {
    echo '0 results';
}

?>
 


</form>



  			
				
 

</table>

   </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>