<?php
// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
      header("Location: index.php"); exit;
  }
   
  // Tenta se conectar ao servidor MySQL
  mysql_connect('localhost', 'root', '') or trigger_error(mysql_error());
  // Tenta se conectar a um banco de dados MySQL
  mysql_select_db('projeto') or trigger_error(mysql_error());

mysql_query("SET NAMES 'utf8'");
    mysql_query('SET character_set_connection=utf8');
    mysql_query('SET character_set_client=utf8');
    mysql_query('SET character_set_results=utf8');
   
  $usuario = mysql_real_escape_string($_POST['usuario']);
  $senha = mysql_real_escape_string($_POST['senha']);

  // Validação do usuário/senha digitados
  $sql = "SELECT id, mat_func, usuario, nivel FROM usuario WHERE (usuario = '".$usuario ."') AND (senha = '". sha1($senha) ."') AND (ativo = 1) LIMIT 1";

  $query = mysql_query($sql);
  if (mysql_num_rows($query) != 1) {

      header("Location: ../index.php?msg=1"); exit;
  } else {
      
      // Salva os dados encontados na variável $resultado
      $resultado = mysql_fetch_assoc($query);
	  
	   // Se a sessão não existir, inicia uma
      if (!isset($_SESSION)) session_start();
      
       $sql2 = "SELECT  u.mat_func, f.nome_func from usuario u, funcionario f where u.mat_func = f.mat_func and f.mat_func = ".$resultado['mat_func'].";";
       $query2 = mysql_query($sql2);
       $resultado2 = mysql_fetch_array($query2);
   
      // Salva os dados encontrados na sessão
      $_SESSION['UsuarioID'] = $resultado['id'];
      $_SESSION['UsuarioNome'] = $resultado2['nome_func'];
      $_SESSION['UsuarioNivel'] = $resultado['nivel'];
	  
      // Redireciona o visitante
	  header("Location: ../principal.php"); 
			
	  exit;
  }
?>