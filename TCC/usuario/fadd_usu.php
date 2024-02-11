<?php
$nivel_necessario = 4;

		if (!isset($_SESSION)) session_start();
		
		if ($_SESSION['UsuarioNivel'] < $nivel_necessario) {
			  session_destroy();
			  header("Location: ../index.php?msg=2"); exit;
		}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <link rel="shortcut icon" href="../logo/logo_icon.ico" type="image/x-icon" />
        <link rel="icon" href="../logo/logo_icon.ico" type="image/x-icon" />
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<meta name="viewport" content="width=device-width, initial-scale=1">
    
		<title>Cadastrar Usuário</title>

      	<link href="../css/bootstrap.min.css" rel="stylesheet">
      	<link href="../css/style.css" rel="stylesheet">
        <link href="../css/jquery.autocomplete.css" rel="stylesheet">



	</head>

	<body> 

	<?php include "../base/navbartop.php"; ?>
	
	<div id="main" class="container-fluid">

	<br><h3 class="page-header">Cadastrar Usuário</h3>
	<form action="insere_usu.php" method="post">
	  	  
	<!-- area de campos do form -->

	<!-- 1ª LINHA -->	

	<div class="row"> 
	
		<div class="form-group col-sm-1 col-xs-12">
			<label for="id">ID</label>
			<input type="text" disabled="disabled" value="0" class="form-control" name="id">
		</div>
		
		<div class="form-group col-sm-5 col-xs-12">
			<label for="nome">Nome do Funcionário</label>
			<input type="text" class="form-control" name="funcionario" id="funcionario">
		</div>
		
		<div class="form-group col-sm-3 col-xs-12">
			<label for="usuario">Usuário</label>
			<input type="text" class="form-control" name="usuario" id="usuario">
		</div>
		
		<div class="form-group col-sm-3 col-xs-12">
			<label for="senha">Senha</label>
			<input type="password" class="form-control" name="senha" id="senha">
		</div>
		
	</div>
	
	<!-- 2ª LINHA -->	

	<div class="row"> 
	
		

		<div class="form-group col-sm-2 col-xs-12">
			<label for="nivel">Nível</label>
			<select class="form-control" name="nivel" id="nivel">
                <option value="1" >Comercial</option>
                <option value="2" >Compras</option>
				<option value="3" >Logística</option>
				<option value="4">Recursos Humanos</option>
				<option value="5">Gerencial</option>		
			</select>
		</div>
		
		<div class="form-group col-sm-3 col-xs-12">
			<label for="dt_cad">Data do cadastro</label>
			<input type="text" disabled="disabled" class="form-control" value="<?php echo date('d/m/Y'); ?>" name="dt_cad" id="dt_cad">
		</div>

		<div class="form-group col-sm-2 col-xs-12">
			<label for="ativo">Ativo</label><br>
			<label class="radio-inline">
				<input type="radio" name="optativo" checked disabled >Sim
			</label>
			<label class="radio-inline">
				<input type="radio" name="optativo" disabled>Não
			</label>
		</div>

	</div>

	<hr />
	
		<div id="actions" class="row">
			<div class="col-xs-12">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="lista_usu.php" class="btn btn-default">Cancelar</a>
			</div>
		</div>
	</form> 
	</div>
        <script src="../js/jquery.js"></script>
      	<script src="../js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
		<script type="text/javascript" src="../js/funcao.js"></script>
		<?php include "script.php"; ?>
</body>
</html>