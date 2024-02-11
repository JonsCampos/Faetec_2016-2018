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
    <title>Lista de Itens Pedidos</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <!-- modal -->
    <?php include "modal.html";?>
    <!-- fim do modal -->

    <?php include "../base/navbartop.php"; ?>

    <br><br>

    <div id="main" class="container-fluid">
        <div id="top" class="row">
            <div class="col-sm-8 col-xs-12">
                <?php
						if (!isset($_SESSION)) session_start();
						include "../base/conexao.php";

                            $sql  = "select r.cod_ped, e.cod_iped, p.nome_cal, e.qtde_iped, ";
							$sql .= "r.dt_ped, f.nome_forn, p.qtde_estoque, p.numero ";
							$sql .= "from fornecedor f, pedido r, ipedido e, calcado p ";
							$sql .= "where f.cod_forn = r.cod_forn and p.cod_cal = e.cod_cal ";
							$sql .= "and f.cod_forn = e.cod_forn and r.cod_ped = e.cod_ped ";
							$sql .= "and r.cod_ped = '".$_SESSION['scr']."' order by e.cod_iped";

						$data = mysql_query($sql) or die(mysql_error());
						$dadorec = mysql_fetch_array($data);
						echo "<br><h2>Itens do Pedido - Pedido nº: <strong>".$dadorec['cod_ped']."</strong></h2>";
					?>
            </div>

            <div class="col-sm-4 col-xs-12 pull-right">
                <!-- Chama o Formulário para adicionar alunos -->
                <br>
                <a href="ipedido.php" class="btn btn-primary pull-right h2">Novo Pedido de Itens</a>
            </div>
        </div>

        <div>
            <?php include "mensagens.php"; ?>
        </div>

        <!--top - Lista dos Campos-->

        <hr />

        <div id="list" class="row">
            <div class="table-responsive col-xs-12">

                <?php
							include "../base/conexao.php";
							
							$quantidade = 10;
							
							$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
							$inicio = ($quantidade * $pagina) - $quantidade;
							
							$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
							$inicio = ($quantidade * $pagina) - $quantidade;
							
							$data_all = mysql_query($sql) or die(mysql_error());
							
							echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
							echo "<thead><tr>"; 
							echo "<td><center><strong>Código do Item</strong></center></td>"; 
							echo "<td><center><strong>Calçado</strong></center></td>";
                            echo "<td><center><strong>Tamanho</strong></center></td>";
							echo "<td><center><strong>Quantidade Pedida</strong></center></td>";
							echo "<td><center><strong>Fornecedor</strong></center></td>";                
							echo "<td><center><strong>Data do Pedido</strong></center></td>";
							echo "</tr></thead><tbody>";
							
							while($info = mysql_fetch_array($data_all)){ 
								
								echo "<tr>"; //Início da Linha de um registro...
								echo "<td><center>".$info['cod_iped']."</center></td>";
								echo "<td><center>".$info['nome_cal']."</center></td>";
                                echo "<td><center>".$info['numero']."</center></td>";
								echo "<td><center>".$info['qtde_iped']."</center></td>";
                                echo "<td><center>".$info['nome_forn']."</center></td>";
								echo "<td><center>".date('d/m/Y',strtotime($info['dt_ped']))."</center></td>";
							}
							echo "</tr></tbody></table>";
						?>
            </div>
        </div>
        <hr>
        <div class="row col-xs-12">
            <a href="../principal.php" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
            <a href="../relatorio/rrecnum_ped/rel_recnum.php" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Imprimir</a>

        </div>
    </div>
    <!--main-->

    <!-- Referenciando as classes com scripts jQuery e bootstrap (http://getbootstrap.com/) -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Referenciando função ajax para atualização de página - PESQUISA -->
    <script src="../js/funcao.js"></script>
</body>

</html>
