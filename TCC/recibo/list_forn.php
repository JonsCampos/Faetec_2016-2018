<?php

include "../base/conexao.php";

$q = trim($_GET['q']);
if (!$q) return;

$sql = "select cod_forn, nome_forn from fornecedor where nome_forn like '%".$q."%'";

$rsd = mysql_query($sql);

while($rs = mysql_fetch_array($rsd)) {
	$cnome_forn 	= $rs['nome_forn'];
	$ccod_forn = $rs['cod_forn'];
	echo "$ccod_forn - $cnome_forn\n";
	
}

?>