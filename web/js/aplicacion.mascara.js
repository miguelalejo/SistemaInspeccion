$(document).ready(function(){		
	$(".cedula").inputmask("mask", {"mask": "999999999-9"}); //specifying fn & options		
});
$(document).ready(function(){		
	$(".anio").inputmask("mask", {"mask": "9999"}); //specifying fn & options		
});
$(document).ready(function(){		
	$(".celular").inputmask("mask", {"mask": "(999)-9999999"}); //specifying fn & options		
});
$(document).ready(function(){		
	$(".telefono").inputmask("mask", {"mask": "(999)-999999"}); //specifying fn & options		
});
$(document).ready(function(){
   $(".nombre").inputmask('Regex', { regex: "[\u00D1A-Z][\u00F1a-z]* [A-Z][\u00F1a-z]*" });
});
$(document).ready(function(){
   $(".curso").inputmask('Regex', { regex: "[\u00D1A-Z][\u00F1a-z]*" });
});
$(document).ready(function(){
   $(".paralelo").inputmask('Regex', { regex: "[\u00D1A-Z]" });
});
$(document).ready(function(){
   $(".periodoescolar").inputmask('Regex', { regex: "[\u00D1A-Z][\u00F1a-z]* [\u00D1A-Z][\u00F1a-z]*" });
});
$(document).ready(function(){		
	$(".parcial").inputmask('Regex', { regex: "[\u00D1A-Z][\u00F1a-z]* [\u00D1A-Z][\u00F1a-z]*" });	
});
$(document).ready(function(){
   $(".dia").inputmask('Regex', { regex: "[\u00D1A-Z][\u00F1a-z]*" });
});
$(document).ready(function(){		
	$(".horas").inputmask("mask", {"mask": "9"}); //specifying fn & options		
});
$(document).ready(function(){
   $(".horario").inputmask('Regex', { regex: "[\u00D1A-Z][\u00F1a-z]*" });
});
$(document).ready(function(){
   $(".materia").inputmask('Regex', { regex: "[\u00D1A-Z][\u00F1a-z]* [\u00D1A-Z][\u00F1a-z]*" });
});
$(document).ready(function(){
   $(".falta").inputmask('Regex', { regex: "[\u00D1A-Z][\u00F1a-z]*" });
});
$(document).ready(function(){
   $(".novedad").inputmask('Regex', { regex: "[\u00D1A-Z][\u00F1a-z]*" });
});
$(document).ready(function(){
   $(".numero").inputmask('Regex', { regex: "[0-9][0-9]" });
});



