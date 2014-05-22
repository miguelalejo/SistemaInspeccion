<h1>Novedadalumnoparcial List</h1>

<table>
  <thead>
    <tr>
      <th>Codigo novedad curso materia horario</th>
      <th>Codigo alumno</th>
      <th>Codigo parcial</th>
      <th>Fecha</th>
      <th>Apellido</th>
      <th>Nombre</th>
      <th>Novedad</th>
      <th>Curso</th>
      <th>Paralelo</th>
      <th>Materia</th>
      <th>Horario</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($novedadalumnoparcial_list as $novedadalumnoparcial): ?>
    <tr>
      <td><a href="<?php echo url_for('novedadalumnoparcial/show?codigo_novedad_curso_materia_horario='.$novedadalumnoparcial->getCodigoNovedadCursoMateriaHorario()) ?>"><?php echo $novedadalumnoparcial->getCodigoNovedadCursoMateriaHorario() ?></a></td>
      <td><?php echo $novedadalumnoparcial->getCodigoAlumno() ?></td>
      <td><?php echo $novedadalumnoparcial->getCodigoParcial() ?></td>
      <td><?php echo $novedadalumnoparcial->getFecha() ?></td>
      <td><?php echo $novedadalumnoparcial->getApellido() ?></td>
      <td><?php echo $novedadalumnoparcial->getNombre() ?></td>
      <td><?php echo $novedadalumnoparcial->getNovedad() ?></td>
      <td><?php echo $novedadalumnoparcial->getCurso() ?></td>
      <td><?php echo $novedadalumnoparcial->getParalelo() ?></td>
      <td><?php echo $novedadalumnoparcial->getMateria() ?></td>
      <td><?php echo $novedadalumnoparcial->getHorario() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('novedadalumnoparcial/new') ?>">New</a>
