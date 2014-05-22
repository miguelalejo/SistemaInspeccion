<a href="<?php echo url_for('novedadesAlumno/index') ?>" class="btn btn-primary" >Lista</a>
<a href="<?php echo url_for('novedadesAlumno/reportePdf') ?>?codigoParcial=<?php echo $parcial->getCodigoParcial() ?>&codigoAlumno=<?php echo $alumno->getCodigoAlumno() ?>&codigoPeriodo=<?php echo $periodo->getCodigoPeriodo() ?>" class="btn btn-primary" target="_blank">Reporte</a>
<hr />
<h1>Reporte de Disciplina:</h1>
<h2>Resumen</h2>
<div class="table-responsive">
	<table class="table table-striped table-hover">
	  <thead>
		<tr>
		  <th>Tipo</th>
		  <th>Totales</th>
		  <th>Puntos</th>	 
		</tr>
	  </thead>
	  <tbody>    
		<tr>
		  <td>Faltas Justificadas</td>	  
		  <td><?php echo $totalFaltasJustificadasAlumno[0]['total'] ?></td>
		  <td>0</td>
		</tr>
		<tr>
		  <td>Faltas Injustificadas</td>
		  <td><?php echo $totalFaltasInjustificadasAlumno[0]['total'] ?></td>      
		  <td><?php echo $puntosFaltasInjustificadas ?></td>
		</tr>
		<tr>
		  <td>Fugas</td>
		  <td><?php echo $totalFugasAlumno[0]['total'] ?></td> 	   
		  <td><?php echo $puntosFugas ?></td>
		</tr>
		<tr>
		  <td>Atrasos</td>
		  <td><?php echo $totalAtrasosAlumno[0]['total'] ?></td>
		  <td><?php echo $puntosAtrasos ?></td>
		</tr>
		<tr>
		  <td>Indisciplinas</td>
		  <td><?php echo $totalIndisciplinasAlumno[0]['total'] ?></td>	
		  <td><?php echo $puntosIndisciplinas ?></td>	
		</tr>
	  </tbody>
	  <tfoot>
		<tr>
		  <td align="center" colspan="3"><h3><?php echo $cadenaTotalNotaDisciplina ?></h3></td>
		</tr>
	  </tfoot>
	</table>
</div>
<h2>Resumen de Novedades</h2>
<h2>Faltas</h2>
<div class="table-responsive">
	<table class="table table-striped table-hover">
	  <thead>
		<tr>
		  <th>Fecha</th>
		  <th>Inspector</th>
		  <th>Tipo Falta</th>	  
		</tr>
	  </thead>
	  <tbody>
		<?php foreach ($listaFaltasAlumno as $faltaAlumno): ?>
		<tr>
		  <td><?php echo $faltaAlumno->getFecha() ?></td>
		  <td><?php echo $faltaAlumno->getApellido() ?> <?php echo $faltaAlumno->getNombre() ?></td>      
		  <td><?php echo $faltaAlumno->getFalta() ?></td> 	   
		</tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>
<h2>Fugas</h2>
<div class="table-responsive">
	<table class="table table-striped table-hover">
	  <thead>
		<tr>
		  <th>Fecha</th>
		  <th>Inspector</th>
		  <th>Tipo Novedad</th>	  
		  <th>Materia</th>
		  <th>Horario</th>
		</tr>
	  </thead>
	  <tbody>
		<?php foreach ($listaFugasAlumno as $novedadAlumno): ?>
		<tr>
		  <td><?php echo $novedadAlumno->getFecha() ?></td>
		  <td><?php echo $novedadAlumno->getApellido() ?> <?php echo $novedadAlumno->getNombre() ?></td>      
		  <td><?php echo $novedadAlumno->getNovedad() ?></td> 	   
		  <td><?php echo $novedadAlumno->getMateria() ?></td>
		  <td><?php echo $novedadAlumno->getHorario() ?></td>
		</tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
	<h2>Atrasos</h2>
</div>
<div class="table-responsive">
	<table class="table table-striped table-hover">
	  <thead>
		<tr>
		  <th>Fecha</th>
		  <th>Inspector</th>
		  <th>Tipo Novedad</th>	  
		  <th>Materia</th>
		  <th>Horario</th>
		</tr>
	  </thead>
	  <tbody>
		<?php foreach ($listaAtrasosAlumno as $novedadAlumno): ?>
		<tr>
		  <td><?php echo $novedadAlumno->getFecha() ?></td>
		  <td><?php echo $novedadAlumno->getApellido() ?> <?php echo $novedadAlumno->getNombre() ?></td>      
		  <td><?php echo $novedadAlumno->getNovedad() ?></td> 	   
		  <td><?php echo $novedadAlumno->getMateria() ?></td>
		  <td><?php echo $novedadAlumno->getHorario() ?></td>
		</tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>