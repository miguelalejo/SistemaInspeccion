<div class="table-responsive">
<table class="table table-striped table-hover">
 <thead>
    <tr>
      <th>#</th>
      <th>C&eacute;dula</th>
	  <th>Alumno</th>	  
	  <th>Periodo</th>
      <th>Curso</th>
	  <th>Paralelo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaCursoAlumno as $cursoalumno): ?>
    <tr>
      <td>
		<a href="<?php echo url_for('cursoalumno/show?curso_alumno='.$cursoalumno->getCodigoCursoAlumno()) ?>">
			<figure>
				<img src="/images/icons/cursoalumno.png" alt=""/>				
				<figcaption>Editar</figcaption>
			</figure>
		</a>
	  </td>
      <td><?php echo $cursoalumno->getCedulaAlumno($cursoalumno->getCodigoAlumno()) ?></td>
	  <td><?php echo $cursoalumno->getNombreCompletoAlumno($cursoalumno->getCodigoAlumno()) ?></td>
      <td><?php echo $cursoalumno->getPeriodo($cursoalumno->getCodigoPeriodo()) ?></td>
      <td><?php echo $cursoalumno->getCurso($cursoalumno->getCodigoCurso()) ?></td>
	  <td><?php echo $cursoalumno->getParalelo($cursoalumno->getCodigoParalelo()) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>