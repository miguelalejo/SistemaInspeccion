<table>
  <tbody>
    <tr>
      <th>C&oacute;digo inspector:</th>
      <td><?php echo $inspector->getCodigoInspector() ?></td>
    </tr>
    <tr>
      <th>C&eacute;dula:</th>
      <td><?php echo $inspector->getCedula() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $inspector->getNombre() ?></td>
    </tr>
    <tr>
      <th>Apellido:</th>
      <td><?php echo $inspector->getApellido() ?></td>
    </tr>
    <tr>
      <th>Tel&eacute;fono:</th>
      <td><?php echo $inspector->getTelefono() ?></td>
    </tr>
    <tr>
      <th>Celular:</th>
      <td><?php echo $inspector->getCelular() ?></td>
    </tr>
    <tr>
      <th>Correo electr&oacute;nico:</th>
      <td><?php echo $inspector->getCorreoElectronico() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('inspector/edit?codigo_inspector='.$inspector->getCodigoInspector()) ?>" class="btn btn-primary">Editar</a>
&nbsp;
<a href="<?php echo url_for('inspector/index') ?>" class="btn btn-primary">Lista</a>
