<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$nome_func			= $_POST["nome_func"];
$cpf_func		    = $_POST["cpf_func"];
$rg		            = $_POST["rg"];
$dt_nasc	        = $_POST["dt_nasc"];
$telefone		    = $_POST["telefone"];
$email		        = $_POST["email"];
$cargo		        = $_POST["cargo"];
$sexo		        = $_POST["sexo"];


$sql = "insert into funcionario values ";
$sql .= "('0','$nome_func','$cpf_func','$rg','$dt_nasc','$telefone','$email','$cargo','$sexo');";

$resultado = mysql_query ($sql)or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_func.php?msg=1');
	mysql_close($conexao);
}else{
	echo "Erro ao inserir os dados:<br>".$sql;
}
?>