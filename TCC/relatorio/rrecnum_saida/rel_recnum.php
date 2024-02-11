<?php 
						include("../pdf/mpdf.php");
						
						if (!isset($_SESSION)) session_start();

						include "../../base/conexao.php";
						
						if($_SESSION['cod_recibo']==''){
							$sql  = "select r.cod_recibo, e.cod_saida, p.nome_cal, e.qtde_saida, ";
							$sql .= "e.preco_saida, r.dt_emissao, f.nome_forn, p.qtde_estoque, p.numero, r.nr_rec_forn ";
							$sql .= "from fornecedor f, recibo r, saida e, calcado p ";
							$sql .= "where f.cod_forn = r.cod_forn and p.cod_cal = e.cod_cal ";
							$sql .= "and f.cod_forn = e.cod_forn and r.cod_recibo = e.cod_recibo ";
							$sql .= "and r.cod_recibo = '".$_SESSION['scr']."' order by e.cod_saida;";
						}else{
							$sql  = "select r.cod_recibo, e.cod_saida, p.nome_cal, e.qtde_saida, ";
							$sql .= "e.preco_saida, r.dt_emissao, f.nome_forn, p.qtde_estoque, p.numero, r.nr_rec_forn ";
							$sql .= "from fornecedor f, recibo r, saida e, calcado p ";
							$sql .= "where f.cod_forn = r.cod_forn and p.cod_cal = e.cod_cal ";
							$sql .= "and f.cod_forn = e.cod_forn and r.cod_recibo = e.cod_recibo ";
							$sql .= "and r.cod_recibo = '".$_SESSION['cod_recibo']."' order by e.cod_saida;";
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
						<h2><div class='titulorel'>Relatório de Venda de Calçados na Loja</div></h2>
						";
						
						$html1 .= "
						<div class='referencia'>
							<h4><div class='ref1'>Recibo Cod: ".$dadorec['cod_recibo']." / Nº: ".$dadorec['nr_rec_forn']." </div>
							<div class='ref2'>Fornecedor: ".$dadorec['nome_forn']."&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp; Data de Emissão: ".date('d/m/Y', strtotime($dadorec['dt_emissao']))."</div></h4>
						</div>
						<hr />
						";
				 
						$html1 .= "
						<div class='dados'>
						<table class='fontedados' cellspacing='2' cellpadding='2' width='100%'>
						<tr>
						<td width='7%'><strong>CÓDIGO</strong></td>
						<td width='23%'><strong>CALÇADO</strong></td>
                        <td width='10%'><center><strong>TAMANHO</strong></center></td>
						<td width='20%'><center><strong>QUANTIDADE DA VENDA</strong></center></td>
						<td width='20%'><center><strong>VALOR DA VENDA</strong></center></td>
						<td width='20%'><center><strong>QUANTIDADE DO ESTOQUE</strong></center></td>
						</tr>
						";
						$cont = 1;
						$data = mysql_query($sql) or die(mysql_error());
						while($info = mysql_fetch_array($data)){
							if($cont % 2 == 0){
								$html1 .= "<tr style='background:#eee;'><td>".$info['cod_saida']."</td>
								<td>".$info['nome_cal']."</td>
                                <td><center>".$info['numero']."</center></td>
								<td><center>".$info['qtde_saida']."</center></td>
								<td><center> R$ ".number_format($info['preco_saida']*$info['qtde_saida']/100, 2,',','.')."</center></td>
								<td><center>".$info['qtde_estoque']."</center></td></tr>";
							}else{
								$html1 .= "<tr><td>".$info['cod_saida']."</td>
								<td>".$info['nome_cal']."</td>
                                <td><center>".$info['numero']."</center></td>
								<td><center>".$info['qtde_saida']."</center></td>
								<td><center> R$ ".number_format($info['preco_saida']*$info['qtde_saida']/100, 2,',','.')."</center></td>
								<td><center>".$info['qtde_estoque']."</center></td></tr>";
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
 $_SESSION['cod_recibo'] = '';
 exit;
?>