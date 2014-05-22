<table>
  <tbody>
    <tr>
      <th>Codigo Paralelo:</th>
      <td><?php echo $paralelo->getCodigoParalelo() ?></td>
    </tr>
    <tr>
      <th>Paralelo:</th>
      <td><?php echo $paralelo->getParalelo() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('paralelo/edit?codigo_paralelo='.$paralelo->getCodigoParalelo()) ?>" class="btn btn-primary">Editar</a>
&nbsp;
<a href="<?php echo url_for('paralelo/index') ?>" class="btn btn-primary">Lista</a>
