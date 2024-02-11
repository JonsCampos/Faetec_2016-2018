<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

// Usamos a @ pra suprimir alertas, já que o valor será verificado
$cod_saida = (int) @$_GET['cod_saida']; 
 
$sql = "delete from saida where cod_saida = '$cod_saida';";

$resultado = mysql_query ($sql)or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: saida.php?msg=3');
	mysql_close($conexao);
}else{
	echo "Erro ao Excluir os dados:<br>".$sql;
}
?>
