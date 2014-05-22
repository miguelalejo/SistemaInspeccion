<h1>Novedadcursomateriahorario List</h1>

<table>
  <thead>
    <tr>
      <th>Codigo novedad curso materia horario</th>
      <th>Codigo novedad</th>
      <th>Codigo curso materia horario</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($novedadcursomateriahorario_list as $novedadcursomateriahorario): ?>
    <tr>
      <td><a href="<?php echo url_for('novedadcursomateriahorario/show?codigo_novedad_curso_materia_horario='.$novedadcursomateriahorario->getCodigoNovedadCursoMateriaHorario()) ?>"><?php echo $novedadcursomateriahorario->getCodigoNovedadCursoMateriaHorario() ?></a></td>
      <td><?php echo $novedadcursomateriahorario->getCodigoNovedad() ?></td>
      <td><?php echo $novedadcursomateriahorario->getCodigoCursoMateriaHorario() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('novedadcursomateriahorario/new') ?>">New</a>
