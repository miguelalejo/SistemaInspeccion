<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Curso</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaCurso as $curso): ?>
    <tr>
      <td>
		<a href="<?php echo url_for('curso/show?codigo_curso='.$curso->getCodigoCurso()) ?>">
			<figure>
				<img src="/images/icons/curso.png" alt=""/>				
				<figcaption>Editar</figcaption>
			</figure>
		</a>
	  </td>
      <td><?php echo $curso->getCurso() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>