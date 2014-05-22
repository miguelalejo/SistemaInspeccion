<table>
  <tbody>
    <tr>
      <th>Codigo alumno:</th>
      <td><?php echo $alumno->getCodigoAlumno() ?></td>
    </tr>
   
    <tr>
      <th>Cedula:</th>
      <td><?php echo $alumno->getCedula() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $alumno->getNombre() ?></td>
    </tr>
    <tr>
      <th>Apellido:</th>
      <td><?php echo $alumno->getApellido() ?></td>
    </tr>  
	<tr>
		<th>Periodo:</th>
		<td>
			<select id="selectperiodoalumno" onchange="buscarPeriodosEscolares()" class="selectperiodoalumno" name="selectperiodoalumno">
			  <?php foreach ($listaPeriodosAlumno as $periodo): ?>
				<option value="<?php echo $periodo->getCodigoPeriodo() ?>"><?php echo $periodo->getPeriodo() ?></option>        
			  <?php endforeach; ?>  
			</select>
		</td>

	</tr>
	<tr>
		<th>Curso:</th>
		<td>
			<select id="selectcursoalumno" onchange="buscarPeriodosEscolares()" class="selectcursoalumno" name="selectcursoalumno">
			  <?php foreach ($listaCursosAlumno as $curso): ?>
				<option value="<?php echo $curso->getCodigoCurso() ?>"><?php echo $curso->getCurso() ?></option>        
			  <?php endforeach; ?>  
			</select>
		</td>

	</tr>
  </tbody>
</table>
<input type="hidden" id="codigoAlumno" value ="<?php echo $alumno->getCodigoAlumno() ?>"></input>
<hr />
<div class="accordion" id="accordion">  
</div>
<a href="<?php echo url_for('novedadesAlumno/index') ?>" class="btn btn-primary" >Lista</a>
<a id="seleccionarCursoAlumno" href="<?php echo url_for('novedadesAlumno/seleccionarCursoAlumno') ?>">Seleccion Curso Alumno</a>
<a id="urlReporteAlumno" href="<?php echo url_for('novedadesAlumno/report') ?>">Url Reporte Alumno</a>
