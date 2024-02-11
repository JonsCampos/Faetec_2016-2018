<?php

include "../base/conexao.php";

$q = trim($_GET['q']);
if (!$q) return;

$sql = "select nr_ped from pedidos where nr_ped like '%".$q."%'";

$rsd = mysql_query($sql);

while($rs = mysql_fetch_array($rsd)) {
	$cnr-ped 	= $rs['nr_ped'];
	echo "$nr_ped\n";
	
}

?>