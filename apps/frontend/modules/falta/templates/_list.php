<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Alumno</th>
      <th>Inspector</th>
      <th>Falta</th>
      <th>Parcial</th>
      <th>Fecha</th>      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaFalta as $falta): ?>
    <tr>
      <td>
		<a href="<?php echo url_for('falta/show?codigo_falta='.$falta->getCodigoFalta()) ?>">
			<figure>
				<img src="/images/icons/alumnofalta.png" alt=""/>				
				<figcaption>Editar</figcaption>
			</figure>
		</a>
	  </td>
      <td><?php echo $falta->getNombreCompletoAlumno($falta->getCodigoAlumno()) ?></td>
      <td><?php echo $falta->getNombreCompletoInspector($falta->getCodigoInspector()) ?></td>
      <td><?php echo $falta->getTipoFalta($falta->getCodigoTipoFalta()) ?></td>
      <td><?php echo $falta->getParcial($falta->getCodigoParcial()) ?></td>
      <td><?php echo $falta->getFecha() ?></td>      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>