<?php 
						include("../pdf/mpdf.php");
						session_start();
						$dt_ini 			= $_SESSION["sdt_ini"];
						$dt_fim 			= $_SESSION["sdt_fim"];

					
						include "../../base/conexao.php";
						
						$sqlrec = "select * from pedido order by cod_ped;";
						
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
						<h2><div class='titulorel'>Relatório de Pedidos por período</div></h2>
						";
						
						$html .= "
						<div class='referencia'>
							<h4><div class='ref1'>Pedidos</div>
							<div class='ref2'>Período: ".implode("/", array_reverse(explode("-", $dt_ini)))." a ".implode("/", array_reverse(explode("-", $dt_fim)))." </div></h4>
						</div>
						<hr />
						";
						
						$html .= "
						<div class='dados'>
						<table class='fontedados' cellspacing='2' cellpadding='2' width='100%'>
						<tr>
							<td width='10%'></td>
							<td width='15%'><strong>CÓDIGO</strong></td>
							<td width='30%'><strong>CALÇADO</strong></td>
                            <td width='18%'><center><strong>TAMANHO</strong></center></td>
							<td width='18%'><center><strong>QUANTIDADE PEDIDA</strong></center></td>
						</tr>
						";
						
						while($info_rec = mysql_fetch_array($data_rec)){
							
							$sql  = "select r.cod_ped, e.cod_iped, p.nome_cal, e.qtde_iped, ";
							$sql .= "r.dt_ped, f.nome_forn, p.qtde_estoque, p.numero ";
							$sql .= "from fornecedor f, pedido r, ipedido e, calcado p ";
							$sql .= "where f.cod_forn = r.cod_forn and p.cod_cal = e.cod_cal ";
							$sql .= "and f.cod_forn = e.cod_forn and r.cod_ped = e.cod_ped ";
							$sql .= "and r.cod_ped = '".$info_rec['cod_ped']."' and r.dt_ped ";
							$sql .= "between '".$dt_ini."' and '".$dt_fim."' order by e.cod_iped;";
							
							$data_all = mysql_query($sql) or die(mysql_error());
							
							if(mysql_num_rows($data_all) > 0) {
							
								$html .= "<tr><td class='grupoforn' colspan='7'>Nº ".$info_rec['cod_ped']."</td></tr>";
								
								$cont = 1;
								while($info = mysql_fetch_array($data_all)){
									if($cont % 2 == 0){
										$html .= "<tr style='background:#eee;'><td width='15%'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td>".$info['cod_iped']."</td>
										<td>".$info['nome_cal']."</td>
                                        <td><center>".$info['numero']."</center></td>
										<td><center>".$info['qtde_iped']."</center></td></tr>";
									}else{
										$html .= "<tr><td width='15%'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td>".$info['cod_iped']."</td>
										<td>".$info['nome_cal']."</td>
                                        <td><center>".$info['numero']."</center></td>
										<td><center>".$info['qtde_iped']."</center></td></tr>";
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