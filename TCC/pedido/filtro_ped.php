<?php
$nivel_necessario = 1;

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
<!-- modal -->
	<?php include "modal.html"; ?> 
<!-- fim do modal -->

<div id="list" class="row">
	<div class="table-responsive col-xs-12">
		<?php
			include "../base/conexao.php";
	
			$data = mysql_query("select * from fornecedor f, pedido r where r.cod_forn = f.cod_forn and r.cod_ped like '%".$_GET['dt_ped']."%' order by cod_ped asc;") or die(mysql_error());
	
			echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
			echo "<thead><tr>";
			echo "<td><center><strong>Código</strong></center></td>"; 
			echo "<td><center><strong>Fornecedor</strong></center></td>";
			echo "<td><center><strong>Data do Pedido</strong></center></td>";
			echo "<td class='actions'><center><strong>Ações</strong></center></td>"; 
			echo "</tr></thead><tbody>";
	
			while($info = mysql_fetch_array($data)){ 
		
				echo "<tr>"; //Início da Linha de um registro...
				echo "<td><center>".$info['cod_ped']."</center></td>";
				echo "<td><center>".$info['nome_forn']."</center></td>";
				echo "<td><center>".date('d/m/Y', strtotime($info['dt_ped']))."</center></td>";
				echo "<td><center><div class='btn-group btn-group-xs'>";
				echo "<a class='btn btn-info btn-xs' href=view_ped.php?cod_ped=".$info['cod_ped']."><span class='glyphicon glyphicon-eye-open'></span> Visualizar </a>";
				echo "<a class='btn btn-warning btn-xs' href=fedita_ped.php?cod_ped=".$info['cod_ped']."><span class='glyphicon glyphicon-pencil'></span> Editar </a>"; 
				echo "<a class='btn btn-danger btn-xs'  onclick='deletaDadoPed(".$info['cod_ped'].")' data-toggle='modal' href='#delete-modal'><span class='glyphicon glyphicon-trash'></span> Excluir </a></div></center></td>";
			}
		?>		
				</tr><!-- Fim da Linha é um registro...-->
			</tbody>
		</table>
	</div>
</div><!--list-->
<div id="bottom" class="row">
	<div class="col-xs-12">
		<a href="lista_ped.php" class="btn btn-primary pull-left h2">Listar todos</a> 
	</div>
</div><!--bottom-->
