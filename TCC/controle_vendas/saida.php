<?php
$nivel_necessario = 1;

		if (!isset($_SESSION)) session_start();
		
		if ($_SESSION['UsuarioNivel'] < $nivel_necessario) {
			  session_destroy();
			  header("Location: ../index.php?msg=4"); exit;
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
			<title>Venda de Calçados</title>
      	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" >
      	<link href="../css/style.css" rel="stylesheet" type="text/css" >
		<link href="../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
	</head>
    
     <?php
        include "../base/conexao.php";

        $sql = mysql_query("select max(cod_recibo) from recibo;");
        $row = mysql_fetch_array($sql);
    ?>
    
	<body onunload="SaveData()" onload="LoadData()"> 
	<br><br>
	<?php include "../base/navbartop.php"; ?>
	
	<div id="main" class="container-fluid">

	<h3 class="page-header">Venda de calçados da loja</h3>
	
	<div id="msg_alert"><?php include "mensagens.php"; ?></div>
  	  
	<!-- area de campos do form -->
	
	<form class="form-group" id="form_rec_saida" action="insere_saida.php" method="POST" autocomplete="off">
		<!-- 1ª LINHA -->	
		<div class="row">
		
			<div class="form-group col-sm-1 col-xs-12">
				<label for="cod_recibo">Recibo</label>
				  <input type="text" readonly class="form-control" name="cod_recibo" id="cod_recibo" value="<?php echo $row["max(cod_recibo)"]; ?>">
				  <input type="hidden" class="form-control" name="cod_recibo" id="cod_recibo">
			</div>
			
			<div class="form-group col-sm-4 col-xs-12">
				<label for="nome_forn">Fornecedor</label>
				<input type="text" class="form-control" disabled name="nome_forn" id="nome_forn">
				<input type="hidden" class="form-control" name="nome_forn" id="nome_forn">
			</div>
			
			<div class="form-group col-sm-2 col-xs-12">
				<label for="dt_emissao">Data de Emissão</label>
				<input type="text" class="form-control" disabled name="dt_emissao" id="dt_emissao">
				<input type="hidden" class="form-control" name="dt_emissao" id="dt_emissao">
			</div>
		</div>
	
	
		<!-- // ÁREA PARA INCLUSÃO DOS ITENS DE PRODUTOS CONSTANTES DO RECIBO -->
	
		<h4>Itens do recibo <small>  [Digite conforme a nota de venda]</small></h4>

			<div class="row">
			
				<div class="form-group col-sm-3 col-xs-12">
					<label for="calcado">Calçado</label>
					<input type="text" class="form-control" name="calcado" id="calcado">
				</div>
                
                <div class="form-group col-sm-1 col-xs-12">
					<label for="numero">Tamanho</label>
					<input type="text" readonly class="form-control" name="numero" id="numero">
				</div>
                
				<div class="form-group col-sm-1 col-xs-12">
					<label for="preco_saida">Preço</label>
					<input type="text" readonly class="form-control" name="preco_saida" id="preco_saida">
				</div>
				
				<div class="form-group col-sm-2 col-xs-12">
					<label for="qtde_saida">Quantidade</label>
					<input type="text" class="form-control" name="qtde_saida" id="qtde_saida" value="0">
				</div>
				
				<div class="form-group col-sm-2 col-xs-12">
					<label for="qtde_estoque">Estoque Atual</label>
					<input type="text" readonly class="form-control" name="qtde_estoque" id="qtde_estoque" value="0">
				</div>
				
				<div class="form-group col-sm-2 col-xs-12">
					<label for="estoque_atualizado">Estoque Atualizado</label>
					<input type="text" readonly class="form-control" name="estoque_atualizado" id="estoque_atualizado">
				</div>
			
				<div class="form-group col-sm-1 col-xs-12">
					<label for="incluir_item">&nbsp;</label>
					<button type="submit" id="btn_incluir" class="form-control btn btn-info"><span class="glyphicon glyphicon-plus"></span> Incluir</button>
				</div>

			</div>
		<hr/>
		<div id="crsaida">
		<!-- Área de inclusão de dados via Ajax -->
		
		</div>
		<hr/>		
		<div id="actions" class="row">
			<div class="col-xs-12">
				<a href="lista_saida.php" class="btn btn-primary">Encerrar</a>
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