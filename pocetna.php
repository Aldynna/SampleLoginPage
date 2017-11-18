<?php

if (isset($_GET['novi'])&&(($_GET['novi'])=="nn") )
{
	
	echo '<script type="text/javascript"> alert("Korisnik uspjesno registrovan.. Molimo ulogujte se na stranicu") </script>';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Planer za putovanja</title>
      <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="imgs/logo.png">

  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
 

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <style>
  @font-face {
	font-family: TwentiethCentury;
	src: url('TwentiethCentury.ttf') format('truetype');
} </style>
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
		  <a class="navbar-brand" href="#"><img src="imgs/logo.png" style="height:30px; width:50px;"></a>
          <a class="navbar-brand" href="#">Planer putovanja</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" method="post">
            <div class="form-group">
              <input name="username" type="text" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
              <input name="password" type="password" placeholder="Password" class="form-control">
            </div>
            <button name="login" type="submit" class="btn btn-success" id="login_btn" >Prijavi se</button>
			<a href="registracija.php"><input type="button" id="register_btn" class="btn btn-success" value="Registruj se"/></a>
          </form>
		  
	<?php	  
	
	
if(isset($_POST['login']))
{

require 'dbconfig/config.php';
	$username=$_POST['username'];
	$password=$_POST['password'];
	$hashed = hash('sha512', $password);
	$query="select * from korisnik WHERE username='$username' AND password='$hashed'";
	$query_run = mysqli_query($conn,$query);
		if(mysqli_num_rows($query_run)>0)
		{
			if($username=="admin")
			{
				
							session_start();
						$_SESSION['username']= $username;
						header('location:admin.php');
					
	
					
	
	
			} else
				{
					
						session_start();
						$_SESSION['username']= $username;
						header('location:korisnik.php');
					} 
					
				
	
	
		} else
			
			{
				$query="select * from korisnik WHERE username='$username'";
				$query_run = mysqli_query($conn,$query);
		if(mysqli_num_rows($query_run)>0)
		{
				
				
				echo '<script type="text/javascript"> alert("Pogresan password,pokusajte ponovo")</script>' ;
				//header('location:greska.php'); 
			}
			else
				{
				echo '<script type="text/javascript"> alert("Korisnik ne postoji. Izvrsite registraciju")</script>' ;
				header('location:registracija.php?ww=n'); 
			}
			
			}
			

}
	

?>
		  
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-image: url(pozadina.jpg); height:550px; width:100%; background-size:cover;>
      <div class="container">
        <h1 style="text-align: center; padding: 160px 0 25px 0; color: black; font-family: TwentiethCentury; font-size: 45px;">Najbolji planer za Vaše sljedeće putovanje!</h1>
        <p><a class="btn btn-primary btn-lg" href="#" role="button"  style="padding: 10px 15px; text-align: center; text-decoration: none; display: block; 
		width: 20%; margin: 0 auto; cursor: pointer;">Pročitaj više</a></p>
      </div>
    </div>

    <div class="container">
      
      <div class="row">
        <div>
          <h2>Preporučene destinacije</h2>
           <a href="#"><img src="blagaj.jpg" style="width:350px;height:250px;"> </a>
		  <a href="#"><img src="konjic.jpg" style="width:350px;height:250px;"></a>
          <p><a class="btn btn-default" href="#" role="button">Pogledaj sve destinacije &raquo;</a></p>
        </div>
        <div>
          <h2>Popularne destinacije</h2>
          <a href="#"><img src="sarajevo.jpg" style="width:350px;height:250px;"> </a>
		  <a href="#"><img src="mostar.jpg" style="width:350px;height:250px;"></a>
          <p><a class="btn btn-default" href="#" role="button">Pogledaj sve destinacije &raquo;</a></p>
       </div>
        <!--<div>
          <h2>Prevoznici</h2>
          <p>  </p>
          <p><a class="btn btn-default" href="#" role="button">Vidi više &raquo;</a></p>
        </div>-->
      </div>

      <hr>

       <div style="font-size: 15px; color: #c9c9c9; border-top: 1px solid #efefef; padding: 13px 0; text-align: center; margin: 100px 0 0 0;">
		<p>&copy; Planer za putovanja. Sva prava zadržana</p>
		</div>
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
