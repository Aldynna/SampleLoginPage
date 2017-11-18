<?php
session_start();
$host="localhost:3306"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="mydb"; // Database name
//$tbl_name="korisnik"; // Table name

// Connect to server and select databse.
$conn =mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");
//mysqli_select_db("$db_name")or die("cannot select DB");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Pocetna stranica</title>
      <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">

  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
 

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
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" method="post">
            <div class="form-group">
              <input name="username" type="text" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
              <input name="password" type="password" placeholder="Password" class="form-control">
            </div>
            <button name="login" type="submit" class="btn btn-success" id="login_btn" >Sign in</button>
			<a href="registracija.php"><input type="button" id="register_btn" class="btn btn-success" value="Registruj se"/></a>
          </form>
		  
	<?php	  
if(isset($_POST['login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from korisnik WHERE username='$username' AND password='$password'";
	$query_run = mysqli_query($conn,$query);
		if(mysqli_num_rows($query_run)>0)
		{
			if($username=="admin")
			{
				$query="select * from korisnik WHERE username='$username' AND password='$password'";
				$query_run = mysqli_query($conn,$query);
					if(mysqli_num_rows($query_run)>0)
					{
						$_SESSION['username']= $username;
						header('location:admin.php');
					} 
	
					else
					{
						echo '<script type="text/javascript"> alert("Pogresan password pokusajte ponovo!")</script>' ;
		
					}
	
	
			} else
				{
					$query="select * from korisnik WHERE username='$username' AND password='$password'";
				$query_run = mysqli_query($conn,$query);
					if(mysqli_num_rows($query_run)>0)
					{
						session_start();
						$_SESSION['username']= $username;
						header('location:korisnik.php');
					} 
					
				}
	
	
		} else
			{
				echo '<script type="text/javascript"> alert("Korisnik ne postoji. Izvrsite registraciju")</script>' ;
				header('location:registracija.php'); 
			}


}
	

?>
		  
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Dobrodosli!</h1>
        <p></p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      
      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          
<p>

</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>

</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>  </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; 2017 PMF, studenti</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
