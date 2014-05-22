<table>
  <tbody>
    <tr>
      <th>C&oacute;digo materia:</th>
      <td><?php echo $materia->getCodigoMateria() ?></td>
    </tr>
    <tr>
      <th>Materia:</th>
      <td><?php echo $materia->getMateria() ?></td>
    </tr>
    <tr>
      <th>Descripci&oacute;n:</th>
      <td><?php echo $materia->getDescripcion() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('materia/edit?codigo_materia='.$materia->getCodigoMateria()) ?>" class="btn btn-primary">Editar</a>
&nbsp;
<a href="<?php echo url_for('materia/index') ?>" class="btn btn-primary">Lista</a>
