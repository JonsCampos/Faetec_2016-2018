<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$cod_forn					= substr($_POST["fornecedor"],0, strpos($_POST["fornecedor"],' -'));
$dt_ped					    = $_POST["dt_ped"];

$sql = "insert into pedido values ";
$sql .= "('0', '$cod_forn', '$dt_ped');";

$resultado = mysql_query ($sql);

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: ../ipedido/ipedido.php');
	mysql_close($conexao);
}else{
	echo "Erro ao inserir os dados:<br>".$sql;
}
?>