<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

// Usamos a @ pra suprimir alertas, já que o valor será verificado
$cod_iped = (int) @$_GET['cod_iped']; 
 
$sql = "delete from ipedido where cod_iped = '$cod_iped';";

$resultado = mysql_query ($sql)or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: ipedido.php?msg=3');
	mysql_close($conexao);
}else{
	echo "Erro ao Excluir os dados:<br>".$sql;
}
?>
