<div class="table-responsive col-xs-12">
    <?php include "modal.html"; ?>
    <?php
			include "../base/conexao.php";
			
			if (!isset($_SESSION)) session_start(); 
			$_SESSION['scr'] = $_GET['cod_ped'];
			
			$quantidade = 10;
							
			$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
			$inicio = ($quantidade * $pagina) - $quantidade;
							
			$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
			$inicio = ($quantidade * $pagina) - $quantidade;
							
			$sql  = "select r.cod_ped, e.cod_iped, p.nome_cal, e.qtde_iped, ";
			$sql .= "r.dt_ped, f.nome_forn, p.qtde_estoque, p.numero ";
			$sql .= "from fornecedor f, pedido r, ipedido e, calcado p ";
			$sql .= "where f.cod_forn = r.cod_forn and p.cod_cal = e.cod_cal ";
			$sql .= "and f.cod_forn = e.cod_forn and r.cod_ped = e.cod_ped ";
			$sql .= "and r.cod_ped = '".$_GET['cod_ped']."' order by e.cod_iped;";
							
			$data_all = mysql_query($sql) or die(mysql_error());
							
			echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
			echo "<thead><tr>";
			echo "<td><center><strong>Código do Item</strong></center></td>"; 
			echo "<td><center><strong>Calçado</strong></center></td>";
            echo "<td><center><strong>Tamanho</strong></center></td>";
			echo "<td><center><strong>Quantidade pedida</strong></center></td>";
            echo "<td class='actions'><center><strong>Excluir</strong></center></td>";
			echo "</tr></thead><tbody>";
			
			while($info = mysql_fetch_array($data_all)){ 
				echo "<tr>"; //Início da Linha de um registro...
				echo "<td><center>".$info['cod_iped']."</center></td>";
				echo "<td><center>".$info['nome_cal']."</center></td>";
                echo "<td><center>".$info['numero']."</center></td>";
				echo "<td><center>".$info['qtde_iped']."</center></td>";
                echo "<td><center><a class='btn btn-danger btn-xs'  onclick='deletaDadoitemped(".$info['cod_iped'].")' data-toggle='modal' href='#delete-modal'><span class='glyphicon glyphicon-trash'></a><center></div</center></td>";
				
			}
			echo "</tr></tbody></table>";
			
			//session_start();
			//$_SESSION['snrf'] = $info['nr_rec_forn'];
		?>
</div>
