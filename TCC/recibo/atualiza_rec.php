<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$cod_recibo					= $_POST["cod_recibo"];
$cod_forn					= substr($_POST["fornecedor"],0, strpos($_POST["fornecedor"],' -'));
$nr_rec_forn				= $_POST["nr_rec_forn"];
$dt_emissao					= $_POST["dt_emissao"];
$tipo_recibo				= $_POST["tipo_recibo"];

$sql = "update recibo set ";
$sql .= "cod_forn='".$cod_forn."', nr_rec_forn='".$nr_rec_forn."', dt_emissao='".$dt_emissao."', tipo_recibo='".$tipo_recibo."' ";
$sql .= "where cod_recibo = '".$cod_recibo."';";

$resultado = mysql_query($sql);

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_rec.php?msg=2');
	mysql_close($conexao);
}else{
	echo "Erro ao Editar os dados:<br>".$sql;
}

?>
