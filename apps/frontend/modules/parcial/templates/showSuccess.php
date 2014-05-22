<table>
  <tbody>
    <tr>
      <th>C&oacute;digo parcial:</th>
      <td><?php echo $parcial->getCodigoParcial() ?></td>
    </tr>
    <tr>
      <th>Periodo escolar:</th>
      <td><?php echo $parcial->getPeriodoEscolar($parcial->getCodigoPeriodoEscolar()) ?></td>
    </tr>
    <tr>
      <th>Parcial:</th>
      <td><?php echo $parcial->getParcial() ?></td>
    </tr>
    <tr>
      <th>Descripci&oacute;n:</th>
      <td><?php echo $parcial->getDescripcion() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('parcial/edit?codigo_parcial='.$parcial->getCodigoParcial()) ?>" class="btn btn-primary">Editar</a>
&nbsp;
<a href="<?php echo url_for('parcial/index') ?>" class="btn btn-primary">Lista</a>
