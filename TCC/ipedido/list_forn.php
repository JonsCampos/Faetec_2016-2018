<?php
	$forn = Array();
	
	include "../base/conexao.php";

	$q = $_GET['cod_ped'];
	
	$sql  = "select r.cod_ped, r.cod_forn, f.nome_forn, r.dt_ped, r.cod_ped from fornecedor f, pedido r ";
	$sql .= "where f.cod_forn = r.cod_forn and r.cod_ped = '".$q."';";

	$dados = mysql_query($sql)or die(mysql_error());
	
	if(mysql_num_rows($dados)== 1){
		$rs = mysql_fetch_array($dados);
		$forn['cod_forn']	= $rs[1];
		$forn['nome_forn'] 	= $rs[2];
		$forn['dt_ped']	= date('d/m/Y', strtotime($rs[3]));
		$forn['cod_ped'] = $rs[4];
		echo json_encode($forn);
	}else{
		$forn[0] = '0';
		echo json_encode($forn);
	}
	
?>