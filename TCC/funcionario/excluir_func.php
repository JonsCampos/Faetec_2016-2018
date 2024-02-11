<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

// Usamos a @ pra suprimir alertas, já que o valor será verificado
$mat_func = (int) @$_GET['mat_func']; 
 
$sql = "delete from funcionario where mat_func = '$mat_func';";

$resultado = mysql_query ($sql)or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_func.php?msg=3');
	mysql_close($conexao);
}else{
	echo "Erro ao Excluir os dados:<br>".$sql;
}
?>
