<div class="table-responsive col-xs-12">
    <?php include "modal.html"; ?>
    <?php
			include "../base/conexao.php";
			
			if (!isset($_SESSION)) session_start(); 
			$_SESSION['scr'] = $_GET['cod_recibo'];
			
			$quantidade = 10;
							
			$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
			$inicio = ($quantidade * $pagina) - $quantidade;
							
			$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
			$inicio = ($quantidade * $pagina) - $quantidade;
							
			$sql  = "select r.nr_rec_forn, s.cod_saida, p.nome_cal, s.qtde_saida, ";
			$sql .= "s.preco_saida, r.dt_emissao, f.nome_forn, p.qtde_estoque, p.numero ";
			$sql .= "from fornecedor f, recibo r, saida s, calcado p ";
			$sql .= "where f.cod_forn = r.cod_forn and p.cod_cal = s.cod_cal ";
			$sql .= "and f.cod_forn = s.cod_forn and r.cod_recibo = s.cod_recibo ";
			$sql .= "and r.cod_recibo = '".$_GET['cod_recibo']."' order by s.cod_saida;";
							
			$data_all = mysql_query($sql) or die(mysql_error());
							
			echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
			echo "<thead><tr>";
			echo "<td><center><strong>Código do Item</strong></center></td>"; 
			echo "<td><center><strong>Calçado</strong></center></td>";
            echo "<td><center><strong>Tamanho</strong></center></td>";
			echo "<td><center><strong>Quantidade da venda</strong></center></td>";
			echo "<td><center><strong>Valor da venda</strong></center></td>";
            echo "<td class='actions'><center><strong>Excluir</strong></center></td>";
			echo "</tr></thead><tbody>";
			
			while($info = mysql_fetch_array($data_all)){ 
				echo "<tr>"; //Início da Linha de um registro...
				echo "<td><center>".$info['cod_saida']."</center></td>";
				echo "<td><center>".$info['nome_cal']."</center></td>";
                echo "<td><center>".$info['numero']."</center></td>";
				echo "<td><center>".$info['qtde_saida']."</center></td>";
                echo "<td><center>R$ ";
                echo number_format($info['preco_saida']*$info['qtde_saida']/100,2, ',', '.');
                echo "</center></td>";
                echo "<td><center><a class='btn btn-danger btn-xs'  onclick='deletaDadoitemsaida(".$info['cod_saida'].")' data-toggle='modal' href='#delete-modal'><span class='glyphicon glyphicon-trash'></a></center></div></td>";
				
			}
			echo "</tr></tbody></table>";
			
			//session_start();
			//$_SESSION['snrf'] = $info['nr_rec_forn'];
		?>
</div>