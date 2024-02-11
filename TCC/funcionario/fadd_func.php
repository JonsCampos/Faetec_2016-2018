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

			<title>Cadastrar Funcionário</title>
        
      	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" >
      	<link href="../css/style.css" rel="stylesheet" type="text/css" >
	</head>
	<body> 

	<?php include "../base/navbartop.php"; ?>
	
	<div><?php include "mensagens.php"; ?></div>
	
	<div id="main" class="container-fluid">

	<br><h3 class="page-header">Cadastrar Funcionário</h3>
	  	  
	<!-- area de campos do form -->
	<form action="insere_func.php" method="post" autocomplete="off">
	
	<!-- 1ª LINHA -->	
	<div class="row"> 
		<div class="form-group col-sm-1 col-xs-12">
			<label for="mat_func">Matrícula</label>
			<input type="text" disabled="disabled" value="0" class="form-control" name="mat_func" id="mat_func">
		</div>
		<div class="form-group col-sm-5 col-xs-12">
			<label for="nome_func">Nome do Funcionário</label>
			<input type="text" class="form-control" name="nome_func" id="nome_func">
		</div>
		<div class="form-group col-sm-3 col-xs-12">
			<label for="cpf_func">CPF</label>
			<input type="text" class="form-control" name="cpf_func" id="cpf_func">
		</div>
		
		<div class="form-group col-sm-3 col-xs-12">
			<label for="rg">RG</label>
			<input type="text" class="form-control" name="rg">
		</div>	
	</div>
        
    <div class="row">
        <div class="form-group col-sm-3 col-xs-12">
			<label for="dt_nasc">Data de Nascimento</label>
			<input type="date" class="form-control" name="dt_nasc" id="dt_nasc">
		</div>
        
        <div class="form-group col-sm-3 col-xs-12">
			<label for="telefone">Telefone</label>
			<input type="text" class="form-control" name="telefone" id="telefone">
		</div>
        
        <div class="form-group col-sm-3 col-xs-12">
			<label for="email">E-mail</label>
			<input type="text" class="form-control" name="email" id="email">
		</div>
        
        <div class="form-group col-sm-3 col-xs-12">
			<label for="cargo">Cargo</label>
			<input type="text" class="form-control" name="cargo" id="cargo">
		</div> 
    </div>    
        
    <div class="row">
        <div class="form-group col-sm-3 col-xs-12">
			<label for="sexo">Sexo</label><br>
			<label class="radio-inline">
				<input type="radio" name="sexo" value="0">Feminino
			</label>
			<label class="radio-inline">
				<input type="radio" name="sexo" value="1">Masculino
			</label>
		</div>  
    </div>

	<hr />
	
		<div id="actions" class="row">
			<div class="col-xs-12">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="lista_func.php" class="btn btn-default">Cancelar</a>
			</div>
		</div>
	</form> 
	</div>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/funcao.js"></script>
	<script type="text/javascript" src="../js/jquery_maskmoney.js"></script>
    <script type="text/javascript" src="../js/jquery.inputmask.bundle.js"></script>
	<script type="text/javascript" src="../js/script_mask.js"></script>
    </body>
</html>