<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$cod_fornecedor = (int) @$_GET['cod_forn'];
 
$sql = "delete from fornecedor where cod_forn = '$cod_fornecedor';";

$resultado = mysql_query($sql);

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_forn.php?msg=3');
	mysql_close($conexao);
}else{
	echo "Erro ao Editar os dados:<br>".$sql;
}
?>
