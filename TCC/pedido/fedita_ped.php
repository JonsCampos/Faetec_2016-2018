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
			<title>Editar Pedido</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" >
		<link href="../css/style.css" rel="stylesheet" type="text/css" >
		<link href="../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
	</head>

<?php
include "../base/conexao.php";

$cod_ped = (int) $_GET['cod_ped'];
$sql = mysql_query("select * from pedido r, fornecedor f where f.cod_forn = r.cod_forn and cod_ped = '".$cod_ped."';");
$row = mysql_fetch_array($sql);
?>

<body>
<?php include "../base/navbartop.php"; ?>

<div id="main" class="container-fluid">
	
	<br><br><h3 class="page-header">Editar registro do pedido - <?php echo $cod_ped;?></h3>
	
	<!-- Área de campos do formulário de edição-->
	
	<form action="atualiza_ped.php?cod_ped=<?php echo $row['cod_ped']." - ".$row['dt_ped']; ?>" method="post">

	<!-- 1ª LINHA -->	
	<div class="row"> 
		
		<div class="form-group col-sm-1 col-xs-12">
			<label for="cod_ped">Código</label>
			<input readonly type="text" class="form-control" name="cod_ped" value="<?php echo $row["cod_ped"]; ?>">
		</div>
		
		<div class="form-group col-sm-4 col-xs-12">
			<label for="fornecedor">Fornecedor</label>
			<input type="text" class="form-control" name="fornecedor" value="<?php echo $row["cod_forn"]." - ".$row["nome_forn"]; ?>">
		</div>
		
		<div class="form-group col-sm-2 col-xs-12">
			<label for="dt_ped">Data do Pedido</label>
			<input type="date" class="form-control" name="dt_ped" id="dt_ped" value="<?php echo $row['dt_ped']; ?>">
		</div>

 		</div>	

</div>

	<hr/>
	<div id="actions" class="row">
	 <div class="col-md-12">
		<a href="lista_ped.php" class="btn btn-default">Voltar</a>
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