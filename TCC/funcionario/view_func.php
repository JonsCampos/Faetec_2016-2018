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
			<title>Visualizar Funcionário</title>
				<link href="../css/bootstrap.min.css" rel="stylesheet">
				<link href="../css/style.css" rel="stylesheet">
	</head>

		<body>

				<?php 	include "modal.html"; 
						include "../base/conexao.php";
						
						$mat_func = (int) $_GET['mat_func'];
						$sql = mysql_query("select * from funcionario where mat_func = '".$mat_func."';");
						$row = mysql_fetch_array($sql);
				?>

			<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
			<script src="../js/jquery.js"></script>
			<script src="../js/bootstrap.min.js"></script>
			<script src="../js/funcao.js"></script>

			<?php include "../base/navbartop.php"; ?>	

			<div id="main" class="container-fluid">
				<br><br><h3 class="page-header">Visualizar registro do Funcionário - <?php echo $mat_func;?></h3>
	
				<div class="row">
					<div class="col-md-2">
						<p><strong>Matrícula</strong></p>
						<p><?php echo $row['mat_func'];?></p>
					</div>
			
					<div class="col-md-4">
						<p><strong>Nome do Funcionário</strong></p>
						<p><?php echo $row['nome_func'];?></p>
					</div>
			
					<div class="col-md-3">
						<p><strong>CPF</strong></p>
						<p><?php echo $row['cpf_func']; ?></p>
					</div>
			
					<div class="col-md-3">
						<p><strong>rg</strong></p>
						<p><?php echo $row['rg']; ?></p>
					</div>
				</div>
                
                <div class="row">
                    <div class="col-md-2">
						<p><strong>Data de Nascimento</strong></p>
						<p><?php echo date('d/m/Y',strtotime($row['dt_nasc'])); ?></p>
					</div>
                    
					<div class="col-md-4">
						<p><strong>E-mail</strong></p>
						<p><?php echo $row['email'];?></p>
					</div>
                    
                    <div class="col-md-3">
						<p><strong>Telefone</strong></p>
						<p><?php echo $row['telefone']; ?></p>
					</div>
			
					<div class="col-md-3">
						<p><strong>Cargo</strong></p>
						<p><?php echo $row['cargo'];?></p>
					</div>
                </div>
                
                <div class="row">
					<div class="col-md-3">
							<label for="sexo">Sexo</label><br>
						<label class="radio-inline">
							<input type="radio" name="sexo" value="0" disabled <?php echo ($row["sexo"] == 0) ?  "checked" : "";?> />Feminino
						</label>
						<label class="radio-inline">
							<input type="radio" name="sexo" value="1" disabled <?php echo ($row["sexo"] == 1) ?  "checked" : "";?> />Masculino
						</label>
					</div>    
				</div>

				<hr/>
				
				<div id="actions" class="row">
					<div class="col-md-12">
						<a href="lista_func.php" class="btn btn-default">Voltar</a>
						<?php echo "<a href=fedita_func.php?mat_func=".$row['mat_func']." class='btn btn-primary'>Editar</a>";?>
						<?php echo "<a class='btn btn-danger'  onclick='deletaDadoFunc(".$row['mat_func'].")' data-toggle='modal' href='#delete-modal'> Excluir </a>";?>
						
					</div>
				</div>
			</div>
		</body>
</html>