<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
    <tr>
      <th>#</th>
      <th>C&eacute;dula</th>
      <th>Nombre Completo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaNovedadesAlumno as $alumno): ?>
    <tr>
      <td>
		<a href="<?php echo url_for('novedadesAlumno/show?codigo_alumno='.$alumno->getCodigoAlumno()) ?>">
			<figure>
				<img src="/images/icons/reporte.png" alt=""/>				
				<figcaption>Editar</figcaption>
			</figure>
		</a>
	  </td>
      <td><?php echo $alumno->getCedula() ?></td>
      <td><?php echo $alumno->getApellido() ?> <?php echo $alumno->getNombre() ?></td>       
    </tr>
    <?php endforeach; ?>
  </tbody>  
</table>
</div>