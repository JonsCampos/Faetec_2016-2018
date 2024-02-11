<?php

include "../base/conexao.php";

$q = trim($_GET['q']);
if (!$q) return;

$sql = "select mat_func, nome_func from funcionario where nome_func like '%".$q."%'";

$rsd = mysql_query($sql);

while($rs = mysql_fetch_array($rsd)) {
	$cnome_func 	= $rs['nome_func'];
	$cmat_func = $rs['mat_func'];
	echo "$cmat_func - $cnome_func\n";
	
}

?>
