<?php
$nivel_necessario = 2;

		if (!isset($_SESSION)) session_start();
		
		if ($_SESSION['UsuarioNivel'] < $nivel_necessario) {
			  session_destroy();
			  header("Location: ../index.php?msg=2"); exit;
		}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <link rel="shortcut icon" href="../logo/logo_icon.ico" type="image/x-icon" />
        <link rel="icon" href="../logo/logo_icon.ico" type="image/x-icon" />
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<meta name="viewport" content="width=device-width, initial-scale=1">
    
			<title>Cadastrar Recibo</title>

      	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" >
      	<link href="../css/style.css" rel="stylesheet" type="text/css" >
		<link href="../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
	</head>
	<body> 

	<?php include "../base/navbartop.php"; ?>
	
	<div><?php include "mensagens.php"; ?></div>
	
	<div id="main" class="container-fluid">

	<br><h3 class="page-header">Cadastrar Recibo</h3>
	  	  
	<!-- area de campos do form -->
	<form action="insere_rec.php" method="post" autocomplete="off">
	
	<!-- 1ª LINHA -->	
	<div class="row"> 
		<div class="form-group col-sm-1 col-xs-12">
			<label for="cod_recibo">Código</label>
			<input type="text" disabled="disabled" value="0" class="form-control" name="cod_recibo">
		</div>
		<div class="form-group col-sm-3 col-xs-12">
			<label for="nr_rec_forn">Número do Recibo</label>
			<input type="text" class="form-control" name="nr_rec_forn" id="nr_rec_forn">
		</div>
		<div class="form-group col-sm-4 col-xs-12">
			<label for="fornecedor">Fornecedor</label>
			<input type="text" class="form-control" name="fornecedor" id="fornecedor">
		</div>
		
		<div class="form-group col-sm-2 col-xs-12">
			<label for="dt_emissao">Data da Emissão</label>
			<input type="date" class="form-control" name="dt_emissao" id="dt_emissao">
		</div>
		
		<div class="form-group col-sm-2 col-xs-12">
			<label for="ativo">Tipo</label><br>
			<label class="radio-inline">
				<input type="radio" name="tipo_recibo" value="0">Entrada
			</label>
			<label class="radio-inline">
				<input type="radio" name="tipo_recibo" value="1">Venda
			</label>
		</div>
		
	</div>

	<hr />
	
		<div id="actions" class="row">
			<div class="col-xs-12">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="lista_rec.php" class="btn btn-default">Cancelar</a>
			</div>
		</div>
	</form> 
	</div>
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
		<script type="text/javascript" src="../js/funcao.js"></script>
		<?php include "script.php"; ?>
</body>
</html>