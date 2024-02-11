<?php
$nivel_necessario = 2;

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
        
    		<title>Cadastrar Fornecedor</title>
        
      	<link href="../css/bootstrap.min.css" rel="stylesheet">
      	<link href="../css/style.css" rel="stylesheet">
	</head>

	<body> 
      	<script src="../js/jquery.js"></script>
      	<script src="../js/bootstrap.min.js"></script>

		<?php include "../base/navbartop.php"; ?>
		
		<div id="main" class="container-fluid">

			<br><h3 class="page-header">Cadastrar Fornecedor</h3>

			<!-- area de campos do form -->
				<form action="insere_forn.php" method="post">
				
				<!-- 1ª LINHA -->	
				<div class="row"> 
					<div class="form-group col-sm-1 col-xs-12">
						<label for="cod_forn">Código</label>
						<input type="text" disabled="disabled" value="0" class="form-control" name="cod_forn">
					</div>
					
					<div class="form-group col-sm-3 col-xs-12">
						<label for="nome_forn">Nome do Fornecedor</label>
						<input type="text" class="form-control" name="nome_forn">
					</div>
					
					<div class="form-group col-sm-3 col-xs-12">
						<label for="telefone">Telefone</label>
						<input type="tel" class="form-control" name="telefone" id="telefone">
					</div>
					
                     <div class="form-group col-sm-2 col-xs-12">
						<label for="nome_contato">Nome do Contato</label>
						<input type="text" class="form-control" name="nome_contato">
					</div>
                    
					<div class="form-group col-sm-3 col-xs-12">
						<label for="cnpj">CNPJ</label>
						<input type="text" class="form-control" name="cnpj" id="cnpj">
					</div>
					
				</div>

				<hr />
				
				<!-- 2ª LINHA -->
				
				<div id="actions" class="row">
					<div class="col-xs-12">
						<button type="submit" class="btn btn-primary">Salvar</button>
						<a href="lista_forn.php" class="btn btn-default">Cancelar</a>
					</div>
				</div>
			</form> 
		</div>
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/jquery.inputmask.bundle.js"></script>
		<script type="text/javascript" src="../js/script_mask.js"></script>
		
	</body>
</html>