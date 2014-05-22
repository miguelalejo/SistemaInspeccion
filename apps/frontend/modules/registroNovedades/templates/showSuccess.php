<table>
  <tbody>
    <tr>
      <th>Codigo alumno:</th>
      <td><?php echo $alumno->getCodigoAlumno() ?></td>
    </tr>
    <tr>
      <th>Codigo curso:</th>
      <td><?php echo $curso->getCodigoCurso() ?></td>
    </tr>
	 <tr>
      <th>Curso:</th>
      <td><?php echo $curso->getCurso() ?></td>
    </tr>
	 <tr>
      <th>Paralelo:</th>
      <td><?php echo $curso->getParalelo() ?></td>
    </tr>	
    <tr>
      <th>Cedula:</th>
      <td><?php echo $alumno->getCedula() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $alumno->getNombre() ?></td>
    </tr>
    <tr>
      <th>Apellido:</th>
      <td><?php echo $alumno->getApellido() ?></td>
    </tr>  
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('registroNovedades/edit?codigo_alumno='.$alumno->getCodigoAlumno()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('registroNovedades/index') ?>">List</a>
