<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>C&oacute;digo materia</th>
      <th>Materia</th>
      <th>Descripci&oacute;n</th>	  
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaMaterias as $materia): ?>
    <tr>
      <td>
		<a href="<?php echo url_for('materia/show?codigo_materia='.$materia->getCodigoMateria()) ?>">
			<figure>
				<img src="/images/icons/materia.png" alt=""/>				
				<figcaption>Editar</figcaption>
			</figure>
		</a>
	   </td>
      <td><?php echo $materia->getMateria() ?></td>
      <td><?php echo $materia->getDescripcion() ?></td>	  
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>