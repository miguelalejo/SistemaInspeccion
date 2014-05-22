<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>C&oacute;digo periodo</th>
      <th>Periodo</th>
      <th>Descripci&oacute;n</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaPeriodos as $periodo): ?>
    <tr>
      <td>
		<a href="<?php echo url_for('periodo/show?codigo_periodo='.$periodo->getCodigoPeriodo()) ?>">
			<figure>
				<img src="/images/icons/periodo.png" alt=""/>				
				<figcaption>Editar</figcaption>
			</figure>
		</a>
	  </td>
      <td><?php echo $periodo->getPeriodo() ?></td>
      <td><?php echo $periodo->getDescripcion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>