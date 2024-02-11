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
			<title>Editar Usuário</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
	</head>

<?php
include "../base/conexao.php";

$id = (int) $_GET['id'];
$sql = mysql_query("select * from usuario u, funcionario f where f.mat_func = u.mat_func and id = '".$id."';");
$row = mysql_fetch_array($sql);
?>

<body>
<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->

<script src="../js/bootstrap.min.js"></script>

<?php include "../base/navbartop.php"; ?>

<div id="main" class="container-fluid">
	<br><br><h3 class="page-header">Editar registro da Usuário - <?php echo $id;?></h3>
	
	<!-- Área de campos do formulário de edição-->
	
	<form action="atualiza_usu.php?id=<?php echo $row['id']; ?>" method="post">

	<!-- 1ª LINHA -->	
	<div class="row"> 
		
		<div class="form-group col-sm-1 col-xs-12">
			<label for="id">ID</label>
			<input readonly type="text" class="form-control" name="id" value="<?php echo $row["id"]; ?>">
		</div>
		
		<div class="form-group col-sm-5 col-xs-12">
			<label for="nome">Nome do Funcionário</label>
			<input disabled="disabled" type="text" class="form-control" name="nome_func" value="<?php echo $row["nome_func"]; ?>">
		</div>
		
		<div class="form-group col-sm-3 col-xs-12">
			<label for="usuario">Usuário</label>
			<input type="text" class="form-control" name="usuario" value="<?php echo $row["usuario"]; ?>">
		</div>
		
		<div class="form-group col-sm-3 col-xs-12">
			<label for="senha">Senha</label>
			<input readonly type="text" class="form-control" name="senha" value="<?php echo $row["senha"]; ?>">
		</div>
	
	</div>	
	
	<!-- 2ª LINHA -->	
	<div class="row"> 
		
		
		
		<div class="form-group col-sm-2 col-xs-12">
			<label for="nivel">Nível</label>
			<select class="form-control" id="nivel" name="nivel">
                <option value="1"<?php if (!(strcmp(1, htmlentities($row['nivel'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Comercial</option>
                <option value="2"<?php if (!(strcmp(2, htmlentities($row['nivel'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Compras</option>
				<option value="3"<?php if (!(strcmp(3, htmlentities($row['nivel'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Logística</option>
				<option value="4"<?php if (!(strcmp(4, htmlentities($row['nivel'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Recursos Humanos</option>
				<option value="5"<?php if (!(strcmp(5, htmlentities($row['nivel'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Gerencial</option>		
			</select>
		</div>
		
		<div class="form-group col-sm-3 col-xs-12">
			<label for="dt_cad">Data da Edição</label>
			<input type="text" disabled="disabled" class="form-control" name="dt_cad" value="<?php echo date('d/m/Y'); ?>">
		</div>
		
		<div class="form-group col-sm-2 col-xs-12">
			<br><label for="ativo">Ativo</label><br>
			<?php
			if($row["ativo"]==1){
				echo "<label>SIM</label>";
			}else if($row["ativo"]==0){
				echo "<label>NÃO</label>";
			}
			?>
		</div>
	
	</div>

</div>
	
	<hr/>
	<div id="actions" class="row">
	 <div class="col-md-12">
		&nbsp&nbsp<a href="lista_usu.php" class="btn btn-default">Voltar</a>
		<button type="submit" class="btn btn-primary">Salvar Alterações</button>
	 </div>
	</div>
</div>
        <script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
		<script type="text/javascript" src="../js/funcao.js"></script>
		<?php include "script.php"; ?>

</body>
</html>