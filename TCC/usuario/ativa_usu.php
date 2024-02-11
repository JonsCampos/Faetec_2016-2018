<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$id = (int) $_GET['id'];

$sql = "update usuario set ";
$sql .= "ativo='1' ";
$sql .= "where id = '".$id."';";

$resultado = mysql_query ($sql)or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_usu.php?msg=5');
	mysql_close($conexao);
}else{
	echo "Erro ao Editar os dados:<br>".$sql;
}

?>
