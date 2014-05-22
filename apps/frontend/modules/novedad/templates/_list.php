<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
    <tr>
      <th>C&oacute;digo novedad</th>
      <th>Alumno</th>      
	  <th>C&eacute;dula</th>
      <th>Parcial</th>      
      <th>Fecha</th>      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaNovedades as $novedad): ?>
    <tr>
      <td>
		<a href="<?php echo url_for('novedad/show?codigo_novedad='.$novedad->getCodigoNovedad()) ?>">
			<figure>
				<img src="/images/icons/alumnonovedad.png" alt=""/>				
				<figcaption>Editar</figcaption>
			</figure>
		</a>
	  </td>
      <td><?php echo $novedad->getNombreCompletoAlumno($novedad->getCodigoAlumno()) ?></td>
	  <td><?php echo $novedad->getCedulaAlumno($novedad->getCodigoAlumno()) ?></td>       
      <td><?php echo $novedad->getParcial($novedad->getCodigoParcial()) ?></td>
      <td><?php echo $novedad->getFecha() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>