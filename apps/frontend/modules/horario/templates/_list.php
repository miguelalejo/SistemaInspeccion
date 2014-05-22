<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Horario</th>
      <th>Descripci&oacute;n</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaHorario as $horario): ?>
    <tr>
      <td>
		<a href="<?php echo url_for('horario/show?codigo_horario='.$horario->getCodigoHorario()) ?>">
			<figure>
					<img src="/images/icons/horario.png" alt=""/>				
					<figcaption>Editar</figcaption>
			</figure>
		</a>
	  </td>
      <td><?php echo $horario->getHorario() ?></td>
      <td><?php echo $horario->getDescripcion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>