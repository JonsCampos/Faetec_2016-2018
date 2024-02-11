<script type="text/javascript">

	// Função que verifica se o navegador tem suporte AJAX 
	function AjaxF(){
		var ajax;
		
		try
		{
			ajax = new XMLHttpRequest();
		} 
		catch(e) 
		{
			try
			{
				ajax = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e) 
			{
				try 
				{
					ajax = new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch(e) 
				{
					alert("Seu browser não da suporte à AJAX!");
					return false;
				}
			}
		}
		return ajax;
	}
	
	// Função que faz as requisição Ajax ao arquivo PHP
	
	
	jQuery(document).ready(function(){
		jQuery('#form_rec_saida').submit(function(){
			var dados = jQuery( this ).serialize();
			jQuery.ajax({
				type: "POST",
				url: "insere_saida.php",
				data: dados,
				success: function( data ){
					jQuery.ajax({
						type: "GET",
						url: "itens_rec.php",
						data: dados,
						success: function( data ){
							document.getElementById('crsaida').innerHTML = data;
                            limparitemsaida();
						}
					});
				}
			});
		return false;
		});
	});
    
function limparitemsaida(){
    document.getElementById('calcado').value = '';
    document.getElementById('numero').value  = '';
    document.getElementById('preco_saida').value  = '';
    document.getElementById('qtde_saida').value  = '';
    document.getElementById('qtde_estoque').value  = '';
    document.getElementById('estoque_atualizado').value  = '';
    document.getElementById('calcado').focus();
}
    
    
//Buscar dados do recibo a partir do NR_REC_FORN e retornar demais (2) campos do registro.
	$(document).ready(function() {
		$("input[name='cod_recibo']").blur(function() {
			var $fornec = $("input[name='nome_forn']");
			var $emissao = $("input[name='dt_emissao']");
			var $codrec = $("input[name='cod_recibo']");

			$fornec.val('Carregando...');
			$emissao.val('Carregando...');

			$.getJSON(
				'list_forn.php', {
					cod_recibo: $(this).val()
				},
				function(data) {
					if (data[0] === '0') {
						$(location).attr('href', 'saida.php?msg=5');
					} else {
						$fornec.val(data.cod_forn + " - " + data.nome_forn);
						$emissao.val(data.dt_emissao);
						$codrec.val(data.cod_recibo);
					}
				}
			);
		});
	});
	
	
	//Busca quantidade do Estoque de produto e preenche campo input qtde_estoque do Form
	$(document).ready(function() {
		$("input[name='calcado']").blur(function() {
			var $estoque = $("input[name='qtde_estoque']");
			
			$estoque.val('Carregando...');
			
			$.getJSON(
				'ver_estoque.php', {
					calcado: $(this).val()
				},
				function(data) {
					$estoque.val(data.qtde_estoque);
				}
			);
		});
	});
    
    
    //Busca quantidade do Estoque de produto e preenche campo input qtde_estoque do Form
	$(document).ready(function() {
		$("input[name='calcado']").blur(function() {
			var $numero = $("input[name='numero']");
			
			$numero.val('Carregando...');
			
			$.getJSON(
				'ver_tamanho.php', {
					calcado: $(this).val()
				},
				function(data) {
					$numero.val(data.numero);
				}
			);
		});
	});
    
    
    //Busca quantidade do Estoque de produto e preenche campo input qtde_estoque do Form
	$(document).ready(function() {
		$("input[name='calcado']").blur(function() {
			var $preco = $("input[name='preco_saida']");
			
			$preco.val('Carregando...');
			
			$.getJSON(
				'ver_preco.php', {
					calcado: $(this).val()
				},
				function(data) {
					$preco.val(data.preco_saida);
				}
			);
		});
	});

	// Auto complete para campo de produto
	$().ready(function() {
		$("#calcado").autocomplete("list_cal.php", {
			width: 500,
			matchContains: true,
			//mustMatch: true,
			//minChars: 0,
			//multiple: true,
			//highlight: false,
			//multipleSeparator: ",",
			selectFirst: false
		});

	});
	
	//Máscara para Moeda
$(document).ready(function () {
	$("#preco_saida").maskMoney({
		prefix: "R$ ",
		decimal: ".",
		//thousands: "."
	});
});

	
	// Mostra atualização do campo 'Estoque Atualizado'
	
	$(document).ready(function() {
		$("input[name='qtde_saida']").blur(function() {

			var $estoque_atualizado = $("input[name='estoque_atualizado']");
			var qsai = parseInt(document.getElementById("qtde_saida").value);
			var qest = parseInt(document.getElementById("qtde_estoque").value);
            if (qsai>qest){
                alert ("Quantidade de Saida superior a quantidade do estoque");
                //document.getElementById('qtde_saida').focus();
            }
			var sub = qest - qsai;
			$estoque_atualizado.val(sub);
		});
	});
	
	
</script>
