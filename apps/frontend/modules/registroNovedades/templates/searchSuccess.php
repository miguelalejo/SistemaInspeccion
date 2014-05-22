<h1>Alumno List</h1>
<form action="<?php echo url_for('registroNovedades/search') ?>">
    <input type="text" name="cedula_alumno"></input>
    <input type="submit"></input>
	<table>
    <?php echo $form ?>    
  </table>
</form>
<table>
  <thead>
    <tr>
      <th>Codigo alumno</th>
      <th>Codigo curso</th>
      <th>Cedula</th>
      <th>Nombre</th>
      <th>Apellido</th>      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($alumno_list as $alumno): ?>
    <tr>
      <td><a href="<?php echo url_for('registroNovedades/show?codigo_alumno='.$alumno->getCodigoAlumno().'&codigo_curso='.$alumno->getCodigoCurso()) ?>"><?php echo $alumno->getCodigoAlumno() ?></a></td>
      <td><?php echo $alumno->getCodigoCurso() ?></td>
      <td><?php echo $alumno->getCedula() ?></td>
      <td><?php echo $alumno->getNombre() ?></td>
      <td><?php echo $alumno->getApellido() ?></td>      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table> 