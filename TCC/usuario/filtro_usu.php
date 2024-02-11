<?php
$nivel_necessario = 3;

		if (!isset($_SESSION)) session_start();
		
		if ($_SESSION['UsuarioNivel'] < $nivel_necessario) {
			  session_destroy();
			  header("Location: ../index.php?msg=2"); exit;

		}
?>
<html>
    <head>
        <meta charset="utf-8">
    </head>
</html>
<div id="list" class="row">
	<div class="table-responsive col-xs-12">
		<?php
			include "../base/conexao.php";
	
			$data = mysql_query("select * from funcionario f, usuario u where u.mat_func = f.mat_func and usuario like '%".$_GET['usuario']."%' order by id asc;") or die(mysql_error()); 
			
			echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
			echo "<thead><tr>";
			echo "<td><center><strong>ID</strong></center></td>"; 
			echo "<td><center><strong>Nome do Funcionário</strong></center></td>"; 
			echo "<td><center><strong>Usuário</strong></center></td>";
			echo "<td><center><strong>Senha</strong></center></td>";
			echo "<td><center><strong>Nível</strong></center></td>";
			echo "<td><center><strong>Ativo</strong></center></td>";
			echo "<td><center><strong>Data cad/ed</strong></center></td>";
			echo "<td class='actions'><center><strong>Ações</strong></center></td>"; 
			echo "</tr></thead><tbody>";
	
			while($info = mysql_fetch_array($data)){ 
		
				echo "<tr>"; //Início da Linha de um registro...
				echo "<td><center>".$info['id']."</center></td>";
				echo "<td><center>".$info['nome_func']."</center></td>";
				echo "<td><center>".$info['usuario']."</center></td>";
				echo "<td><center>".$info['senha']."</center></td>";
				echo "<td><center>".$info['nivel']."</center></td>";
				if($info['ativo'] == 1){
				    echo "<td><center>SIM</center></td>";
				}else if($info['ativo'] == 0){
				    echo "<td><center>NÃO</center></td>";
				}
				//echo "<td>".implode("/", array_reverse(explode("-", $info['dt_cadastro'])))." </td>";
				echo "<td><center>".date('d/m/Y',strtotime($info['dt_cadastro']))."</center></td>";
				echo "<td></center><div class='btn-group btn-group-xs'>";
				echo "<a class='btn btn-info btn-xs' href=view_usu.php?id=".$info['id']."><span class='glyphicon glyphicon-option-vertical'>Detalhar</a>";
				echo "<a class='btn btn-warning btn-xs' href=fedita_usu.php?id=".$info['id']."><span class='glyphicon glyphicon-pencil'> Editar</a>";
				echo "<a class='btn btn-danger btn-xs'  onclick='deletaDadoUsu(".$info['id'].")' data-toggle='modal' href='#delete-modal'><span class='glyphicon glyphicon-trash'> Excluir </a>";
                if($info['ativo'] == 1){
				    echo "<a class='btn btn-danger btn-xs'  href=block_usu.php?id=".$info['id']."> <span class='glyphicon glyphicon-ban-circle'> Bloquear </a>";
				}else if($info['ativo'] == 0){
				    echo "<a class='btn btn-success btn-xs'  href=ativa_usu.php?id=".$info['id']."><span class='glyphicon glyphicon-ok-circle'>&nbsp;Ativar&nbsp;</a></div></center></td>";
				}
			}
		?>		
				</tr><!-- Fim da Linha é um registro...-->
			</tbody>
		</table>
	</div>
</div><!--list-->
<div id="bottom" class="row">
	<div class="col-xs-12">
		<a href="lista_usu.php" class="btn btn-primary pull-left h2">Listar todos</a> 
	</div>
</div><!--bottom-->

		<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<!-- Referenciando função ajax para atualização de página - PESQUISA -->
		<script src="../js/funcao.js"></script>
