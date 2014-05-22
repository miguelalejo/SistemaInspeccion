<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
	  <th>Periodo</th>
      <th>Curso</th>
	  <th>Paralelo</th>
	  <th>D&iacute;a</th>
      <th>Horario</th>      
      <th>Materia</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listacursomateriahorario as $cursomateriahorario): ?>
    <tr>
      <td>
		<a href="<?php echo url_for('cursomateriahorario/show?codigo_curso_materia_horario='.$cursomateriahorario->getCodigoCursoMateriaHorario()) ?>">
			<figure>
				<img src="/images/icons/materia-horario.png" alt=""/>				
				<figcaption>Editar</figcaption>
			</figure>
		</a>
	  </td>
	  <td><?php echo $cursomateriahorario->getPeriodo($cursomateriahorario->getCodigoPeriodo()) ?></td>
      <td><?php echo $cursomateriahorario->getCurso($cursomateriahorario->getCodigoCurso()) ?></td>      
	  <td><?php echo $cursomateriahorario->getParalelo($cursomateriahorario->getCodigoParalelo()) ?></td>
      <td><?php echo $cursomateriahorario->getDia($cursomateriahorario->getCodigoDia()) ?></td>	  
	  <td><?php echo $cursomateriahorario->getHorario($cursomateriahorario->getCodigoHorario()) ?></td>	  
      <td><?php echo $cursomateriahorario->getMateria($cursomateriahorario->getCodigoMateria()) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>