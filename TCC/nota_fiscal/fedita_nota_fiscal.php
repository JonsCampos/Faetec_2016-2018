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
			<title>Editar Nota Fiscal</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" >
		<link href="../css/style.css" rel="stylesheet" type="text/css" >
		<link href="../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
	</head>

<?php
include "../base/conexao.php";

$cod_nf = (int) $_GET['cod_nf'];
$sql = mysql_query("select * from nota_fiscal r, pedidos p where p.nr_ped = r.nr_ped and cod_nf = '".$cod_nf."';");
$row = mysql_fetch_array($sql);
?>

<body>
<?php include "../base/navbartop.php"; ?>

<div id="main" class="container-fluid">
	
	<br><h3 class="page-header">Editar registro da Nota Fiscal - <?php echo $cod_nf;?></h3>
	
	<!-- Área de campos do formulário de edição-->
	                                                                             <!--  -->
	<form action="atualiza_nota_fiscal.php?cod_nf=<?php echo $row['cod_nf']." - ".$row['dt_nf']; ?>" method="post">

	<!-- 1ª LINHA -->	
	<div class="row"> 
		
		<div class="form-group col-xs-1">
			<label for="cod_nf">Código da Nota Fiscal</label>
			<input readonly type="text" class="form-control" name="cod_nf" value="<?php echo $row["cod_nf"]; ?>">
		</div>
		
		<div class="form-group col-xs-3">
			<label for="dt_nf">Data da Nota Fiscal</label>
			<input type="date" class="form-control" name="dt_nf" value="<?php echo $row["dt_nf"]; ?>">
		</div>
		
		<div class="form-group col-xs-4">
			<label for="nr_ped">Numero do Pedido</label>
			<input type="text" class="form-control" name="nr_ped" value="<?php echo $row["nr_ped"]." - ".$row["nr_ped"]; ?>">
		</div>

 		</div>	

</div>
	
	<hr/>
	<div id="actions" class="row">
	 <div class="col-md-12">
		<a href="lista_nota_fiscal.php" class="btn btn-default">Voltar</a>
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