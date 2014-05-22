<h1>Alumno List</h1>
<form action="<?php echo url_for('registroNovedades/search') ?>">
    <input type="text" name="cedula_alumno"></input>
    <input type="submit"></input>
	<table>
    <?php echo $form ?>    
  </table>
</form>

<script type="text/javascript">
 
    $(document).ready(function(){ 
        $('#test').click(function(){ 
            $('#container').load(this.href); 
            return false; 
        });
 
    });
 
</script>
 

 

<table>
  <thead>
    <tr>
      <th>Codigo alumno</th>
      <th>Cedula</th>
      <th>Nombre</th>
      <th>Apellido</th>      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($alumno_list as $alumno): ?>
    <tr>
      <td><a href="<?php echo url_for('registroNovedades/show?codigo_alumno='.$alumno->getCodigoAlumno()) ?>"><?php echo $alumno->getCodigoAlumno() ?></a></td>
      <td><?php echo $alumno->getCedula() ?></td>
      <td><?php echo $alumno->getNombre() ?></td>
      <td><?php echo $alumno->getApellido() ?></td>      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table> 
<a id="test" href="<?php echo url_for('registroNovedades/procesador') ?>">Cargar información</a>
<a id="testBusqueda" href="<?php echo url_for('registroNovedades/tipoBusqueda') ?>">Cargar Tipo Busqueda</a>
<div id="container" style="border:1px solid #000;width:300px;height:300px;overflow:auto;"/>