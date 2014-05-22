$(document).ready(function(){ 
   buscarPeriodosEscolares();
});
function buscarPeriodosEscolares()
{
	$("#accordion").empty();    
	var periodoAlumno;
	$('#selectperiodoalumno option:selected').each(function(index, element){ 
		periodoAlumno = $(element).val(); 
	});		
	var codigoAlumno=$('#codigoAlumno').val();
	var a_href = $('#seleccionarCursoAlumno').attr('href');						
	$('#accordion').empty()
	$.ajax({
	 url: a_href,
	 data: { "codigoPeriodo": periodoAlumno },
	 type: "GET",
	 beforeSend: function(xhr){xhr.setRequestHeader('X-Test-Header', 'test-value');},
	 success: function(data, textStatus, request){
		var arregloPeriodoEscolar = jQuery.parseJSON(request.getResponseHeader('X-JSON'));
		if(arregloPeriodoEscolar!=null)
		{
			for (var i=0; i<arregloPeriodoEscolar.length; i++) {
				var idAcordeonPeriodo = arregloPeriodoEscolar[i].Periodo.PeriodoEscolar.periodoescolar.replace(/ /g,'');
				var valorAcordeonPeriodo = arregloPeriodoEscolar[i].Periodo.PeriodoEscolar.periodoescolar;
				var listaParciales = '<lu>';
				for (var j=0; j<arregloPeriodoEscolar[i].Periodo.ListaParciales.length; j++) {
					var parcial = arregloPeriodoEscolar[i].Periodo.ListaParciales[j];
					var urlReporteAlumno = $('#urlReporteAlumno').attr('href')+"?codigoParcial="+parcial.codigoparcial+"&codigoAlumno="+codigoAlumno+"&codigoPeriodo="+periodoAlumno;
					var linkReporte='<a href="'+urlReporteAlumno+'">'+parcial.parcial+'</a>';
					listaParciales+='<li>'+linkReporte+'</li>';
				}
				listaParciales+= '</lu>';					
				$('#accordion').append('<div class="accordion-group">'+
											'<div class="accordion-heading">'+
												'<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"  href="#'+idAcordeonPeriodo+'">'+
														valorAcordeonPeriodo+
												'</a>'+ 
											'</div>'+
											'<div style="height: 0px;" id="'+idAcordeonPeriodo+'" class="accordion-body collapse">'+
												'<div class="accordion-inner">'+
													listaParciales+
												'</div>'+
											'</div>'+
										'</div>');	
			}
		}		
		
	 }
  });			
	
}