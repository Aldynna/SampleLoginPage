<?php

require 'dbconfig/config.php';
if (isset($_GET['ww'])&&(($_GET['ww'])=="n") )
{
	
	echo '<script type="text/javascript"> alert("Korisnik ne postoji. Izvrsite registraciju") </script>';
}

if(isset($_POST['btn-signup']))
{
		
	$username = $_POST['display_name'];
	$ime = $_POST['first_name'];
	$prez = $_POST['last_name'];
	$password = $_POST['password'];
	$mail = $_POST['email'];
	$cpassword = $_POST['password_confirmation'];
	if($password==$cpassword)
	{
		$query= "select * from korisnik WHERE username='$username'";
		$query_run = mysqli_query($conn,$query) or die("I cannot connect to the database because: " . mysqli_error($conn));;
		if(mysqli_num_rows($query_run)>0)
		{
				echo '<script type="text/javascript"> alert("Username je u upotrebi, pokusajte drugi...") </script>';
		} 
		
		else
		{
			$hashed = hash('sha512', $password);
			$query= "insert into korisnik (username,ime,prezime,mail,password) values('$username','$ime','$prez','$mail','$hashed')";
			$query_run = mysqli_query($conn,$query);
			if($query_run)
			{	
				echo '<script type="text/javascript"> alert("Korisnik uspjesno registrovan..") </script>';
				
				header('location:pocetna.php?novi=nn');
			}
			else
			{
				echo '<script type="text/javascript"> alert("Doslo je do greske, molimo Vas pokusajte opet kasnije!") </script>';
			}
		}
	
	}else
	{
			echo '<script type="text/javascript"> alert("Password i confirm password se ne podudaraju!!") </script>';
	}

	
}	

?>
<!DOCTYPE html>
<html>
<head>
<title>Registracija korisnika</title>
<link rel="icon" href="imgs/logo.png" type="image/png">
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

<body style="background-image: url(pozadinareg.jpg); background-size:cover;">

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
       
      </div>
    </nav>

<div class="container" style="margin-top:80px;">

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <form role="form" method="post"  >
                <h2>Registriraj se</h2>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="Ime" tabindex="1">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Prezime" tabindex="2">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Korisničko ime" tabindex="3">
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="E-mail adresa" tabindex="4">
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Potvrdite Password" tabindex="6">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-sm-3 col-md-3">
					<span class="button-checkbox">
						<button type="button" class="btn" data-color="info" tabindex="7">Slažem se</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
					</span>
                    </div>
                    <div class="col-xs-8 col-sm-9 col-md-9">
                        Klikom na <strong class="label label-primary">Registriraj se</strong>, slažete se sa <a href="#" data-toggle="modal" data-target="#t_and_c_m">Pravilima i Uslovima</a> naše web stranice.
                    
</div>
                </div>

                <hr class="colorgraph">
                <div class="row">

                    <div class="col-xs-12 col-md-6"><button type="submit" name="btn-signup" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7">Registriraj se</button></div>
                    <div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg" onclick=location.href='pocetna.php'>Prijavi se</a></div>

                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Pravila i uslovi koristenja</h4>
                </div>
                <div class="modal-body">
                    
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Slažem se</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<div style="font-size: 15px; color: #c9c9c9; border-top: 1px solid #efefef; padding: 13px 0; text-align: center; margin: 100px 0 0 0;">
		<p>&copy; Planer za putovanja. Sva prava zadržana</p>
		</div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

</body>
</html>