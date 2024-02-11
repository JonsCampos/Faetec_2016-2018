<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$cod_forn					= substr($_POST["fornecedor"],0, strpos($_POST["fornecedor"],' -'));
$nr_rec_forn				= $_POST["nr_rec_forn"];
$dt_emissao					= $_POST["dt_emissao"];
$tipo_recibo				= $_POST["tipo_recibo"];

$sql = "insert into recibo values ";
$sql .= "('0', '$cod_forn', '$nr_rec_forn', '$dt_emissao', '$tipo_recibo');";

$resultado = mysql_query ($sql);

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_rec.php?msg=1');
	mysql_close($conexao);
}else{
	echo "Erro ao inserir os dados:<br>".$sql;
}
?>