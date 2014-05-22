<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Novedad</th>
      <th>Descripci&oacute;n</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaTipoNovedad as $tiponovedad): ?>
    <tr>
      <td>
		<a href="<?php echo url_for('tiponovedad/show?codigo_tipo_novedad='.$tiponovedad->getCodigoTipoNovedad()) ?>">
			<figure>
				<img src="/images/icons/editar.png" alt=""/>				
				<figcaption>Editar</figcaption>
			</figure>		
		</a>
	</td>
      <td><?php echo $tiponovedad->getNovedad() ?></td>
      <td><?php echo $tiponovedad->getDescripcion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>