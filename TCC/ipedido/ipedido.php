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
			<title>Pedido de Calçados</title>
      	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" >
      	<link href="../css/style.css" rel="stylesheet" type="text/css" >
		<link href="../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
	</head>
    
 <?php
include "../base/conexao.php";

$sql = mysql_query("select max(cod_ped) from pedido;");
$row = mysql_fetch_array($sql);
?>
    
	<body onunload="SaveData()" onload="LoadData()"> 
	<br><br>
	<?php include "../base/navbartop.php"; ?>
	
	<div id="main" class="container-fluid">

	<h3 class="page-header">Pedido de calçados</h3>
	
	<div id="msg_alert"><?php include "mensagens.php"; ?></div>
  	  
	<!-- area de campos do form -->
	
	<form class="form-group" id="form_itens_rec" action="insere_ped.php" method="POST" autocomplete="off">
		<!-- 1ª LINHA -->	
		<div class="row">

			<div class="form-group col-sm-1 col-xs-12">
			<label for="cod_ped">Pedido</label>
				  <input type="text" readonly class="form-control" name="cod_ped" id="cod_ped" value="<?php echo $row["max(cod_ped)"]; ?>">
				  <input type="hidden" class="form-control" name="cod_ped" id="cod_ped">
			</div>

			<div class="form-group col-sm-4 col-xs-12">
				<label for="nome_forn">Fornecedor</label>
				<input type="text" class="form-control" disabled name="nome_forn" id="nome_forn">
				<input type="hidden" class="form-control" name="nome_forn" id="nome_forn">
			</div>
			
			<div class="form-group col-sm-2 col-xs-12">
				<label for="dt_ped">Data do Pedido</label>
				<input type="text" class="form-control" disabled name="dt_ped" id="dt_ped">
				<input type="hidden" class="form-control" name="dt_ped" id="dt_ped">
			</div>
		</div>
	
	
		<!-- // ÁREA PARA INCLUSÃO DOS ITENS DE PRODUTOS CONSTANTES DO RECIBO -->
	
		<h4>Itens do pedido</h4>

			<div class="row">
			
				<div class="form-group col-sm-3 col-xs-12">
					<label for="calcado">Calçado</label>
					<input type="text" class="form-control" name="calcado" id="calcado">
				</div>
                
                <div class="form-group col-sm-1 col-xs-12">
					<label for="numero">Tamanho</label>
					<input type="text" readonly class="form-control" name="numero" id="numero">
				</div>
				
				<div class="form-group col-sm-2 col-xs-12">
					<label for="qtde_iped">Quantidade</label>
					<input type="text" class="form-control" name="qtde_iped" id="qtde_iped" value="0">
				</div>
			
				<div class="form-group col-sm-1 col-xs-12">
					<label for="incluir_item">&nbsp;</label>
					<button type="submit" id="btn_incluir" class="form-control btn btn-info"><span class="glyphicon glyphicon-plus"></span> Incluir</button>
				</div>

			</div>
		<hr/>
		<div id="conteudo_pedido">
		<!-- Área de inclusão de dados via Ajax -->
		
		</div>
		<hr/>		
		<div id="actions" class="row">
			<div class="col-xs-12">
				<a href="lista_ped.php" class="btn btn-primary">Encerrar</a>
				<a href="../principal.php" class="btn btn-default">Cancelar</a>
			</div>
		</div>

	
	</form>
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
		<script type="text/javascript" src="../js/jquery.maskedinput.min.js"></script>
		<script type="text/javascript" src="../js/funcao.js"></script>
		<script type="text/javascript" src="../js/jquery_maskmoney.js"></script>
		
		<?php include "script.php";?>
		
</html>