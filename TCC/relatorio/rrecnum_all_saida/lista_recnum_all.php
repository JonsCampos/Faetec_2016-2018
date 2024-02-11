<?php
$nivel_necessario = 1;

		if (!isset($_SESSION)) session_start();
		
		if ($_SESSION['UsuarioNivel'] < $nivel_necessario) {
			  session_destroy();
			  header("Location: ../../index.php"); exit;
		}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="utf-8" http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../../logo/logo_icon.ico" type="image/x-icon" />
        <link rel="icon" href="../../logo/logo_icon.ico" type="image/x-icon" />
			<title>Relatório de Vendas por período</title>
		<link href="../../css/bootstrap.min.css" rel="stylesheet">
		<link href="../../css/style.css" rel="stylesheet">
	</head>

	<body>

	<?php include "../../base/navbartop.php"; ?>

	<br><br>
	<div id="main" class="container-fluid">

		<div id="top" class="row">
			<div class="col-xs-12">
				<br>
				<h2><center>Relatório de Vendas por Período</center></h2>
			</div>
		</div>

		<!--top - Lista dos Campos-->
	
		<hr/>
	
		<div id="bloco-list-pag">	

			<div id="list" class="row">
				<div class="table-responsive col-xs-12">
					
						
					<?php
					
						$sdt_ini = implode("/", array_reverse(explode("-", $_POST["dt_ini"])));
						$sdt_fim = implode("/", array_reverse(explode("-", $_POST["dt_fim"])));
						$dt_ini = $_POST["dt_ini"];
						$dt_fim = $_POST["dt_fim"];
						
						//session_start();
						$_SESSION["sdt_ini"] = $dt_ini;
						$_SESSION["sdt_fim"] = $dt_fim;
					
						include "../../base/conexao.php";
						
						$sqlrec = "select * from recibo order by nr_rec_forn;";
						
						$data_rec = mysql_query($sqlrec) or die(mysql_error());
						
						
						echo "<div class='row' style='padding-bottom: 40px;'><h3>";
						echo "<div class='col-sm-4 col-xs-12'>Período: ".$sdt_ini." a ".$sdt_fim." </div>";
						echo "<div class='col-sm-6 col-xs-12 pull-right'>Emissão: ".date('d/m/Y  -  H:i:s')." </div>";
						echo "</h3></div>";
						
						echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
						echo "<tr style='background:#708090;'><td></td>";
						echo "<td><center><strong>CÓDIGO</strong></center></td>";
						echo "<td><center><strong>CALÇADO</strong></center></td>"; 
                        echo "<td><center><strong>TAMANHO</strong></center></td>";
						echo "<td><center><strong>QUANTIDADE DA VENDA</strong></center></td>";
						echo "<td><center><strong>VALOR DA VENDA</strong></center></td>";
						echo "<td><center><strong>QUANTIDADE DO ESTOQUE</strong></center></td></tr>";
						
                        while($info_rec = mysql_fetch_array($data_rec)){ 
							
							$sql  = "select r.cod_recibo, e.cod_saida, p.nome_cal, e.qtde_saida, ";
							$sql .= "e.preco_saida, r.dt_emissao, f.nome_forn, p.qtde_estoque, p.numero, r.nr_rec_forn ";
							$sql .= "from fornecedor f, recibo r, saida e, calcado p ";
							$sql .= "where f.cod_forn = r.cod_forn and p.cod_cal = e.cod_cal ";
							$sql .= "and f.cod_forn = e.cod_forn and r.cod_recibo = e.cod_recibo ";
							$sql .= "and r.cod_recibo = '".$info_rec['cod_recibo']."' and r.dt_emissao between '".$dt_ini."' and '".$dt_fim."' order by e.cod_saida;";
							
							$data_all = mysql_query($sql) or die(mysql_error());
							
							if(mysql_num_rows($data_all) > 0){
								
								echo "<tr class='bg-default'><td colspan='6'><strong>Recibo: ".$info_rec['cod_recibo']." / nº: ".$info_rec['nr_rec_forn']." </strong></td></tr>";
								
								while($info = mysql_fetch_array($data_all)){
							
									echo "<tr>"; //Início da Linha de um registro...
									echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
									echo "<td><center>".$info['cod_saida']."</center></td>";
									echo "<td><center>".$info['nome_cal']."</center></td>";
                                    echo "<td><center>".$info['numero']."</center></td>";
									echo "<td><center>".$info['qtde_saida']."</center></td>";
									echo "<td><center>R$ ".number_format($info['preco_saida']*$info['qtde_saida']/100, 2,',','.')."</center></td>";
									echo "<td><center>".$info['qtde_estoque']."</center></td></tr>";
								}
							}
						}
						echo "</table>";
					?>				
				</div>
			</div><!--list-->
			<hr>
			<div class="row">
				<div class="col-xs-12">
					<a href="fil_recnum_all.php" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
					<a href="rel_recnum_all.php" class="btn btn-primary"><span class="glyphicon glyphicon-print"> Imprimir</span></a> 
				</div>
				
			</div>
			<br><br>
		</div>
	</div><!--main-->

	<!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
	<script src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<!-- Referenciando função ajax para atualização de página - PESQUISA -->
</body>
</html>