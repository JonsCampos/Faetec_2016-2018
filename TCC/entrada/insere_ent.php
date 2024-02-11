<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$money 					= array("R", "$", " ", ".");

$cod_cal			= substr($_POST["calcado"],0, strpos($_POST["calcado"],' -'));
$cod_forn			= substr($_POST["nome_forn"],0, strpos($_POST["nome_forn"],' -'));
$preco_entrada		= str_replace($money, "", trim($_POST["preco_entrada"]));
$preco_entrada		= str_replace( array(","), ".", $preco_entrada);
$qtde_entrada		= $_POST["qtde_entrada"];
$dt_entrada			= implode("-", array_reverse(explode("/", $_POST["dt_emissao"])));
$cod_recibo			= $_POST["cod_recibo"];
$qatu               = $_POST["estoque_atualizado"];
    
$sql = "insert into entrada values ";
$sql .= "('0','$cod_cal','$cod_forn', '$preco_entrada', '$qtde_entrada', '$dt_entrada', '$cod_recibo');";

$resultado = mysql_query($sql);

$sql2 = "update calcado set qtde_estoque = $qatu where cod_cal = $cod_cal;";

$resultado3 = mysql_query($sql2);

if($resultado && $resultado3){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
}else{
	echo "Erro ao inserir os dados:<br>".$sql;
	mysql_close($conexao);
}
?>