<?php
session_start();
$usuario = $_SESSION['UsuarioNome'];

include "../base/conexao.php";
include "../base/logatvusu.php";

$mat_func			= $_POST["mat_func"];
$nome_func			= $_POST["nome_func"];
$cpf_func		    = $_POST["cpf_func"];
$rg		            = $_POST["rg"];
$dt_nasc		    = $_POST["dt_nasc"];
$telefone		    = $_POST["telefone"];
$email  	        = $_POST["email"];
$cargo		        = $_POST["cargo"];
$sexo		        = $_POST["sexo"];

$sql = "update funcionario set ";
$sql .= "nome_func='".$nome_func."', cpf_func='".$cpf_func."',
rg='".$rg."', dt_nasc='".$dt_nasc."', telefone='".$telefone."', email='".$email."', cargo='".$cargo."', sexo='".$sexo."' ";
$sql .= "where mat_func = '".$mat_func."';";

$resultado = mysql_query ($sql)or die(mysql_error());

if($resultado){
	$resultado2 = mysql_query (lau($usuario, str_replace( array("'"), "\'", $sql)));
	header('Location: lista_func.php?msg=2');
	mysql_close($conexao);
}else{
	echo "Erro ao Editar os dados:<br>".$sql;
}
?>