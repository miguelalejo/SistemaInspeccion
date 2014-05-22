<table>
  <tbody>
    <tr>
      <th>Codigo novedad curso materia horario:</th>
      <td><?php echo $novedadalumnoparcial->getCodigoNovedadCursoMateriaHorario() ?></td>
    </tr>
    <tr>
      <th>Codigo alumno:</th>
      <td><?php echo $novedadalumnoparcial->getCodigoAlumno() ?></td>
    </tr>
    <tr>
      <th>Codigo parcial:</th>
      <td><?php echo $novedadalumnoparcial->getCodigoParcial() ?></td>
    </tr>
    <tr>
      <th>Fecha:</th>
      <td><?php echo $novedadalumnoparcial->getFecha() ?></td>
    </tr>
    <tr>
      <th>Apellido:</th>
      <td><?php echo $novedadalumnoparcial->getApellido() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $novedadalumnoparcial->getNombre() ?></td>
    </tr>
    <tr>
      <th>Novedad:</th>
      <td><?php echo $novedadalumnoparcial->getNovedad() ?></td>
    </tr>
    <tr>
      <th>Curso:</th>
      <td><?php echo $novedadalumnoparcial->getCurso() ?></td>
    </tr>
    <tr>
      <th>Paralelo:</th>
      <td><?php echo $novedadalumnoparcial->getParalelo() ?></td>
    </tr>
    <tr>
      <th>Materia:</th>
      <td><?php echo $novedadalumnoparcial->getMateria() ?></td>
    </tr>
    <tr>
      <th>Horario:</th>
      <td><?php echo $novedadalumnoparcial->getHorario() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('novedadalumnoparcial/edit?codigo_novedad_curso_materia_horario='.$novedadalumnoparcial->getCodigoNovedadCursoMateriaHorario()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('novedadalumnoparcial/index') ?>">List</a>
