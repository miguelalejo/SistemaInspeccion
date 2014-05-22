<table>
  <tbody>
    <tr>
      <th>Codigo curso materia horario:</th>
      <td><?php echo $cursomateriahorario->getCodigoCursoMateriaHorario() ?></td>
    </tr>
    <tr>
      <th>Curso:</th>
      <td><?php echo $cursomateriahorario->getCurso($cursomateriahorario->getCodigoCurso()) ?></td>
    </tr>
    <tr>
      <th>Horario:</th>
      <td><?php echo $cursomateriahorario->getHorario($cursomateriahorario->getCodigoHorario()) ?></td>
    </tr>
    <tr>
      <th>D&iacute;a:</th>
      <td><?php echo $cursomateriahorario->getDia($cursomateriahorario->getCodigoDia()) ?></td>
    </tr>
    <tr>
      <th>Materia:</th>
      <td><?php echo $cursomateriahorario->getMateria($cursomateriahorario->getCodigoMateria()) ?></td>
    </tr>
    <tr>
      <th>Descripci&oacute;n:</th>
      <td><?php echo $cursomateriahorario->getDescripcion() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('cursomateriahorario/edit?codigo_curso_materia_horario='.$cursomateriahorario->getCodigoCursoMateriaHorario()) ?>" class="btn btn-primary">Editar</a>
&nbsp;
<a href="<?php echo url_for('cursomateriahorario/index') ?>" class="btn btn-primary">Lista</a>
