<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="utf-8">
        <link rel="shortcut icon" href="../projeto/logo/logo_icon.ico" type="image/x-icon" />
        <link rel="icon" href="../projeto/logo/logo_icon.ico" type="image/x-icon" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<title> Reisinger Calçados </title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>

	<?php 
        include "base/conexao.php";
		$nivel_necessario = 1;

		if (!isset($_SESSION)) session_start();
		
		if ($_SESSION['UsuarioNivel'] < $nivel_necessario) {
			  session_destroy();
			  header("Location: index.php?msg=2"); exit;
		}else{
			switch($_SESSION['UsuarioNivel']){
					case 1: 
						include "base/listamenuindexcomercial.html";
						break;
                    case 2: 
						include "base/listamenuindexcompras.html";
						break;
                    case 3: 
						include "base/listamenuindexlogistica.html";
						break;
					case 4: 
						include "base/listamenuindexrh.html";
						break;
					case 5: 
						include "base/listamenuindexgerencial.html";
						break;
			}
			
		}
	?>
        
		<div class="container">
			<div class="jumbotron fundologin" style="margin-top:20%">
				<div class="titpcp">
					<div class="titp1">REISINGER CALÇADOS</div>
					<div class="titp2">Sistema de Controle da Loja</div>
				</div>
			</div>
		</div><!-- /container -->

	</body>
	<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/login.js"></script>
</html>