<?php
$nivel_necessario = 1;

		if (!isset($_SESSION)) session_start();
		
		if ($_SESSION['UsuarioNivel'] < $nivel_necessario) {
			  session_destroy();
			  header("Location: ../index.php?msg=4"); exit;

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
	
			$data = mysql_query("select * from calcado where nome_cal like '%".$_GET['nome_cal']."%' order by cod_cal asc;") or die(mysql_error());
			echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
            echo "<thead><tr>";
            echo "<td><center><strong>Código</strong></center></td>"; 
            echo "<td><center><strong>Nome do Calçado</strong></center></td>"; 
            echo "<td><center><strong>Marca</strong></center></td>";
            echo "<td><center><strong>Modelo</strong></center></td>";
            echo "<td><center><strong>Cor</strong></center></td>";
            echo "<td><center><strong>Número</strong></center></td>";
            echo "<td><center><strong>Preço</strong></center></td>";
            echo "<td><center><strong>Quantidade</strong></center></td>";
            echo "<td class='actions'><center><strong>Ações</strong></center></td>"; 
            echo "</tr></thead><tbody>";
	
			while($info = mysql_fetch_array($data)){ 
		
				echo "<tr>"; //Início da Linha de um registro...
				echo "<td><center>".$info['cod_cal']."</center></td>";
				echo "<td><center>".$info['nome_cal']."</center></td>";
                echo "<td><center>".$info['marca']."</center></td>";
                echo "<td><center>".$info['modelo']."</center></td>";
                echo "<td><center>".$info['cor']."</center></td>";
                echo "<td><center>".$info['numero']."</center></td>";
                echo "<td><center>R$".$info['preco_atual']."</center></td>";
				echo "<td><center>".$info['qtde_estoque']."</center></td>";
				echo "<td><center><div class='btn-group btn-group-xs'>";
				echo "<a class='btn btn-info btn-xs' href=view_cal.php?cod_cal=".$info['cod_cal']." ><span class='glyphicon glyphicon-eye-open'></span> Visualizar </a>";
				echo "<a class='btn btn-warning btn-xs' href=fedita_cal.php?cod_cal=".$info['cod_cal']."><span class='glyphicon glyphicon-pencil'> Editar </a>"; 
				echo "<a class='btn btn-danger btn-xs'  onclick='deletaDadocal(".$info['cod_cal'].")' data-toggle='modal' href='#delete-modal'><span class='glyphicon glyphicon-trash'> Excluir </a></div></center></td>";
			}
		?>		
				</tr><!-- Fim da Linha é um registro...-->
			</tbody>
		</table>
	</div>
</div><!--list-->
<div id="bottom" class="row">
	<div class="col-xs-12">
		<a href="lista_cal.php" class="btn btn-primary pull-left h2">Listar todos</a> 
	</div>
</div><!--bottom-->
