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
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<title>Visualisar Pedido</title>
				<link href="../css/bootstrap.min.css" rel="stylesheet">
				<link href="../css/style.css" rel="stylesheet">
	</head>
		<body>
				<?php 	include "modal.html"; 
						include "../base/conexao.php";
						
						$cod_ped = (int) $_GET['cod_ped'];
						$sql = mysql_query("select * from pedido r, fornecedor f where f.cod_forn = r.cod_forn and cod_ped = '".$cod_ped."';");
						$row = mysql_fetch_array($sql);
				?>

			<?php include "../base/navbartop.php"; ?>	

			<div id="main" class="container-fluid">
				<br><br><h3 class="page-header">Visualizar registro de Pedido - <?php echo $cod_ped;?></h3>
	
				<div class="row">
					<div class="col-sm-12 col-md-1">
						<p><strong>Código</strong></p>
						<p><?php echo $row['cod_ped'];?></p> 
					</div>
			
					<div class="col-sm-12 col-md-4">
						<p><strong>Fornecedor</strong></p>
						<p><?php echo $row["cod_forn"]." - ".$row["nome_forn"]; ?></p>
					</div>

					<div class="col-sm-12 col-md-2">
						<p><strong>Data do Pedido</strong></p>
						<p><?php echo date('d/m/Y',strtotime($row['dt_ped'])); ?></p>
						
					</div>
				
				</div>

				<hr/>
				
				<div id="actions" class="row">
					<div class="col-md-12">
						<a href="lista_ped.php" class="btn btn-default">Voltar</a>
						<?php echo "<a href=fedita_ped.php?cod_ped=".$row['cod_ped']." class='btn btn-primary'>Editar</a>";?>
						<?php echo "<a class='btn btn-danger'  onclick='deletaDadoPed(".$row['cod_ped'].")' data-toggle='modal' href='#delete-modal'> Excluir </a>";?>
						
					</div>
				</div>
			</div>
			<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
			<script src="../js/jquery.js"></script>
			<script src="../js/bootstrap.min.js"></script>
			<script src="../js/funcao.js"></script>
		</body>
</html>