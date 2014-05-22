<table>
  <tbody>
    <tr>
      <th>C&oacute;digo periodo escolar:</th>
      <td><?php echo $periodoescolar->getCodigoPeriodoEscolar() ?></td>
    </tr>
    <tr>
      <th>Periodo:</th>
      <td><?php echo $periodoescolar->getPeriodo($periodoescolar->getCodigoPeriodo()) ?></td>
    </tr>
    <tr>
      <th>Periodo escolar:</th>
      <td><?php echo $periodoescolar->getPeriodoEscolar() ?></td>
    </tr>
    <tr>
      <th>Descripci&oacute;n:</th>
      <td><?php echo $periodoescolar->getDescripcion() ?></td>
    </tr>
	<tr>
      <th>Fecha Inicio:</th>
      <td><?php echo $periodoescolar->getFechaInicio() ?></td>
    </tr>
	<tr>
      <th>Fecha Fin:</th>
      <td><?php echo $periodoescolar->getFechaFin() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('periodoescolar/edit?codigo_periodo_escolar='.$periodoescolar->getCodigoPeriodoEscolar()) ?>" class="btn btn-primary">Editar</a>
&nbsp;
<a href="<?php echo url_for('periodoescolar/index') ?>" class="btn btn-primary">Lista</a>
