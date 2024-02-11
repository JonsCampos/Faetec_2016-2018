<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

// Usamos a @ pra suprimir alertas, já que o valor será verificado
//$cod_recibo = (int) @$_GET['cod_recibo']; 
 
$now = new DateTime();
$datetime = $now->format('Y-m-d H:i:s'); 

$sql = "insert into recibo values(0,12,1,'$datetime',1) ;";

$resultado = mysql_query ($sql)or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location:/projeto\controle_vendas\saida.php');
	mysql_close($conexao);
}else{
	echo "Erro ao Inserir os dados:<br>".$sql;
}
?>