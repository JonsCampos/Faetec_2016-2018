<?php 
if(isset($_GET['msg'])){
	$msg = $_GET['msg'];
	
	switch($msg){
		case 1:
			echo '<div class="message"><div class="alert alert-success"><a href=" " class="close" data-dismiss="alert">&times</a>Cadastro realizado com sucesso!</div></div>';
			break;
		case 2:
			echo '<div class="message"><div class="alert alert-info"><a href=" " class="close" data-dismiss="alert">&times</a>Registro atualizado com sucesso!</div></div>';
			break;
		case 3:
			echo '<div class="message"><div class="alert alert-danger"><a href=" " class="close" data-dismiss="alert">&times</a>Registro excluído com sucesso!</div></div>';
			break;
		case 4:
			echo '<div class="message"><div class="alert alert-danger"><a href=" " class="close" data-dismiss="alert">&times</a>Usuário sem permissão de acesso para o conteúdo!<br>Por favor, acesse com a permissão necessária.</div></div>';
			break;
	}
	$msg = 0;
}
?>
