<table>
  <tbody>
    <tr>
      <th>Codigo novedad curso materia horario:</th>
      <td><?php echo $novedadcursomateriahorario->getCodigoNovedadCursoMateriaHorario() ?></td>
    </tr>
    <tr>
      <th>Codigo novedad:</th>
      <td><?php echo $novedadcursomateriahorario->getCodigoNovedad() ?></td>
    </tr>
    <tr>
      <th>Codigo curso materia horario:</th>
      <td><?php echo $novedadcursomateriahorario->getCodigoCursoMateriaHorario() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('novedadcursomateriahorario/edit?codigo_novedad_curso_materia_horario='.$novedadcursomateriahorario->getCodigoNovedadCursoMateriaHorario()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('novedadcursomateriahorario/index') ?>">List</a>
