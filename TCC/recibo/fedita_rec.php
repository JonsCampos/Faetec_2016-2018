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
			<title>Editar Recibo</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" >
		<link href="../css/style.css" rel="stylesheet" type="text/css" >
		<link href="../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
	</head>

<?php
include "../base/conexao.php";

$cod_recibo = (int) $_GET['cod_recibo'];
$sql = mysql_query("select * from recibo r, fornecedor f where f.cod_forn = r.cod_forn and cod_recibo = '".$cod_recibo."';");
$row = mysql_fetch_array($sql);
?>

<body>
<?php include "../base/navbartop.php"; ?>

<div id="main" class="container-fluid">
	
	<br><br><h3 class="page-header">Editar registro do Recibo - <?php echo $cod_recibo;?></h3>
	
	<!-- Área de campos do formulário de edição-->
	
	<form action="atualiza_rec.php?cod_recibo=<?php echo $row['cod_recibo']." - ".$row['nr_rec_forn']; ?>" method="post">

	<!-- 1ª LINHA -->	
	<div class="row"> 
		
		<div class="form-group col-sm-1 col-xs-12">
			<label for="cod_recibo">Código</label>
			<input readonly type="text" class="form-control" name="cod_recibo" value="<?php echo $row["cod_recibo"]; ?>">
		</div>
		
		<div class="form-group col-sm-3 col-xs-12">
			<label for="nr_rec_forn">Número do Recibo</label>
			<input type="text" class="form-control" name="nr_rec_forn" value="<?php echo $row["nr_rec_forn"]; ?>">
		</div>
		
		<div class="form-group col-sm-4 col-xs-12">
			<label for="fornecedor">Fornecedor</label>
			<input type="text" class="form-control" name="fornecedor" value="<?php echo $row["cod_forn"]." - ".$row["nome_forn"]; ?>">
		</div>
		
		<div class="form-group col-sm-2 col-xs-12">
			<label for="dt_emissao">Data da Emissão</label>
			<input type="date" class="form-control" name="dt_emissao" id="dt_emissao" value="<?php echo $row['dt_emissao']; ?>">
		</div>
		
		<div class="form-group col-sm-2 col-xs-12">
			<label for="ativo">Tipo</label><br>
			<label class="radio-inline">
				<input type="radio" name="tipo_recibo" value="0" <?php echo ($row["tipo_recibo"] == 0) ?  "checked" : "";?> />Entrada
			</label>
			<label class="radio-inline">
				<input type="radio" name="tipo_recibo" value="1" <?php echo ($row["tipo_recibo"] == 1) ?  "checked" : "";?> />Venda
			</label>
		</div>

 		</div>	

</div>
	
	<hr/>
	<div id="actions" class="row">
	 <div class="col-md-12">
		<a href="lista_rec.php" class="btn btn-default">Voltar</a>
		<button type="submit" class="btn btn-primary">Salvar Alterações</button>
	 </div>
	</div>
</div>
		<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
		<script type="text/javascript" src="../js/funcao.js"></script>
		
		<?php include "script.php"; ?>

</body>
</html>