<h1>Faltaalumnoparcial List</h1>

<table>
  <thead>
    <tr>
      <th>Codigo falta</th>
      <th>Codigo alumno</th>
      <th>Codigo parcial</th>
      <th>Fecha</th>
      <th>Apellido</th>
      <th>Nombre</th>
      <th>Falta</th>
      <th>Descripcion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($faltaalumnoparcial_list as $faltaalumnoparcial): ?>
    <tr>
      <td><a href="<?php echo url_for('faltaalumnoparcial/show?codigo_falta='.$faltaalumnoparcial->getCodigoFalta()) ?>"><?php echo $faltaalumnoparcial->getCodigoFalta() ?></a></td>
      <td><?php echo $faltaalumnoparcial->getCodigoAlumno() ?></td>
      <td><?php echo $faltaalumnoparcial->getCodigoParcial() ?></td>
      <td><?php echo $faltaalumnoparcial->getFecha() ?></td>
      <td><?php echo $faltaalumnoparcial->getApellido() ?></td>
      <td><?php echo $faltaalumnoparcial->getNombre() ?></td>
      <td><?php echo $faltaalumnoparcial->getFalta() ?></td>
      <td><?php echo $faltaalumnoparcial->getDescripcion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('faltaalumnoparcial/new') ?>">New</a>
