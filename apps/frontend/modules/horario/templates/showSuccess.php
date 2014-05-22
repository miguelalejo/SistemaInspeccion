<table>
  <tbody>
    <tr>
      <th>C&oacute;digo horario:</th>
      <td><?php echo $horario->getCodigoHorario() ?></td>
    </tr>
    <tr>
      <th>Horario:</th>
      <td><?php echo $horario->getHorario() ?></td>
    </tr>
    <tr>
      <th>Descripci&oacute;n:</th>
      <td><?php echo $horario->getDescripcion() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('horario/edit?codigo_horario='.$horario->getCodigoHorario()) ?>" class="btn btn-primary">Editar</a>
&nbsp;
<a href="<?php echo url_for('horario/index') ?>" class="btn btn-primary">Lista</a>
