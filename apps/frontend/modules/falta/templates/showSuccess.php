<table>
  <tbody>
    <tr>
      <th>C&oacute;digo falta:</th>
      <td><?php echo $falta->getCodigoFalta() ?></td>
    </tr>
    <tr>
      <th>Alumno:</th>
      <td><?php echo $falta->getNombreCompletoAlumno($falta->getCodigoAlumno()) ?></td>
    </tr>
    <tr>
      <th>Inspector:</th>
      <td><?php echo $falta->getNombreCompletoInspector($falta->getCodigoInspector()) ?></td>
    </tr>
    <tr>
      <th>Falta:</th>
      <td><?php echo $falta->getTipoFalta($falta->getCodigoTipoFalta()) ?></td>
    </tr>
    <tr>
      <th>Parcial:</th>
      <td><?php echo $falta->getParcial($falta->getCodigoParcial()) ?></td>
    </tr>
    <tr>
      <th>Fecha:</th>
      <td><?php echo $falta->getFecha() ?></td>
    </tr>
    <tr>
      <th>Descripci&oacute;n:</th>
      <td><?php echo $falta->getDescripcion() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('falta/edit?codigo_falta='.$falta->getCodigoFalta()) ?>" class="btn btn-primary">Editar</a>
&nbsp;
<a href="<?php echo url_for('falta/index') ?>" class="btn btn-primary">Lista</a>
