<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$cod_fornecedor		= $_POST["cod_forn"];
$nome_fornecedor    = $_POST["nome_forn"];
$telefone		    = $_POST["telefone"];
$nome_contato       = $_POST["nome_contato"];
$cnpj	            = $_POST["cnpj"];

$sql = "update fornecedor set ";
$sql .= "nome_forn ='".$nome_fornecedor."', tel_forn ='".$telefone."', nome_contato ='".$nome_contato."', cnpj ='".$cnpj."' ";
$sql .= "where cod_forn = '".$cod_fornecedor."';";

$resultado = mysql_query ($sql)or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_forn.php?msg=2');
	mysql_close($conexao);
}else{
	echo "Erro ao Editar os dados:<br>".$sql;
}
?>
