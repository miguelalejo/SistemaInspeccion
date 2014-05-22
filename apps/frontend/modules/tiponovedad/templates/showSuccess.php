<table>
  <tbody>
    <tr>
      <th>C&oacute;digo tipo novedad:</th>
      <td><?php echo $tiponovedad->getCodigoTipoNovedad() ?></td>
    </tr>
    <tr>
      <th>Novedad:</th>
      <td><?php echo $tiponovedad->getNovedad() ?></td>
    </tr>
    <tr>
      <th>Descripci&oacute;n:</th>
      <td><?php echo $tiponovedad->getDescripcion() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('tiponovedad/edit?codigo_tipo_novedad='.$tiponovedad->getCodigoTipoNovedad()) ?>" class="btn btn-primary">Editar</a>
&nbsp;
<a href="<?php echo url_for('tiponovedad/index') ?>" class="btn btn-primary">Lista</a>
