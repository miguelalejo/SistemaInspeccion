<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>C&eacute;dula</th>
      <th>Nombre Completo</th>          
      <th>Tel&eacute;fono</th>
      <th>Celular</th>          
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaAlumno as $alumno): ?>
    <tr>
      <td>
		<a href="<?php echo url_for('alumno/show?codigo_alumno='.$alumno->getCodigoAlumno()) ?>">
			<figure>
				<img src="/images/icons/alumno.png" alt=""/>				
				<figcaption>Editar</figcaption>
			</figure>
		</a>
	  </td>
      <td><?php echo $alumno->getCedula() ?></td>
      <td><?php echo $alumno->getApellido() ?> <?php echo $alumno->getNombre() ?></td>       
      <td><?php echo $alumno->getTelefono() ?></td>
      <td><?php echo $alumno->getCelular() ?></td>      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>