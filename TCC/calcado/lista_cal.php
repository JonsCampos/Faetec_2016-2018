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
			<title>Lista dos Calçados</title>
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
					<h2>Calçados</h2>
				</div>
				<br>
				<!-- Pesquisa Calçados registrados na tabela -->
				<div class="col-sm-6 col-xs-12">
					<div class="input-group h2">
						<input name="data-[search]" onKeydown="Javascript: if (event.keyCode==13) PesquisaConteudocal();" class="form-control" id="search_cal" type="text" placeholder="Pesquisar Calçados">
						<span class="input-group-btn">
							<button class="btn btn-primary" onclick="PesquisaConteudocal()" type="submit"> 
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
				</div>
				
				<div class="col-sm-3 col-xs-12">
					<!-- Chama o Formulário para adicionar Calçados -->
					<a href="fadd_cal.php" class="btn btn-primary pull-right h2"> Novo Calçado</a> 
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
							
							$data_all = mysql_query("select * from calcado order by cod_cal asc limit $inicio, $quantidade;") or die(mysql_error());
							
							echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
							echo "<thead><tr>";
							echo "<td><center><strong>Código</strong></center></td>"; 
							echo "<td><center><strong>Nome do Calçado</strong></center></td>"; 
                            echo "<td><center><strong>Marca</strong></center></td>";
                            echo "<td><center><strong>Modelo</strong></center></td>";
                            echo "<td><center><strong>Cor</strong></center></td>";
                            echo "<td><center><strong>Número</strong></center></td>";
                            echo "<td><center><strong>Preço</strong></center></td>";
							echo "<td><center><strong>Quantidade</strong><center></td>";
							echo "<td class='actions'><center><strong>Ações</strong></center></td>"; 
							echo "</tr></thead><tbody>";
							
							while($info = mysql_fetch_array($data_all)){ 
								
								echo "<tr>"; //Início da Linha de um registro...
								echo "<td><center>".$info['cod_cal']."</center></td>";
								echo "<td><center>".$info['nome_cal']."</center></td>";
                                echo "<td><center>".$info['marca']."</center></td>";
                                echo "<td><center>".$info['modelo']."</center></td>";
                                echo "<td><center>".$info['cor']."</center></td>";
                                echo "<td><center>".$info['numero']."</center></td>";
                                echo "<td><center>R$ ".$info['preco_atual']."</center></td>";
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

										<!-- PAGINAÇÃO -->
				<div id="bottom" class="row">
					<div class="col-xs-12">

						<ul class="pagination">
						<?php 
							$sqlTotal 		= "select cod_cal from calcado;";
							
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