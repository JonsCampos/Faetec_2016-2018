<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$dt_nf           			= $_POST["dt_nf"];
$nr_ped 					= substr($_POST["pedido"],0, strpos($_POST["pedido"],' -'));

$sql = "insert into nota_fiscal values ";
$sql .= "('0','$dt_nf', '$nr_ped');";

$resultado = mysql_query ($sql);

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_nota_fiscal.php?msg=1');
	mysql_close($conexao);
}else{
	echo "Erro ao inserir os dados:<br>".$sql;
}
?>