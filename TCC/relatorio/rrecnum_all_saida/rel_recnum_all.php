<?php 
						include("../pdf/mpdf.php");
						session_start();
						$dt_ini 			= $_SESSION["sdt_ini"];
						$dt_fim 			= $_SESSION["sdt_fim"];

					
						include "../../base/conexao.php";
						
						$sqlrec = "select * from recibo order by nr_rec_forn;";
						
						$data_rec = mysql_query($sqlrec) or die(mysql_error());
						
						$h = "<div>Página {PAGENO} de {nbpg}</div>";
						
						$html = "
						<fieldset>
						<div class='cabecalho'>
						<div class='imgcab'><img src='\projeto/logo/logo_pdf.png'></div>
						<div class='titcab'>
						RSGC - Reisinger Calçados
						</div>
						</div>
						";
						
						$html .= "
						<h2><div class='titulorel'>Relatório de Vendas por período</div></h2>
						";
						
						$html .= "
						<div class='referencia'>
							<h4><div class='ref1'>Recibos</div>
							<div class='ref2'>Período: ".implode("/", array_reverse(explode("-", $dt_ini)))." a ".implode("/", array_reverse(explode("-", $dt_fim)))."</div></h4>
						</div>
						<hr />
						";
				
						$html .= "
						<div class='dados'>
						<table class='fontedados' cellspacing='2' cellpadding='2' width='100%'>
						<tr>
							<td width='10%'></td>
							<td width='7%'><strong>CÓDIGO</strong></td>
							<td width='26%'><strong>CALÇADO</strong></td>
                            <td width='8%'><center><strong>TAMANHO</strong></center></td>
							<td width='17%'><center><strong>QUANTIDADE DA VENDA</strong></center></td>
							<td width='15%'><center><strong>VALOR DA VENDA</strong></center></td>
							<td width='17%'><center><strong>QUANTIDADE DO ESTOQUE</strong></center></td>
						</tr>
						";
						
						while($info_rec = mysql_fetch_array($data_rec)){
							
							$sql  = "select r.cod_recibo, e.cod_saida, p.nome_cal, e.qtde_saida, ";
							$sql .= "e.preco_saida, r.dt_emissao, f.nome_forn, p.qtde_estoque, p.numero, r.nr_rec_forn ";
							$sql .= "from fornecedor f, recibo r, saida e, calcado p ";
							$sql .= "where f.cod_forn = r.cod_forn and p.cod_cal = e.cod_cal ";
				 			$sql .= "and f.cod_forn = e.cod_forn and r.cod_recibo = e.cod_recibo ";
							$sql .= "and r.cod_recibo = '".$info_rec['cod_recibo']."' and r.dt_emissao ";
							$sql .= "between '".$dt_ini."' and '".$dt_fim."' order by e.cod_saida;";
							
							$data_all = mysql_query($sql) or die(mysql_error());
							
							if(mysql_num_rows($data_all) > 0) {
							
								$html .= "<tr><td class='grupoforn' colspan='7'>Cod: ".$info_rec['cod_recibo']." / Nº: ".$info_rec['nr_rec_forn']."</td></tr>";
								
								$cont = 1;
								while($info = mysql_fetch_array($data_all)){
									if($cont % 2 == 0){
										$html .= "<tr style='background:#eee;'><td width='15%'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td>".$info['cod_saida']."</td>
										<td>".$info['nome_cal']."</td>
                                        <td><center>".$info['numero']."</center></td>
										<td><center>".$info['qtde_saida']."</center></td>
										<td><center> R$ ".number_format($info['preco_saida']*$info['qtde_saida']/100, 2,',','.')."</center></td>
										<td><center>".$info['qtde_estoque']."</center></td></tr>";
									}else{
										$html .= "<tr><td width='15%'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td>".$info['cod_saida']."</td>
										<td>".$info['nome_cal']."</td>
                                        <td><center>".$info['numero']."</center></td>
										<td><center>".$info['qtde_saida']."</center></td>
										<td><center> R$ ".number_format($info['preco_saida']*$info['qtde_saida']/100, 2,',','.')."</center></td>
										<td><center>".$info['qtde_estoque']."</center></td></tr>";
									}
									$cont++;
								}
								$html .= "
								<tr><td colspan='6'>&nbsp;</td></tr>
								";
							}
						}
						$html .= "</table></div>";
						$htmlfooter = "
						<hr>
						<div class='rodape'>Emissão: ".date('d/m/Y  -  H:i:s')." </div>
						</fieldset>";
						

	 //$mpdf=new mPDF('utf-8', 'A4-L',size,fonte,10,10,10,10);
	 $mpdf=new mPDF('utf-8', 'A4-L',0,'',10,10,15,15);
	 $mpdf->SetDisplayMode('fullpage');
	 $css = file_get_contents('../css/stylerel.css');
	 $mpdf->WriteHTML($css,1);
	 $mpdf->SetHeader($h);
	 $mpdf->SetHTMLFooter($htmlfooter);
	 $mpdf->WriteHTML($html);
	 $mpdf->Output();

	 exit;
?>