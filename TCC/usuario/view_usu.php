<?php
$nivel_necessario = 3;

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
			<title>Visualizar Usuário</title>
				<link href="../css/bootstrap.min.css" rel="stylesheet">
				<link href="../css/style.css" rel="stylesheet">

	</head>

		<body>

				<?php	include "../base/conexao.php";
						
						$id = (int) $_GET['id'];
						$sql = mysql_query("select * from usuario u, funcionario f  where f.mat_func = u.mat_func and id = '".$id."';");
						$row = mysql_fetch_array($sql);
				?>

			<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
			<script src="../js/jquery.js"></script>
			<script src="../js/bootstrap.min.js"></script>
			<script src="../js/funcao.js"></script>

			<?php include "../base/navbartop.php"; ?>	

			<div id="main" class="container-fluid">
				<br><br>
				  <h3 class="page-header">Visualizar registro da Usuários - <?php echo $id;?></h3>
				
				<!-- 1ª LINHA -->
				
				<div class="row">
					<div class="col-md-2">
						<p><strong>ID</strong></p>
						<p><?php echo $row['id'];?></p>
					</div>
			
					<div class="col-md-4">
						<p><strong>Nome do usuário</strong></p>
						<p><?php echo $row['nome_func'];?></p>
					</div>
			
					<div class="col-md-3">
						<p><strong>Usuário</strong></p>
						<p><?php echo $row['usuario']; ?></p>
					</div>
			
					<div class="col-md-3">
						<p><strong>Senha</strong></p>
						<p><?php echo $row['senha']; ?></p>
					</div>
				</div>
				
				<!-- 2ª LINHA -->
				
				<div class="row">
					
			
					<div class="col-md-2">
						<p><strong>Nível</strong></p>
						<p><?php switch($row['nivel'])
								{
								 case 1: echo "COMERCIAL";break;
                                 case 2: echo "COMPRAS";break;
								 case 3: echo "LOGÍSTICA";break;
                                 case 4: echo "RECURSOS HUMANOS";break;
								 case 5: echo "GERENCIAL";break;
								}
							?>
						</p>
					</div>
			
					<div class="col-md-4">
						<p><strong>Data do cadastro</strong></p>
						<p><?php echo date('d/m/Y',strtotime($row['dt_cadastro'])); ?></p>
					</div>
			
					<div class="col-md-2">
						<p><strong>Ativo</strong></p>
						<p><?php
							if($row["ativo"]==1){
								echo "SIM";
							}else if($row["ativo"]==0){
								echo "NÃO";
							}
						   ?>
						</p>
					</div>
				</div>
				

				<hr/>
				
				<div id="actions" class="row">
					<div class="col-md-12">
						<a href="lista_usu.php" class="btn btn-default">Voltar</a>
						<?php echo "<a href=fedita_usu.php?id=".$row['id']." class='btn btn-primary'>Editar</a>";?>
						<?php
							if($row["ativo"]==1){
								echo "<a href=block_usu.php?id=".$row['id']." class='btn btn-danger'>Bloquear</a>";
							}else if($row["ativo"]==0){
								echo "<a href=ativa_usu.php?id=".$row['id']." class='btn btn-success'>&nbsp;&nbsp;&nbsp;Ativar&nbsp;&nbsp;</a>";
							}
						   ?>
					</div>
				</div>
			</div>
		</body>
</html>