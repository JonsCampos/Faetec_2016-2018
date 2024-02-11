<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$cod_nf  					= $_POST["cod_nf"];
$dt_nf       				= $_POST["dt_nf"];
$nr_ped  					= substr($_POST["nr_ped"],0, strpos($_POST["nr_ped"],' -'));

$sql = "update nota_fiscal set ";
$sql .= "nr_ped='".$nr_ped."', dt_nf='".$dt_nf."' ";
$sql .= "where cod_nf = '".$cod_nf."';";

$resultado = mysql_query($sql);

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_nota_fiscal.php?msg=2');
	mysql_close($conexao);
}else{
	echo "Erro ao Editar os dados:<br>".$sql;
}

?>
