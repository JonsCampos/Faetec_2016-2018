<?php
$nivel_necessario = 1;

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
		<meta http-equiv="X-UA-Compatible" recent="IE=edge">
		<meta name="viewport" recent="width=device-width, initial-scale=1.0" />
			<title>Visualisar Nota Fiscal</title>
				<link href="../css/bootstrap.min.css" rel="stylesheet">
				<link href="../css/style.css" rel="stylesheet">
	</head>
		<body>
				<?php 	include "modal.html"; 
						include "../base/conexao.php";
						
						$cod_nf = (int) $_GET['cod_nf'];
						$sql = mysql_query("select * from nota_fiscal r, pedidos p where p.nr_ped = r.nr_ped and cod_nf = '".$cod_nf."';");
						$row = mysql_fetch_array($sql);
				?>

			<?php include "../base/navbartop.php"; ?>	

			<div id="main" class="container-fluid">
				<br><h3 class="page-header">Visualizar registro da Nota Fiscal - <?php echo $cod_nf;?></h3>
	
				<div class="row">
					<div class="col-md-1">
						<p><strong>Código da Nota Fiscal</strong></p>
						<p><?php echo $row['cod_nf'];?></p>
					</div>
			
					<div class="col-md-2">
						<p><strong>Data da Nota Fiscal</strong></p>
						<p><?php echo date('d/m/Y',strtotime($row['dt_nf'])); ?></p>
						
					</div>
			
					<div class="col-md-4">
						<p><strong>Numero do Pedido</strong></p>
						<p><?php echo $row["nr_ped"]." - ".$row["nr_ped"]; ?></p>
					</div>
				
				</div>

				<hr/>
				
				<div id="actions" class="row">
					<div class="col-md-12">
						<a href="lista_nota_fiscal.php" class="btn btn-default">Voltar</a>
						<?php echo "<a href=fedita_nota_fiscal.php?cod_nf=".$row['cod_nf']." class='btn btn-primary'>Editar</a>";?>
						<?php echo "<a class='btn btn-danger'  onclick='deletaDadoNf(".$row['cod_nf'].")' data-toggle='modal' href='#delete-modal'> Excluir </a>";?>
						
					</div>
				</div>
			</div>
			<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
			<script src="../js/jquery.js"></script>
			<script src="../js/bootstrap.min.js"></script>
			<script src="../js/funcao.js"></script>
		</body>
</html>