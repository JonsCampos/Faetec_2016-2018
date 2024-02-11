<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$cod_ped					= $_POST["cod_ped"];
$cod_forn					= substr($_POST["fornecedor"],0, strpos($_POST["fornecedor"],' -'));
$dt_ped					    = $_POST["dt_ped"];

$sql = "update pedido set ";
$sql .= "cod_forn='".$cod_forn."', dt_ped='".$dt_ped."' ";
$sql .= "where cod_ped = '".$cod_ped."';";

$resultado = mysql_query($sql);

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_ped.php?msg=2');
	mysql_close($conexao);
}else{
	echo "Erro ao Editar os dados:<br>".$sql;
}

?>
