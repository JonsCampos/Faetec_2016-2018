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
			<title>Editar Fornecedor</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
	</head>

	<?php
		include "../base/conexao.php";
		$cod_fornecedor = (int) $_GET['cod_forn'];
		$sql = "select * from fornecedor where cod_forn = '".$cod_fornecedor."';";
		$resultado = mysql_query($sql);
		$row = mysql_fetch_array($resultado);
	?>

<body>

<?php include "../base/navbartop.php"; ?>

<div id="main" class="container-fluid">
	
<br><br><h3 class="page-header">Editar registro de Fornecedor - <?php echo $cod_fornecedor;?></h3>
	
<!-- Área de campos do formulário de edição-->
	
<form action="atualiza_forn.php?cod_forn=<?php echo $row['cod_forn']; ?>" method="post">

<!-- 1ª LINHA -->	
<div class="row"> 
	
	<div class="form-group col-sm-1 col-xs-12">
		<label for="cod_forn">Código</label>
		<input readonly type="text" class="form-control" name="cod_forn" value="<?php echo $row['cod_forn']; ?>">
	</div>
	
	<div class="form-group col-sm-3 col-xs-12">
		<label for="nome_forn">Nome do Fornecedor</label>
		<input type="text" class="form-control" name="nome_forn" value="<?php echo $row['nome_forn']; ?>">
	</div>
	
	<div class="form-group col-sm-2 col-xs-12">
		<label for="telefone">Telefone</label>
		<input type="tel" class="form-control" name="telefone" value="<?php echo $row['tel_forn']; ?>">
	</div>
    
    <div class="form-group col-sm-3 col-xs-12">
		<label for="nome_fcontato">Nome do Contato</label>
		<input type="text" class="form-control" name="nome_contato" value="<?php echo $row['nome_contato']; ?>">
	</div>
	
	<div class="form-group col-sm-3 col-xs-12">
		<label for="cnpj">CNPJ</label>
		<input type="text" class="form-control" name="cnpj" value="<?php echo $row['cnpj']; ?>">
	</div>
	
</div>
	
	<hr/>
	<div id="actions" class="row">
	 <div class="col-md-12">
		<a href="lista_forn.php" class="btn btn-default">Voltar</a>
		<button type="submit" class="btn btn-primary">Salvar Alterações</button>
	 </div>
	</div>
</div>
	
<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>