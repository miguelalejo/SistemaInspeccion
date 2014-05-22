<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Paralelo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaParalelos as $paralelo): ?>
    <tr>
      <td>
		<a href="<?php echo url_for('paralelo/show?codigo_paralelo='.$paralelo->getCodigoParalelo()) ?>">
			<figure>
					<img src="/images/icons/horario.png" alt=""/>				
					<figcaption>Editar</figcaption>
			</figure>
		</a>
	  </td>
      <td><?php echo $paralelo->getParalelo() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>