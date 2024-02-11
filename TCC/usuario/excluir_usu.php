<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

// Usamos a @ pra suprimir alertas, já que o valor será verificado
$id = (int) @$_GET['id']; 
 
$sql = "delete from usuario where id = '$id';";

$resultado = mysql_query ($sql)or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_usu.php?msg=6');
	mysql_close($conexao);
}else{
	echo "Erro ao Excluir os dados:<br>".$sql;
}
?>
