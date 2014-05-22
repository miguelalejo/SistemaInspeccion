<table>
  <tbody>
    <tr>
      <th>C&oacute;digo novedad:</th>
      <td><?php echo $novedad->getCodigoNovedad() ?></td>
    </tr>
    <tr>
      <th>Alumno:</th>
      <td><?php echo $novedad->getNombreCompletoAlumno($novedad->getCodigoAlumno()) ?></td>
    </tr>
	<tr>
      <th>C&eacute;dula:</th>
      <td><?php echo $novedad->getCedulaAlumno($novedad->getCodigoAlumno()) ?></td>
    </tr>
    <tr>
      <th>Inspector:</th>
      <td><?php echo $novedad->getNombreCompletoInspector($novedad->getCodigoInspector()) ?></td>
    </tr>
    <tr>
      <th>Parcial:</th>
      <td><?php echo $novedad->getParcial($novedad->getCodigoParcial()) ?></td>
    </tr>
    <tr>
      <th>Fugas:</th>
      <td><?php echo $novedad->getFugas() ?></td>
    </tr>
    <tr>
      <th>Atrasos:</th>
      <td><?php echo $novedad->getAtrasos() ?></td>
    </tr>
    <tr>
      <th>Indisciplinas:</th>
      <td><?php echo $novedad->getIndisciplinas() ?></td>
    </tr>
    <tr>
      <th>Fecha:</th>
      <td><?php echo $novedad->getFecha() ?></td>
    </tr>
    <tr>
      <th>Descripci&oacute;n:</th>
      <td><?php echo $novedad->getDescripcion() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('novedad/edit?codigo_novedad='.$novedad->getCodigoNovedad()) ?>" class="btn btn-primary">Editar</a>
&nbsp;
<a href="<?php echo url_for('novedad/index') ?>" class="btn btn-primary">Lista</a>
