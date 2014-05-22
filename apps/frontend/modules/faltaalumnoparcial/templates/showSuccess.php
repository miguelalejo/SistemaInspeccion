<table>
  <tbody>
    <tr>
      <th>Codigo falta:</th>
      <td><?php echo $faltaalumnoparcial->getCodigoFalta() ?></td>
    </tr>
    <tr>
      <th>Codigo alumno:</th>
      <td><?php echo $faltaalumnoparcial->getCodigoAlumno() ?></td>
    </tr>
    <tr>
      <th>Codigo parcial:</th>
      <td><?php echo $faltaalumnoparcial->getCodigoParcial() ?></td>
    </tr>
    <tr>
      <th>Fecha:</th>
      <td><?php echo $faltaalumnoparcial->getFecha() ?></td>
    </tr>
    <tr>
      <th>Apellido:</th>
      <td><?php echo $faltaalumnoparcial->getApellido() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $faltaalumnoparcial->getNombre() ?></td>
    </tr>
    <tr>
      <th>Falta:</th>
      <td><?php echo $faltaalumnoparcial->getFalta() ?></td>
    </tr>
    <tr>
      <th>Descripcion:</th>
      <td><?php echo $faltaalumnoparcial->getDescripcion() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('faltaalumnoparcial/edit?codigo_falta='.$faltaalumnoparcial->getCodigoFalta()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('faltaalumnoparcial/index') ?>">List</a>
