<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$nome_func 		= substr($_POST["funcionario"],0, strpos($_POST["funcionario"],' -'));
$usuario		= $_POST["usuario"];
$senha			= $_POST["senha"];
$nivel			= $_POST["nivel"];

$sql = "insert into usuario values ";
$sql .= "('0','$nome_func','$usuario', '".sha1($senha)."','$nivel','1', '".date('Y-m-d')."');";

$resultado = mysql_query ($sql) or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_usu.php?msg=1');
	mysql_close($conexao);
}else{
	echo "Erro ao inserir os dados:<br>".$sql;
}
?>