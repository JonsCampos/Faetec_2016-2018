<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$cod_cal			= $_POST["cod_cal"];
$nome_cal			= $_POST["nome_cal"];
$preco_atual		= $_POST["preco_atual"];
$marca		        = $_POST["marca"];
$modelo		        = $_POST["modelo"];
$cor		        = $_POST["cor"];
$qtde_estoque		= $_POST["qtde_estoque"];
$numero		        = $_POST["numero"];

$sql = "update calcado set ";
$sql .= "nome_cal='".$nome_cal."', preco_atual='".$preco_atual."',
marca='".$marca."', modelo='".$modelo."', cor='".$cor."', qtde_estoque='".$qtde_estoque."', numero='".$numero."' ";
$sql .= "where cod_cal = '".$cod_cal."';";

$resultado = mysql_query ($sql)or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_cal.php?msg=2');
	mysql_close($conexao);
}else{
	echo "Erro ao Editar os dados:<br>".$sql;
}
?>