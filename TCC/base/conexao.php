<?php
	$conexao = @mysql_connect("localhost", "root", "") or die(mysql_error()) ; 
	$db = @mysql_select_db("projeto") or die(mysql_error());

    mysql_query("SET NAMES 'utf8'");
    mysql_query('SET character_set_connection=utf8');
    mysql_query('SET character_set_client=utf8');
    mysql_query('SET character_set_results=utf8');
?>