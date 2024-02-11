<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$money 					= array("R", "$", " ", ".");

$nome_cal			= $_POST["nome_cal"];
$preco				= str_replace($money, "", trim($_POST["preco"]));
$preco				= str_replace( array(","), ".", $preco);
$marca		        = $_POST["marca"];
$modelo		        = $_POST["modelo"];
$cor		        = $_POST["cor"];
$qtde_estoque		= $_POST["qtde_estoque"];
$numero		        = $_POST["numero"];


$sql = "insert into calcado values ";
$sql .= "('0','$nome_cal','$preco','$marca','$modelo','$cor','$qtde_estoque','$numero');";

$resultado = mysql_query ($sql)or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_cal.php?msg=1');
	mysql_close($conexao);
}else{
	echo "Erro ao inserir os dados:<br>".$sql;
}
?>