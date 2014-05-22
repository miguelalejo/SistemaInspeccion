<table>
  <tbody>
    <tr>
      <th>C&oacute;digo alumno:</th>
      <td><?php echo $alumno->getCodigoAlumno() ?></td>
    </tr>
    <tr>
      <th>C&eacute;dula:</th>
      <td><?php echo $alumno->getCedula() ?></td>
    </tr>
    <tr>
      <th>Nombres:</th>
      <td><?php echo $alumno->getNombre() ?></td>
    </tr>
    <tr>
      <th>Apellidos:</th>
      <td><?php echo $alumno->getApellido() ?></td>
    </tr>
    <tr>
      <th>Fecha nacimiento:</th>
      <td><?php echo $alumno->getFechaNacimiento() ?></td>
    </tr>
    <tr>
      <th>Tel&eacute;fono:</th>
      <td><?php echo $alumno->getTelefono() ?></td>
    </tr>
    <tr>
      <th>Celular:</th>
      <td><?php echo $alumno->getCelular() ?></td>
    </tr>
    <tr>
      <th>Correo electr&oacute;nico:</th>
      <td><?php echo $alumno->getCorreoElectronico() ?></td>
    </tr>
    <tr>
      <th>C&eacute;dula representante:</th>
      <td><?php echo $alumno->getCedulaRepresentante() ?></td>
    </tr>
    <tr>
      <th>Nombre representante:</th>
      <td><?php echo $alumno->getNombreRepresentante() ?></td>
    </tr>
    <tr>
      <th>Apellido representante:</th>
      <td><?php echo $alumno->getApellidoRepresentante() ?></td>
    </tr>
    <tr>
      <th>Tel&eacute;fono representante:</th>
      <td><?php echo $alumno->getTelefonoRepresentante() ?></td>
    </tr>
    <tr>
      <th>Celular representante:</th>
      <td><?php echo $alumno->getCelularRepresentante() ?></td>
    </tr>
    <tr>
      <th>Correo electr&oacute;nico representante:</th>
      <td><?php echo $alumno->getCorreoElectronicoRepresentante() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('alumno/edit?codigo_alumno='.$alumno->getCodigoAlumno()) ?>" class="btn btn-primary">Editar</a>
&nbsp;
<a href="<?php echo url_for('alumno/index') ?>" class="btn btn-primary">Lista</a>
