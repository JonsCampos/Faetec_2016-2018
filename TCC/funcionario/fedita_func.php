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
			
            <title>Editar Funcionário</title>
        
		<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" >
		<link href="../css/style.css" rel="stylesheet" type="text/css" >
	</head>

	<?php
		include "../base/conexao.php";

		$mat_func = (int) $_GET['mat_func'];
		$sql = mysql_query("select * from funcionario where mat_func = '".$mat_func."';");
		$row = mysql_fetch_array($sql);
	?>

<body>
	<?php include "../base/navbartop.php"; ?>

	<div id="main" class="container-fluid">
	
	<br><br><h3 class="page-header">Editar registro do Funcionário - <?php echo $mat_func;?></h3>
	
	<!-- Área de campos do formulário de edição-->
	
	<form action="atualiza_func.php?mat_func=<?php echo $row['mat_func']; ?>" method="post">

	<!-- 1ª LINHA -->	
	<div class="row"> 
		
		<div class="form-group col-sm-1 col-xs-12">
			<label for="mat_func">Matrícula</label>
			<input readonly type="text" class="form-control" name="mat_func" value="<?php echo $row["mat_func"]; ?>">
		</div>
		
		<div class="form-group col-sm-4 col-xs-12">
			<label for="nome_func">Nome do Funcionário</label>
			<input type="text" class="form-control" name="nome_func" value="<?php echo $row["nome_func"]; ?>">
		</div>
		
		<div class="form-group col-sm-3 col-xs-12">
			<label for="cpf_func">CPF</label>
			<input type="text" class="form-control" name="cpf_func" value="<?php echo $row["cpf_func"]; ?>">
		</div>
		
		<div class="form-group col-sm-3 col-xs-12">
			<label for="rg">RG</label>
			<input type="text" class="form-control" name="rg" id="rg" value="<?php echo $row["rg"]; ?>">
		</div>
		
	</div>
        
    <div class="row">
        <div class="form-group col-sm-2 col-xs-12">
			<label for="dt_nasc">Data de Nascimento</label>
			<input type="date" class="form-control" name="dt_nasc" id="dt_nasc"value="<?php echo $row["dt_nasc"]; ?>">
		</div>
        
        <div class="form-group col-sm-3 col-xs-12">
			<label for="marca">E-mail</label>
			<input type="text" class="form-control" name="email" id="email"value="<?php echo $row["email"]; ?>">
		</div>
        
        <div class="form-group col-sm-3 col-xs-12">
			<label for="telefone">Telefone</label>
			<input type="text" class="form-control" name="telefone" id="telefone"value="<?php echo $row["telefone"]; ?>">
		</div>
        
        <div class="form-group col-sm-3 col-xs-12">
			<label for="cargo">Cargo</label>
			<input type="text" class="form-control" name="cargo" id="cargo"value="<?php echo $row["cargo"]; ?>">
		</div>
    </div>
    
    <div class="row">   
        <div class="form-group col-sm-3 col-xs-12">
			<label for="cor">Sexo</label><br>
			<label class="radio-inline">
				<input type="radio" name="sexo" value="0" <?php echo ($row["sexo"] == 0) ?  "checked" : "";?> />Feminino
			</label>
			<label class="radio-inline">
				<input type="radio" name="sexo" value="1" <?php echo ($row["sexo"] == 1) ?  "checked" : "";?> />Masculino
			</label>
		</div>    
    </div>

</div>
	
	<hr/>
	<div id="actions" class="row">
	 <div class="col-md-12">
		<a href="lista_func.php" class="btn btn-default">Voltar</a>
		<button type="submit" class="btn btn-primary">Salvar Alterações</button>
	 </div>
	</div>
</div>
	<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/funcao.js"></script>

	</body>
</html>