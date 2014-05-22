<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>C&eacute;dula</th>
      <th>Nombre Completo</th>      
      <th>Tel&eacute;fono</th>
      <th>Celular</th>      	  
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaInspectores as $inspector): ?>
    <tr>
      <td>
		<a href="<?php echo url_for('inspector/show?codigo_inspector='.$inspector->getCodigoInspector()) ?>">
			<figure>
				<img src="/images/icons/inspector.png" alt=""/>				
				<figcaption>Editar</figcaption>
			</figure>
		</a>
	  </td>
      <td><?php echo $inspector->getCedula() ?></td>
      <td><?php echo $inspector->getApellido() ?> <?php echo $inspector->getNombre() ?></td>      
      <td><?php echo $inspector->getTelefono() ?></td>
      <td><?php echo $inspector->getCelular() ?></td>      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>