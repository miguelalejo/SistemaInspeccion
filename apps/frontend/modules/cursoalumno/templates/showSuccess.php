<table>
  <tbody>
    <tr>
      <th>C&oacute;digo curso alumno:</th>
      <td><?php echo $cursoalumno->getCodigoCursoAlumno() ?></td>
    </tr>
    <tr>
      <th>C&eacute;dula:</th>
      <td><?php echo $cursoalumno->getCedulaAlumno($cursoalumno->getCodigoAlumno()) ?></td>
    </tr>
	<tr>
      <th>Alumno:</th>
      <td><?php echo $cursoalumno->getNombreCompletoAlumno($cursoalumno->getCodigoAlumno()) ?></td>
    </tr>
    <tr>
      <th>Curso:</th>
      <td><?php echo $cursoalumno->getCurso($cursoalumno->getCodigoCurso()) ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('cursoalumno/edit?curso_alumno='.$cursoalumno->getCodigoCursoAlumno()) ?>" class="btn btn-primary">Editar</a>
&nbsp;
<a href="<?php echo url_for('cursoalumno/index') ?>" class="btn btn-primary">Lista</a>
