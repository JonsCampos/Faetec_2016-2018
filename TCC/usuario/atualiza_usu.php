<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$id		  		= $_POST["id"];
$usuario		= $_POST["usuario"];
$nivel			= $_POST["nivel"];

$sql = "update usuario set ";
$sql .= "usuario='".$usuario."', nivel='".$nivel."', dt_cadastro=now() ";
$sql .= "where id = '".$id."';";


$resultado = mysql_query ($sql)or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_usu.php?msg=2');
	mysql_close($conexao);
}else{
	echo "Erro ao Editar os dados:<br>".$sql;
}


?>
