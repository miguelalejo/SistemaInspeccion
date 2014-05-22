<table>
  <tbody>
    <tr>
      <th>C&oacute;digo tipo falta:</th>
      <td><?php echo $tipofalta->getCodigoTipoFalta() ?></td>
    </tr>
    <tr>
      <th>Falta:</th>
      <td><?php echo $tipofalta->getFalta() ?></td>
    </tr>
    <tr>
      <th>Descripci&oacute;n:</th>
      <td><?php echo $tipofalta->getDescripcion() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('tipofalta/edit?codigo_tipo_falta='.$tipofalta->getCodigoTipoFalta()) ?>" class="btn btn-primary">Editar</a>
&nbsp;
<a href="<?php echo url_for('tipofalta/index') ?>" class="btn btn-primary">Lista</a>
