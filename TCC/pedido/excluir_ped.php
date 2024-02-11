<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

// Usamos a @ pra suprimir alertas, já que o valor será verificado
$cod_ped = (int) @$_GET['cod_ped']; 
 
$sql = "delete from pedido where cod_ped = '$cod_ped';";

$resultado = mysql_query ($sql) or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_ped.php?msg=3');
	mysql_close($conexao);
}else{
	echo "Erro ao inserir os dados:<br>".$sql;
}
?>
