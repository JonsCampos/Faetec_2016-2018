<?php 
if(isset($_GET['msg'])){
	$msg = $_GET['msg'];
	
	switch($msg){
		case 1:
			echo '<div class="message"><div class="alert alert-warning"><a href=" " class="close" data-dismiss="alert">&times</a><center>Usuário não existe ou a senha está incorreta!<center></div></div>';
			break;
		case 2:
			echo '<div class="message"><div class="alert alert-danger"><a href=" " class="close" data-dismiss="alert">&times</a><center>Usuário sem permissão de acesso para o conteúdo!</center></div></div>';
			break;
	}
	$msg = 0;
}
?>
