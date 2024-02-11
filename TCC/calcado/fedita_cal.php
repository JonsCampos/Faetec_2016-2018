<?php
$nivel_necessario = 2;

		if (!isset($_SESSION)) session_start();
		
		if ($_SESSION['UsuarioNivel'] < $nivel_necessario) {
			  session_destroy();
			  header("Location: ../index.php?msg=2"); exit;
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="../logo/logo_icon.ico" type="image/x-icon" />
        <link rel="icon" href="../logo/logo_icon.ico" type="image/x-icon" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<title>Editar Calçado</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" >
		<link href="../css/style.css" rel="stylesheet" type="text/css" >
	</head>

	<?php
		include "../base/conexao.php";

		$cod_cal = (int) $_GET['cod_cal'];
		$sql = mysql_query("select * from calcado where cod_cal = '".$cod_cal."';");
		$row = mysql_fetch_array($sql);
	?>

<body>
	<?php include "../base/navbartop.php"; ?>

	<div id="main" class="container-fluid">
	
	<br><br><h3 class="page-header">Editar registro do Caçado - <?php echo $cod_cal;?></h3>
	
	<!-- Área de campos do formulário de edição-->
	
	<form action="atualiza_cal.php?cod_cal=<?php echo $row['cod_cal']; ?>" method="post">

	<!-- 1ª LINHA -->	
	<div class="row"> 
		
		<div class="form-group col-sm-1 col-xs-12">
			<label for="cod_cal">Código</label>
			<input readonly type="text" class="form-control" name="cod_cal" value="<?php echo $row["cod_cal"]; ?>">
		</div>
		
		<div class="form-group col-sm-5 col-xs-12">
			<label for="nome_cal">Nome do Calçado</label>
			<input type="text" class="form-control" name="nome_cal" value="<?php echo $row["nome_cal"]; ?>">
		</div>
		
		<div class="form-group col-sm-3 col-xs-12">
			<label for="preco_atual">Preço</label>
			<input type="text" class="form-control" name="preco_atual" value="<?php echo $row["preco_atual"]; ?>">
		</div>
		
		<div class="form-group col-sm-3 col-xs-12">
			<label for="qtde_estoque">Quantidade no Estoque</label>
			<input type="text" class="form-control" name="qtde_estoque" id="qtde_estoque" value="<?php echo $row["qtde_estoque"]; ?>">
		</div>
		
	</div>
        
    <div class="row">
        <div class="form-group col-sm-3 col-xs-12">
			<label for="numero">Número</label>
			<input type="text" class="form-control" name="numero" id="numero"value="<?php echo $row["numero"]; ?>">
		</div>
        
        <div class="form-group col-sm-3 col-xs-12">
			<label for="marca">Marca</label>
			<input type="text" class="form-control" name="marca" id="marca"value="<?php echo $row["marca"]; ?>">
		</div>
        
        <div class="form-group col-sm-3 col-xs-12">
			<label for="modelo">Modelo</label>
			<input type="text" class="form-control" name="modelo" id="modelo"value="<?php echo $row["modelo"]; ?>">
		</div>
        
        <div class="form-group col-sm-3 col-xs-12">
			<label for="cor">Cor</label>
			<input type="text" class="form-control" name="cor" id="cor"value="<?php echo $row["cor"]; ?>">
		</div>    
    </div>

</div>
	
	<hr/>
	<div id="actions" class="row">
	 <div class="col-md-12">
		<a href="lista_cal.php" class="btn btn-default">Voltar</a>
		<button type="submit" class="btn btn-primary">Salvar Alterações</button>
	 </div>
	</div>
</div>
	<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/funcao.js"></script>

	</body>
</html>