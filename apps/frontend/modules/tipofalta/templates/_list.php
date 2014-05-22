<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Falta</th>
      <th>Descripci&oacute;n</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaFaltas as $tipofalta): ?>
    <tr>
      <td>
		<a href="<?php echo url_for('tipofalta/show?codigo_tipo_falta='.$tipofalta->getCodigoTipoFalta()) ?>">
			<figure>
				<img src="/images/icons/editar.png" alt=""/>				
				<figcaption>Editar</figcaption>
			</figure>
		</a>
	  </td>
      <td><?php echo $tipofalta->getFalta() ?></td>
      <td><?php echo $tipofalta->getDescripcion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>