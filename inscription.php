<!DOCTYPE html>
<html lang="en">
<?php
      session_start();
     include_once './database.php';
     $database = new Database();
     $db = $database->getConnection();
     if (isset($_POST['btnsave'])) {	
      $fname= $_POST['nom'];
      $lname= $_POST['prenom'];
      $pnumber= $_POST['phone'];
      $email= $_POST['email'];
      $password= $_POST['pass'];
	  $localisation=$_POST['ville'];
	  $client = $db->query('SELECT * from client')->fetchAll(PDO::FETCH_OBJ);
      $size3 = sizeof($client);
	  $q="INSERT INTO client (Id, nom, prenom, telephone, localisation, email, password) VALUES ($size3+1, '$fname', '$lname', '$pnumber', '$localisation', '$email', '$password')";
      $db->exec($q);  
	  echo('Good');
	  $client2 = $db->query('SELECT * from client where email = "'.$email.'" and password = "'.$password.'"')->fetchAll(PDO::FETCH_OBJ);
	  $size1 = sizeof($client2);
      if($size1 > 0){
		if($client[0]->email=="admin@admin.com"){
			$_SESSION["active"] = true;
			$_SESSION["email"] = $client2[0]->email;
			$_SESSION["userId"] = $client2[0]->Id;	
			$_SESSION["type"] = "administrateur";			
			echo("<script>alert('Connexion reusie');</script>");
			header("Location: ./homeAdmin.php?idadmin=".$client2[0]->Id);
			exit();
		}else{
			$_SESSION["active"] = true;
			$_SESSION["email"] = $client2[0]->email;
			$_SESSION["userId"] = $client2[0]->Id;
			$_SESSION["type"] = "client";				
			echo("<script>alert('Connexion reusie');</script>");
			header("Location: ./home.php?idclient=".$client2[0]->Id);
			exit();
		}                     
		}else{echo("<script>alert('Echec');</script>");
			$_SESSION["active"] = false;}
      }
    ?>
<head>
	<title>Inscription</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title">
						Member Inscription
					</span>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nom" placeholder="Nom">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="prenom" placeholder="Prenom">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid telephone is required: x.xxx.xxx.xx">
						<input class="input100" type="text" name="phone" placeholder="Phone number">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid ville is required">
						<input class="input100" type="text" name="ville" placeholder="Ville">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-list" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btnsave">
							Create
						</button>
					</div>

					

					<div class="text-center p-t-136">
						<a class="txt2" href="./login.php">
							Login account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>