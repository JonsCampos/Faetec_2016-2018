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
	
			$data = mysql_query("select * from funcionario where nome_func like '%".$_GET['nome_func']."%' order by mat_func asc;") or die(mysql_error());
			echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
            echo "<thead><tr>";
            echo "<td><center><strong>Matrícula</strong></center></td>"; 
            echo "<td><center><strong>Nome do Funcionário</strong></center></td>"; 
            echo "<td><center><strong>CPF</strong></center></td>";
            echo "<td><center><strong>RG</strong></center></td>";
            echo "<td><center><strong>Telefone</strong></center></td>";
            echo "<td><center><strong>E-mail</strong></center></center></td>";
            echo "<td><center><strong>Cargo</strong></center></td>";
            echo "<td><center><strong>Sexo</strong></center></td>";
            echo "<td class='actions'><center><strong>Ações</strong></center></td>"; 
            echo "</tr></thead><tbody>";
	
			while($info = mysql_fetch_array($data)){ 
		
				echo "<tr>"; //Início da Linha de um registro...
				echo "<td><center>".$info['mat_func']."</center></td>";
				echo "<td><center>".$info['nome_func']."</center></td>";
                echo "<td><center>".$info['cpf_func']."</center></td>";
                echo "<td><center>".$info['rg']."</center></td>";
                echo "<td><center>".$info['telefone']."</center></td>";
                echo "<td><center>".$info['email']."</center></td>";
				echo "<td><center>".$info['cargo']."</center></td>";
                    switch($info['sexo']){
				    case 0:
				        echo "<td><center>F</center></td>";
				    break;
				    case 1:
				        echo "<td><center>M</center></td>";
				    break;
				}
				echo "<td><center><div class='btn-group btn-group-xs'>";
				echo "<a class='btn btn-info btn-xs' href=view_func.php?mat_func=".$info['mat_func']." ><span class='glyphicon glyphicon-eye-open'></span> Visualizar </a>";
				echo "<a class='btn btn-warning btn-xs' href=fedita_func.php?mat_func=".$info['mat_func']."><span class='glyphicon glyphicon-pencil'> Editar </a>"; 
				echo "<a class='btn btn-danger btn-xs'  onclick='deletaDadoFunc(".$info['mat_func'].")' data-toggle='modal' href='#delete-modal'><span class='glyphicon glyphicon-trash'> Excluir </a></div></center></td>";
			}
		?>		
				</tr><!-- Fim da Linha é um registro...-->
			</tbody>
		</table>
	</div>
</div><!--list-->
<div id="bottom" class="row">
	<div class="col-xs-12">
		<a href="lista_func.php" class="btn btn-primary pull-left h2">Listar todos</a> 
	</div>
</div><!--bottom-->
