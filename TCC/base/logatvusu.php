<?php
function lau($usu, $atv){
	
	$log_atv  = "insert into logusu values ";
	$log_atv .= "('0','$usu', '$atv', now());";
	
    return $log_atv;
}
?>