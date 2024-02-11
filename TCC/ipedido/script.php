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
		jQuery('#form_itens_rec').submit(function(){
			var dados = jQuery( this ).serialize();
			jQuery.ajax({
				type: "POST",
				url: "insere_ped.php",
				data: dados,
				success: function( data ){
					jQuery.ajax({
						type: "GET",
						url: "itens_rec.php",
						data: dados,
						success: function( data ){
							document.getElementById('conteudo_pedido').innerHTML = data;
                            limparitempedido();
						}
					});
				}
			});
		return false;
		});
	});
	
    function limparitempedido(){
    document.getElementById('calcado').value = '';
    document.getElementById('numero').value  = '';
    document.getElementById('qtde_iped').value  = '';
    document.getElementById('calcado').focus();
}
    
	//Buscar dados do recibo a partir do NR_REC_FORN e retornar demais (2) campos do registro.
	$(document).ready(function() {
		$("input[name='cod_ped']").blur(function() {
			var $fornec = $("input[name='nome_forn']");
			var $emissao = $("input[name='dt_ped']");
			var $codped = $("input[name='cod_ped']");

			$fornec.val('Carregando...');
			$emissao.val('Carregando...');

			$.getJSON(
				'list_forn.php', {
					cod_ped: $(this).val()
				},
				function(data) {
					if (data[0] === '0') {
						$(location).attr('href', 'ipedido.php?msg=5');
					} else {
						$fornec.val(data.cod_forn + " - " + data.nome_forn);
						$emissao.val(data.dt_ped);
						$codped.val(data.cod_ped);
					}
				}
			);
		});
	});
    
        //Busca tamanho do produto e preenche campo input numero do Form
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
    
	
</script>
