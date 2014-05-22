<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>C&oacute;digo parcial</th>
      <th>Periodo escolar</th>
      <th>Parcial</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaParciales as $parcial): ?>
    <tr>
      <td>
		<a href="<?php echo url_for('parcial/show?codigo_parcial='.$parcial->getCodigoParcial()) ?>">
			<figure>
				<img src="/images/icons/parcial.png" alt=""/>				
				<figcaption>Editar</figcaption>
			</figure>
		</a>
	  </td>
      <td><?php echo $parcial->getPeriodoEscolar($parcial->getCodigoPeriodoEscolar()) ?></td>
      <td><?php echo $parcial->getParcial() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>