<?php

	$cal = Array();
	
	include "../base/conexao.php";
	
	$q	=	substr($_GET['calcado'],0, strpos($_GET['calcado'],' -'));
	
	$sql  = "select qtde_estoque from calcado where cod_cal = '".$q."';";

	$dados = mysql_query($sql)or die(mysql_error());
	
	$rs = mysql_fetch_array($dados);
	$cal['qtde_estoque'] = $rs[0];
	
	echo json_encode($cal);
?>