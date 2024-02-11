
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

// Funções pesquisa e exclusão FORNECEDOR

function PesquisaConteudoForn(){
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){
			document.getElementById('bloco-list-pag').innerHTML = ajax.responseText;
		}
	}
	
	// Variável com os dados que serão enviados ao PHP
	if(document.getElementById('search_forn').value!=''){
		var dados = "nome_forn="+document.getElementById('search_forn').value;
	
		ajax.open("GET", "filtro_forn.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html");
		ajax.send();
	}

}


function deletaDadoForn(idDado){
				//seta o caminho para quando clicar em "Sim".
				var href = "/projeto/fornecedor/excluir_forn.php?cod_forn2=" + idDado;
				//adiciona atributo de delecao ao link
				$('#confirmaDelecao').prop("href", href);
}

// Funções pesquisa e exclusão CALÇADOS

function PesquisaConteudocal(){
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){
			document.getElementById('bloco-list-pag').innerHTML = ajax.responseText;
		}
	}
	
	// Variável com os dados que serão enviados ao PHP
	if(document.getElementById('search_cal').value!=''){
		var dados = "nome_cal="+document.getElementById('search_cal').value;
	
		ajax.open("GET", "filtro_cal.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html");
		ajax.send();
	}

}


function deletaDadocal(idDado){
				//seta o caminho para quando clicar em "Sim".
				var href = "/projeto/calcado/excluir_cal.php?cod_cal=" + idDado;
				//adiciona atributo de delecao ao link
				$('#confirmaDelecao').prop("href", href);
}

// Funções pesquisa e exclusão de RECIBO

function PesquisaConteudoRec(){
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){
			document.getElementById('bloco-list-pag').innerHTML = ajax.responseText;
		}
	}
	
	// Variável com os dados que serão enviados ao PHP
	if(document.getElementById('search_rec').value!=''){
		var dados = "nr_rec_forn="+document.getElementById('search_rec').value;
	
		ajax.open("GET", "filtro_rec.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html");
		ajax.send();
	}

}


function deletaDadoRec(idDado){
				//seta o caminho para quando clicar em "Sim".
				var href = "/projeto/recibo/excluir_rec.php?cod_recibo=" + idDado;
				//adiciona atributo de delecao ao link
				$('#confirmaDelecao').prop("href", href);
}

// Funções pesquisa e exclusão PEDIDOS

function PesquisaConteudoPed(){
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){
			document.getElementById('bloco-list-pag').innerHTML = ajax.responseText;
		}
	}
	
	// Variável com os dados que serão enviados ao PHP
	if(document.getElementById('search_ped').value!=''){
		var dados = "dt_ped="+document.getElementById('search_ped').value;
	
		ajax.open("GET", "filtro_ped.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html");
		ajax.send();
	}

}


function deletaDadoPed(idDado){
				//seta o caminho para quando clicar em "Sim".
				var href = "/projeto/pedido/excluir_ped.php?cod_ped=" + idDado;
				//adiciona atributo de delecao ao link
				$('#confirmaDelecao').prop("href", href);
}

// Funções pesquisa e exclusão ITENS PEDIDOS

function PesquisaConteudoiPed(){
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){
			document.getElementById('bloco-list-pag').innerHTML = ajax.responseText;
		}
	}
	
	// Variável com os dados que serão enviados ao PHP
	if(document.getElementById('search_iped').value!=''){
		var dados = "qtde_pedido="+document.getElementById('search_iped').value;
	
		ajax.open("GET", "filtro_iped.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html");
		ajax.send();
	}

}


function deletaDadoiPed(idDado){
				//seta o caminho para quando clicar em "Sim".
				var href = "/projeto/ipedido/excluir_iped.php?cod_ipedido=" + idDado;
				//adiciona atributo de delecao ao link
				$('#confirmaDelecao').prop("href", href);
}

// Funções pesquisa e exclusão FUNCIONÁRIOS

function PesquisaConteudoFunc(){
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){
			document.getElementById('bloco-list-pag').innerHTML = ajax.responseText;
		}
	}
	
	// Variável com os dados que serão enviados ao PHP
	if(document.getElementById('search_func').value!=''){
		var dados = "nome_func="+document.getElementById('search_func').value;
	
		ajax.open("GET", "filtro_func.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html");
		ajax.send();
	}

}


function deletaDadoFunc(idDado){
				//seta o caminho para quando clicar em "Sim".
				var href = "/projeto/funcionario/excluir_func.php?mat_func=" + idDado;
				//adiciona atributo de delecao ao link
				$('#confirmaDelecao').prop("href", href);
}


// Função pesquisa USUÁRIO

function PesquisaConteudoUsu(){
	var ajax = AjaxF();	
	
	ajax.onreadystatechange = function(){
		if(ajax.readyState == 4){
			document.getElementById('bloco-list-pag').innerHTML = ajax.responseText;
		}
	}
	
	// Variável com os dados que serão enviados ao PHP
	if(document.getElementById('search_usu').value!=''){
		var dados = "usuario="+document.getElementById('search_usu').value;
	
		ajax.open("GET", "filtro_usu.php?"+dados, false);
		ajax.setRequestHeader("Content-Type", "text/html");
		ajax.send();
	}

}

function deletaDadoUsu(idDado){
				//seta o caminho para quando clicar em "Sim".
				var href = "/projeto/usuario/excluir_usu.php?id=" + idDado;
				//adiciona atributo de delecao ao link
				$('#confirmaDelecao').prop("href", href);
}






function deletaDadoitement(idDado){
				//seta o caminho para quando clicar em "Sim".
				var href = "/projeto/entrada/excluir_item_rel.php?cod_ent=" + idDado;
				//adiciona atributo de delecao ao link
				$('#confirmaDelecao').prop("href", href);
}

function deletaDadoitemsaida(idDado){
				//seta o caminho para quando clicar em "Sim".
				var href = "/projeto/controle_vendas/excluir_item_rel.php?cod_saida=" + idDado;
				//adiciona atributo de delecao ao link
				$('#confirmaDelecao').prop("href", href);
}

function deletaDadoitemped(idDado){
				//seta o caminho para quando clicar em "Sim".
				var href = "/projeto/ipedido/excluir_item_rel.php?cod_iped=" + idDado;
				//adiciona atributo de delecao ao link
				$('#confirmaDelecao').prop("href", href);
}