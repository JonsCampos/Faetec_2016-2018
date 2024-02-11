<?php
$nivel_necessario = 1;

		if (!isset($_SESSION)) session_start();
		
		if ($_SESSION['UsuarioNivel'] < $nivel_necessario) {
			  session_destroy();
			  header("Location: ../../index.php"); exit;
		}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <link rel="shortcut icon" href="../../logo/logo_icon.ico" type="image/x-icon" />
        <link rel="icon" href="../../logo/logo_icon.ico" type="image/x-icon" />
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<meta name="viewport" content="width=device-width, initial-scale=1">
    		
			<title>Relatório de Itens por Pedido</title>
  
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" >
      	<link rel="stylesheet" type="text/css" href="../../css/style.css" >
		<link rel="stylesheet" type="text/css" href="../../css/jquery.autocomplete.css" />
        
		<?php //include "../script.php"; ?>
		
		
	</head>
	<body>

		<?php include "../../base/navbartop.php"; ?>
		
		<div id="main" class="container-fluid">
		
			<br><h3 class="page-header">Relatório de Itens por Pedido</h3>

			<!-- area de campos do form -->
				<form action="lista_recnum.php" method="post" autocomplete="off">
				
					<div class="row"> 
							
						<div class="form-group col-sm-6 col-xs-12">
							<label for="cod_ped">Pedido</label>
							<input type="text" class="form-control" name="cod_ped" id="cod_ped">
						</div>
			
						<div class="form-group col-sm-2 col-xs-12">
							<p><label></label><br>
							<button class="btn btn-primary" type="submit">Listar Itens</button>
						</div>
													
					</div>
				
				</form> 
		</div>
		<script type="text/javascript" src="../../js/jquery.js"></script>
		<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../../js/jquery.autocomplete.js"></script>
		<script type="text/javascript" src="../../js/funcao.js"></script>
	</body
</html>