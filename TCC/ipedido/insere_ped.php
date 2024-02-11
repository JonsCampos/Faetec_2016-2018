<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";



$cod_cal			= substr($_POST["calcado"],0, strpos($_POST["calcado"],' -'));
$cod_forn			= substr($_POST["nome_forn"],0, strpos($_POST["nome_forn"],' -'));
$qtde_iped		    = $_POST["qtde_iped"];
$dt_iped			= implode("-", array_reverse(explode("/", $_POST["dt_ped"])));
$cod_ped    		= $_POST["cod_ped"];
    
$sql = "insert into ipedido values ";
$sql .= "('0','$cod_cal','$cod_forn', '$qtde_iped', '$dt_iped', '$cod_ped');";

$resultado = mysql_query($sql);

if($resultado && $resultado3){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
}else{
	echo "Erro ao inserir os dados:<br>".$sql;
	mysql_close($conexao);
}
?>