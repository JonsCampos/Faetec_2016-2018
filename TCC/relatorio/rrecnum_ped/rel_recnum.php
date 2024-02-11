<?php 
						include("../pdf/mpdf.php");
						
						if (!isset($_SESSION)) session_start();

						include "../../base/conexao.php";
						
						if($_SESSION['cod_ped']==''){
							$sql  = "select r.cod_ped, e.cod_iped, p.nome_cal, e.qtde_iped, ";
							$sql .= "r.dt_ped, f.nome_forn, p.qtde_estoque, p.numero ";
							$sql .= "from fornecedor f, pedido r, ipedido e, calcado p ";
							$sql .= "where f.cod_forn = r.cod_forn and p.cod_cal = e.cod_cal ";
							$sql .= "and f.cod_forn = e.cod_forn and r.cod_ped = e.cod_ped ";
							$sql .= "and r.cod_ped = '".$_SESSION['scr']."' order by e.cod_iped;";
						}else{
							$sql  = "select r.cod_ped, e.cod_iped, p.nome_cal, e.qtde_iped, ";
							$sql .= "r.dt_ped, f.nome_forn, p.qtde_estoque, p.numero ";
							$sql .= "from fornecedor f, pedido r, ipedido e, calcado p ";
							$sql .= "where f.cod_forn = r.cod_forn and p.cod_cal = e.cod_cal ";
							$sql .= "and f.cod_forn = e.cod_forn and r.cod_ped = e.cod_ped ";
							$sql .= "and r.cod_ped = '".$_SESSION['cod_ped']."' order by e.cod_iped;";
						}
						
						$data_rec = mysql_query($sql) or die(mysql_error());
						$dadorec = mysql_fetch_array($data_rec);

                        $h = "<div>Página {PAGENO} de {nbpg}</div>";

						$html1 = "
						<fieldset>
                        <br>
						<div class='cabecalho'>
						<div class='imgcab'><img src='\projeto/logo/logo_pdf.png'></div>
						<div class='titcab'>
						RSGC - Reisinger Calçados
						</div>
						</div>
						";
						
						$html1 .= "
						<h2><div class='titulorel'>Relatório de Pedido de Calçados</div></h2>
						";
						
						$html1 .= "
						<div class='referencia'>
							<h4><div class='ref1'>Pedido: ".$dadorec['cod_ped']." </div>
							<div class='ref2'>Fornecedor: ".$dadorec['nome_forn']."&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp; Data de Emissão: ".date('d/m/Y', strtotime($dadorec['dt_ped']))."</div></h4>
						</div>
						<hr />
						";
						
						$html1 .= "
						<div class='dados'>
						<table class='fontedados' cellspacing='2' cellpadding='2' width='100%'>
						<tr>
						<td width='15%'><strong>CÓDIGO</strong></td>
						<td width='30%'><strong>CALÇADO</strong></td>
                        <td width='18%'><center><strong>TAMANHO</strong></center></td>
						<td width='18%'><center><strong>QUANTIDADE PEDIDA</strong></center></td>
						</tr>
						";
						$cont = 1;
						$data = mysql_query($sql) or die(mysql_error());
						while($info = mysql_fetch_array($data)){
							if($cont % 2 == 0){
								$html1 .= "<tr style='background:#eee;'><td>".$info['cod_iped']."</td>
								<td>".$info['nome_cal']."</td>
                                <td><center>".$info['numero']."</center></td>
								<td><center>".$info['qtde_iped']."</center></td></tr>";
							}else{
								$html1 .= "<tr><td>".$info['cod_iped']."</td>
								<td>".$info['nome_cal']."</td>
                                <td><center>".$info['numero']."</center></td>
								<td><center>".$info['qtde_iped']."</center></td></tr>";
							}
							$cont++;
						}
						$html1 .= "</table></div>
						<br>";
						$htmlfooter = "
						<hr>
						<div class='rodape'>Emissão: ".date('d/m/Y  -  H:i:s')." </div>
						</fieldset>";
						
						

 //$mpdf=new mPDF('utf-8', 'A4-L',size,fonte,10,10,10,10);
 $mpdf=new mPDF('utf-8', 'A4-L',0,'',10,10,10,10);
 $mpdf->SetDisplayMode('fullpage');
 $css = file_get_contents('../css/stylerel.css');
 $mpdf->WriteHTML($css,1);
 $mpdf->SetHeader($h);
 $mpdf->WriteHTML($html1);
 $mpdf->SetHTMLFooter($htmlfooter);
 $mpdf->Output();
 $_SESSION['cod_ped'] = '';
 exit;
?>