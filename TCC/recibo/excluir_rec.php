<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

// Usamos a @ pra suprimir alertas, já que o valor será verificado
$cod_recibo = (int) @$_GET['cod_recibo']; 
 
$sql = "delete from recibo where cod_recibo = '$cod_recibo';";

$resultado = mysql_query ($sql) or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_rec.php?msg=3');
	mysql_close($conexao);
}else{
	echo "Erro ao inserir os dados:<br>".$sql;
}
?>
