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
    
			<title>Cadastrar Calçado</title>

      	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" >
      	<link href="../css/style.css" rel="stylesheet" type="text/css" >
	</head>
	<body> 

	<?php include "../base/navbartop.php"; ?>
	
	<div><?php include "mensagens.php"; ?></div>
	
	<div id="main" class="container-fluid">

	<br><h3 class="page-header">Cadastrar Calçado</h3>
	  	  
	<!-- area de campos do form -->
	<form action="insere_cal.php" method="post" autocomplete="off">
	
	<!-- 1ª LINHA -->	
	<div class="row"> 
		<div class="form-group col-sm-1 col-xs-12">
			<label for="cod_cal">Código</label>
			<input type="text" disabled="disabled" value="0" class="form-control" name="cod_cal" id="cod_cal">
		</div>
		<div class="form-group col-sm-5 col-xs-12">
			<label for="nome_cal">Nome do Calçado</label>
			<input type="text" class="form-control" name="nome_cal" id="nome_cal">
		</div>
		<div class="form-group col-sm-3 col-xs-12">
			<label for="preco">Preço</label>
			<input type="text" class="form-control" name="preco" id="preco">
		</div>
		
		<div class="form-group col-sm-3 col-xs-12">
			<label for="qtde_estoque">Quantidade no Estoque</label>
			<input type="text" readonly class="form-control" name="qtde_estoque" id="qtde_estoque" value="0">
		</div>
		
	</div>
        
    <div class="row">
        <div class="form-group col-sm-3 col-xs-12">
			<label for="numero">Número</label>
			<input type="text" class="form-control" name="numero" id="numero">
		</div>
        
        <div class="form-group col-sm-3 col-xs-12">
			<label for="marca">Marca</label>
			<input type="text" class="form-control" name="marca" id="marca">
		</div>
        
        <div class="form-group col-sm-3 col-xs-12">
			<label for="modelo">Modelo</label>
			<input type="text" class="form-control" name="modelo" id="modelo">
		</div>
        
        <div class="form-group col-sm-3 col-xs-12">
			<label for="cor">Cor</label>
			<input type="text" class="form-control" name="cor" id="cor">
		</div>  
    </div>

	<hr />
	
		<div id="actions" class="row">
			<div class="col-xs-12">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="lista_cal.php" class="btn btn-default">Cancelar</a>
			</div>
		</div>
	</form> 
	</div>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/funcao.js"></script>
	<script type="text/javascript" src="../js/jquery_maskmoney.js"></script>
	<script type="text/javascript" src="../js/script_mask.js"></script>
	</body>
</html>