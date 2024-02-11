<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

// Usamos a @ pra suprimir alertas, já que o valor será verificado
$cod_nf = (int) @$_GET['cod_nf']; 
 
$sql = "delete from nota_fiscal where cod_nf = '$cod_nf';";

$resultado = mysql_query ($sql) or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_nota_fiscal.php?msg=3');
	mysql_close($conexao);
}else{
	echo "Erro ao inserir os dados:<br>".$sql;
}
?>
