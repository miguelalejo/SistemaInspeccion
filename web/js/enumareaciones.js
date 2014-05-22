$(document).ready(function(){ 
        $('#testBusqueda').click(function(){ 
            $('#container').load(this.href);
            return false; 
        }); 
});
$(document).ready(function(){
	$("#tipobusqueda").change(function() {
		var textoOpcion = $('option:selected',this).text();
		$("label[for='parametroBusqueda']").text(textoOpcion+":");      
		$("#parametroBusqueda").attr("placeholder", textoOpcion); 		
	});
	
});
$(document).ready(function(){	
	var textoOpcion = $('option:selected',this).text();
	$("label[for='parametroBusqueda']").text(textoOpcion+":");      
	$("#parametroBusqueda").attr("placeholder", textoOpcion); 		
});
$(document).ready(function(){ 
        $('#tipobusqueda').change(function(){ 
			var a_href = $('#testBusqueda').attr('href')+"?tipobusqueda="+$('#tipobusqueda').val();				
            $('#container').load(a_href); 
            return false; 
        }); 
});
$(document).ready(function(){
		$('#registroFugasYAtrasos').hide();
		$('#contenedor').hide();
		$('#seleccionarCursoAlumno').hide();
		$('#urlReporteAlumno').hide();
});
function contarFugas()
{
	$(document).ready(function(){         
			var numeroFugas = $("select.selectfugas option:selected[value!='']").length;
			$("input.inputfugas").val(numeroFugas); 			
	});	
}
function contarAtrasos()
{
	$(document).ready(function(){         
			var numeroFugas = $("select.selectatrasos option:selected[value!='']").length;
			$("input.inputatrasos").val(numeroFugas); 
	});	
}
function enviarFugasYAtrasos()
{
	var listaFugas = [];
	$('#selectfugas option:selected').each(function(index, element){ 
		listaFugas[index] = $(element).val(); 
	});						 				
	var listaAtrasos = [];
	$('#selectatrasos option:selected').each(function(index, element){ 
		listaAtrasos[index] = $(element).val(); 
	});			
	var a_href = $('#registroFugasYAtrasos').attr('href');			
	$.ajax({
	 url: a_href,
	 data: { "listaAtrasos": listaAtrasos.join('-'),"listaFugas": listaFugas.join('-')  },
	 type: "GET",
	 async: false,
	 beforeSend: function(xhr){xhr.setRequestHeader('X-Test-Header', 'test-value');},
	 success: function(data, textStatus, request)
		{				
		
		
		}
	});	
}
function enviarCursoAlumno()
{
	$(document).ready(function(){         
			var cursoAlumno;
			$('#selectcursoalumno option:selected').each(function(index, element){ 
				cursoAlumno = $(element).val(); 
			});					
			var a_href = $('#seleccionarCursoAlumno').attr('href')+"?cursoAlumno="+cursoAlumno;
			$('#selectperiodoescolar').empty()
			$.ajax({
			 url: a_href,
			 data: { "cursoAlumno": cursoAlumno },
			 type: "GET",
			 beforeSend: function(xhr){xhr.setRequestHeader('X-Test-Header', 'test-value');},
			 success: function(data, textStatus, request){				
				var arregloPeriodoEscolar = jQuery.parseJSON(request.getResponseHeader('X-JSON'));
				for (var i=0; i<arregloPeriodoEscolar.length; i++) {
					$('#selectperiodoescolar').append('<option value='+arregloPeriodoEscolar[i].codigoperiodoescolar+'>'+arregloPeriodoEscolar[i].periodoescolar+'</option>');	
				}			
				
				}
		  });			
	});	
}

$(document).ready(function() {
	$('#selectatrasos').after('<button id="btnselectatrasos" type="button" value="" class="btn btn-info">Reiniciar <span class="glyphicon glyphicon-list-alt"></span></button>');
	$('#btnselectatrasos').click(function(){		
		$('#selectatrasos')
		.not(':button, :submit, :reset, :hidden')
		.val('')
		.removeAttr('checked')
		.removeAttr('selected'); 
		$("input.inputatrasos").val(0);
	});
	 	 	
	
});
$(document).ready(function() {
	$('#selectfugas').after('<button id="btnselectfugas" type="button" value="" class="btn btn-info">Reiniciar <span class="glyphicon glyphicon-list-alt"></span></button>');	
	$('#btnselectfugas').click(function(){		
		$('#selectfugas')
		.not(':button, :submit, :reset, :hidden')
		.val('')
		.removeAttr('checked')
		.removeAttr('selected'); 
		$("input.inputfugas").val(0); 	
	});
	
});