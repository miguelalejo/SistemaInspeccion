<?php
// auto-generated by sfRoutingConfigHandler
// date: 2014/05/22 03:55:12
return array(
'sfTCPDF' => new sfRoute('/sfTCPDF/:action', array (
  'module' => 'sfTCPDF',
  'action' => 'test',
), array (
), array (
)),
'homepage' => new sfRoute('/', array (
  'module' => 'principal',
  'action' => 'index',
), array (
), array (
)),
'default_index' => new sfRoute('/:module', array (
  'action' => 'index',
), array (
), array (
)),
'default' => new sfRoute('/:module/:action/*', array (
), array (
), array (
)),
'ruta_alumno' => new sfRoute('/alumno', array (
  'module' => 'alumno',
  'action' => 'index',
), array (
), array (
)),
'ruta_curso' => new sfRoute('/curso', array (
  'module' => 'curso',
  'action' => 'index',
), array (
), array (
)),
'ruta_paralelo' => new sfRoute('/paralelo', array (
  'module' => 'paralelo',
  'action' => 'index',
), array (
), array (
)),
'ruta_inspector' => new sfRoute('/inspector', array (
  'module' => 'inspector',
  'action' => 'index',
), array (
), array (
)),
'ruta_materia' => new sfRoute('/materia', array (
  'module' => 'materia',
  'action' => 'index',
), array (
), array (
)),
'ruta_horario' => new sfRoute('/horario', array (
  'module' => 'horario',
  'action' => 'index',
), array (
), array (
)),
'ruta_dia' => new sfRoute('/dia', array (
  'module' => 'dia',
  'action' => 'index',
), array (
), array (
)),
'ruta_tiponovedad' => new sfRoute('/tiponovedad', array (
  'module' => 'tiponovedad',
  'action' => 'index',
), array (
), array (
)),
'ruta_tipofalta' => new sfRoute('/tipofalta', array (
  'module' => 'tipofalta',
  'action' => 'index',
), array (
), array (
)),
'ruta_cursoalumno' => new sfRoute('/cursoalumno', array (
  'module' => 'cursoalumno',
  'action' => 'index',
), array (
), array (
)),
'ruta_novedad' => new sfRoute('/novedad', array (
  'module' => 'novedad',
  'action' => 'index',
), array (
), array (
)),
'ruta_falta' => new sfRoute('/falta', array (
  'module' => 'falta',
  'action' => 'index',
), array (
), array (
)),
'ruta_cursomateriahorario' => new sfRoute('/cursomateriahorario', array (
  'module' => 'cursomateriahorario',
  'action' => 'index',
), array (
), array (
)),
'ruta_novedadesAlumno' => new sfRoute('/novedadesAlumno', array (
  'module' => 'novedadesAlumno',
  'action' => 'index',
), array (
), array (
)),
'ruta_periodo' => new sfRoute('/periodo', array (
  'module' => 'periodo',
  'action' => 'index',
), array (
), array (
)),
'ruta_periodoescolar' => new sfRoute('/periodoescolar', array (
  'module' => 'periodoescolar',
  'action' => 'index',
), array (
), array (
)),
'ruta_parcial' => new sfRoute('/parcial', array (
  'module' => 'parcial',
  'action' => 'index',
), array (
), array (
)),
'ruta_logout' => new sfRoute('/logout', array (
), array (
), array (
)),
);
