<table>
  <tbody>
    <tr>
      <th>C&oacute;digo periodo:</th>
      <td><?php echo $periodo->getCodigoPeriodo() ?></td>
    </tr>
    <tr>
      <th>Periodo:</th>
      <td><?php echo $periodo->getPeriodo() ?></td>
    </tr>
    <tr>
      <th>Descripci&oacute;n:</th>
      <td><?php echo $periodo->getDescripcion() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('periodo/edit?codigo_periodo='.$periodo->getCodigoPeriodo()) ?>" class="btn btn-primary">Editar</a>
&nbsp;
<a href="<?php echo url_for('periodo/index') ?>" class="btn btn-primary">Lista</a>
