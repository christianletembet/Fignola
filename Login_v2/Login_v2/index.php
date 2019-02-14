<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<?php
session_start();
try{
    $bdd = new PDO('mysql:host=localhost;dbname=fignola;charset=utf8','root','');
    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

}
catch (Exception $e){
    die('Erreur : ' .$e->getMessage());
}

if(isset($_POST['connexion'])){
    if (!empty($_POST['email']) && !empty($_POST['password'])){
        $cosql = $bdd->prepare('SELECT * FROM identifiant WHERE mail = ? AND password = ? ');
        $cosql->execute(array($_POST['email'],$_POST['password']));
        if ($cosql->rowCount()== 1){
			header('Location:connecte.php');
                exit();
            echo "connexion reussie";
        }
        else{
            echo 'Indentifiants incorrects';
        }
    }
    else{
        echo"Il faut remplir tous les champs ! ";
    }
}


?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">


				<form action="index.php" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Bienvenue
					</span>
					<img style="padding-left: 85px;" src="images/FIGNOLIA.png"> <img>
					<span class="login100-form-title p-b-48">
						
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Mot de passe"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<!-- <div class="login100-form-bgbtn"></div> -->
                            <input class ="login100-form-btn" type="submit" name="connexion"  value="Connexion">
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Vous n'avez pas de compte ? 
						</span>

						<a class="txt2" href="#">
							S'inscrire
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>