<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

// Usamos a @ pra suprimir alertas, já que o valor será verificado
$cod_cal = (int) @$_GET['cod_cal']; 
 
$sql = "delete from calcado where cod_cal = '$cod_cal';";

$resultado = mysql_query ($sql)or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_cal.php?msg=3');
	mysql_close($conexao);
}else{
	echo "Erro ao Excluir os dados:<br>".$sql;
}
?>
