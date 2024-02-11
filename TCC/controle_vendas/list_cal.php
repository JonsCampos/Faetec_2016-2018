<?php

include "../base/conexao.php";

$q = trim($_GET['q']);
if (!$q) return;

$sql = "select cod_cal, nome_cal from calcado where nome_cal like '%".$q."%'";

$rsd = mysql_query($sql);

while($rs = mysql_fetch_array($rsd)) {
	$cnome_cal 	= $rs['nome_cal'];
	$ccod_cal 		= $rs['cod_cal'];
	echo "$ccod_cal - $cnome_cal\n";
	
}

?>