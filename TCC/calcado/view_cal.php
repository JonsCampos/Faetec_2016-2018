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
			<title>Visualizar Calçado</title>
				<link href="../css/bootstrap.min.css" rel="stylesheet">
				<link href="../css/style.css" rel="stylesheet">
	</head>

		<body>

				<?php 	include "modal.html"; 
						include "../base/conexao.php";
						
						$cod_cal = (int) $_GET['cod_cal'];
						$sql = mysql_query("select * from calcado where cod_cal = '".$cod_cal."';");
						$row = mysql_fetch_array($sql);
				?>

			<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
			<script src="../js/jquery.js"></script>
			<script src="../js/bootstrap.min.js"></script>
			<script src="../js/funcao.js"></script>

			<?php include "../base/navbartop.php"; ?>	

			<div id="main" class="container-fluid">
				<br><br><h3 class="page-header">Visualizar registro do Calçado - <?php echo $cod_cal;?></h3>
	
				<div class="row">
					<div class="col-md-1">
						<p><strong>Código</strong></p>
						<p><?php echo $row['cod_cal'];?></p>
					</div>
			
					<div class="col-md-4">
						<p><strong>Nome do Calçado</strong></p>
						<p><?php echo $row['nome_cal'];?></p>
					</div>
			
					<div class="col-md-4">
						<p><strong>Preço</strong></p>
						<p>R$ <?php echo $row['preco_atual']; ?></p>
					</div>
			
					<div class="col-md-3">
						<p><strong>Quantidade no Estoque</strong></p>
		 				<p><?php echo $row['qtde_estoque']; ?></p>
					</div>
				</div>
                
                <div class="row">
                    <div class="col-md-1">
						<p><strong>Número</strong></p>
						<p><?php echo $row['numero']; ?></p>
					</div>
                    
					<div class="col-md-4">
						<p><strong>Marca</strong></p>
						<p><?php echo $row['marca'];?></p>
					</div>
			
					<div class="col-md-4">
						<p><strong>Modelo</strong></p>
						<p><?php echo $row['modelo'];?></p>
					</div>
			
					<div class="col-md-3">
						<p><strong>Cor</strong></p>
						<p><?php echo $row['cor']; ?></p>
					</div>    
				</div>

				<hr/>
				
				<div id="actions" class="row">
					<div class="col-md-12">
						<a href="lista_cal.php" class="btn btn-default">Voltar</a>
						<?php echo "<a href=fedita_cal.php?cod_cal=".$row['cod_cal']." class='btn btn-primary'>Editar</a>";?>
						<?php echo "<a class='btn btn-danger'  onclick='deletaDadocal(".$row['cod_cal'].")' data-toggle='modal' href='#delete-modal'> Excluir </a>";?>
						
					</div>
				</div>
			</div>
		</body>
</html>