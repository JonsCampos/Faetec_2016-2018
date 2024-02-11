<?php
$nivel_necessario = 1;

		if (!isset($_SESSION)) session_start();
		
		if ($_SESSION['UsuarioNivel'] < $nivel_necessario) {
			  session_destroy();
			  header("Location: ../index.php?msg=2"); exit;
		}
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
        <link rel="shortcut icon" href="../logo/logo_icon.ico" type="image/x-icon" />
        <link rel="icon" href="../logo/logo_icon.ico" type="image/x-icon" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<title>Lista dos Recibos</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
	</head>
	<body>
	<!-- modal -->
	<?php include "modal.html"; ?> 
	<!-- fim do modal -->

		<?php include "../base/navbartop.php"; ?>

		<br><br>

		<div id="main" class="container-fluid">
			<div id="top" class="row">
				<div class="col-sm-3 col-xs-12">
                <br>
					<h2>Recibos</h2>
				</div>
                <br>
				<!-- Pesquisa contas registradas na tabela -->
				<div class="col-sm-6 col-xs-12">
					<div class="input-group h2">
						<input name="data-[search]" onKeydown="Javascript: if (event.keyCode==13) PesquisaConteudoRec();" class="form-control" id="search_rec" type="text" placeholder="Pesquisar Recibos">
						<span class="input-group-btn">
							<button class="btn btn-primary" onclick="PesquisaConteudoRec()" type="submit"> 
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
				</div>
				
				<div class="col-sm-3 col-xs-12">
					<!-- Chama o Formulário para adicionar Recibos -->
					<a href="fadd_rec.php" class="btn btn-primary pull-right h2">Novo Recibo</a> 
				</div>
			</div>
			
			<div>	<?php include "mensagens.php"; ?>	</div>
			
			<!--top - Lista dos Campos-->
			
			<hr/>
			
			<div id="bloco-list-pag">	
				<div id="list" class="row">
					<div class="table-responsive col-xs-12">
				
						<?php
							include "../base/conexao.php";
							
							$quantidade = 10;
							
							$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
							$inicio = ($quantidade * $pagina) - $quantidade;
							
							$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
							$inicio = ($quantidade * $pagina) - $quantidade;
							
							$data_all = mysql_query("select * from recibo r, fornecedor f where f.cod_forn = r.cod_forn order by cod_recibo asc limit $inicio, $quantidade;") or die(mysql_error());
							
							echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
							echo "<thead><tr>";
							echo "<td><center><strong>Código</strong></center></td>"; 
							echo "<td><center><strong>Número do Recibo</strong></center></td>"; 
							echo "<td><center><strong>Fornecedor</strong></center></td>";
							echo "<td><center><strong>Data da Emissão</strong></center></td>";
							echo "<td><center><strong>Tipo</strong></center></td>";
							echo "<td class='actions'><center><strong>Ações</strong></center></td>"; 
							echo "</tr></thead><tbody>";
							
							while($info = mysql_fetch_array($data_all)){ 
								
								echo "<tr>"; //Início da Linha de um registro...
								echo "<td><center>".$info['cod_recibo']."</center></td>";
								echo "<td><center>".$info['nr_rec_forn']."</center></td>";
								echo "<td><center>".$info['nome_forn']."</center></td>";
								echo "<td><center>".date('d/m/Y', strtotime($info['dt_emissao']))."</center></td>";
								switch($info['tipo_recibo']){
									case 0:
										echo "<td><center>ENTRADA</center></td>";
										break;
									case 1:
										echo "<td><center>VENDA</center></td>";
										break;
								}
								echo "<td><center><div class='btn-group btn-group-xs'>";
								echo "<a class='btn btn-info btn-xs' href=view_rec.php?cod_recibo=".$info['cod_recibo']."><span class='glyphicon glyphicon-eye-open'></span> Visualizar </a>";
								echo "<a class='btn btn-warning btn-xs' href=fedita_rec.php?cod_recibo=".$info['cod_recibo']."><span class='glyphicon glyphicon-pencil'></span> Editar </a>"; 
								echo "<a class='btn btn-danger btn-xs'  onclick='deletaDadoRec(".$info['cod_recibo'].")' data-toggle='modal' href='#delete-modal'><span class='glyphicon glyphicon-trash'></span> Excluir </a></div></center></td>";
							}
						?>				

							</tr><!-- Fim da Linha é um registro...-->
							</tbody>
							</table>

					</div>
				</div><!--list-->

										<!-- PAGINAÇÃO -->
				<div id="bottom" class="row">
					<div class="col-xs-12">

						<ul class="pagination">
						<?php 
							$sqlTotal 		= "select cod_recibo from recibo;";
							
							$qrTotal  		= mysql_query($sqlTotal) or die (mysql_error());
							$numTotal 		= mysql_num_rows($qrTotal);
							$totalpagina = (ceil($numTotal/$quantidade)<=0) ? 1 : ceil($numTotal/$quantidade);
														
							$exibir = 3;
							
							$anterior = (($pagina-1) <= 0) ? 1 : $pagina - 1;
							$posterior = (($pagina+1) >= $totalpagina) ? $totalpagina : $pagina+1;
							
							echo "<li class='first'><a href='?pagina=1'> Primeira</a></li> "; 
							echo "<li class='previous'><a href=\"?pagina=$anterior\"> <span class='glyphicon glyphicon-chevron-left'> </a></li> ";
							

								echo '<li><a href="?pagina='.$pagina.'"><strong>'.$pagina.'</strong></a></li> ';
								
							for($i = $pagina+1; $i < $pagina+$exibir; $i++){
								if($i <= $totalpagina)
									echo '<li><a href="?pagina='.$i.'"> '.$i.' </a></li> ';
								}
								
							echo "<li class='next'><a href=\"?pagina=$posterior\"> <span class='glyphicon glyphicon-chevron-right'></a></li> ";
							echo "<li class='last'><a href=\"?pagina=$totalpagina\"> &Uacute;ltima</a></li>";
						
						?>	
						</ul>
					</div>
				</div><!--bottom-->
			</div>
		</div><!--main-->
		
<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- Referenciando função ajax para atualização de página - PESQUISA -->
<script src="../js/funcao.js"></script>

	</body>
</html>