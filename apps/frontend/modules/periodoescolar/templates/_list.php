<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Periodo</th>
      <th>Periodo escolar</th>
      <th>Fecha Inicio</th>
	  <th>Fecha Fin</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaPeriodosEscolares as $periodoescolar): ?>
    <tr>
      <td>
		<a href="<?php echo url_for('periodoescolar/show?codigo_periodo_escolar='.$periodoescolar->getCodigoPeriodoEscolar()) ?>">
			<figure>
				<img src="/images/icons/periodoescolar.png" alt=""/>				
				<figcaption>Editar</figcaption>
			</figure>
		</a>
	  </td>
      <td><?php echo $periodoescolar->getPeriodo($periodoescolar->getCodigoPeriodo()) ?></td>
      <td><?php echo $periodoescolar->getPeriodoEscolar() ?></td>
      <td><?php echo $periodoescolar->getFechaInicio() ?></td>
	  <td><?php echo $periodoescolar->getFechaFin() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>