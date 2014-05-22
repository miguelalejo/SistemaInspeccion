<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>Codigo d&iacute;a</th>
      <th>D&iacute;a</th>
      <th>Horas</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaDia as $dia): ?>
    <tr>
      <td><a href="<?php echo url_for('dia/show?codigo_dia='.$dia->getCodigoDia()) ?>"><?php echo $dia->getCodigoDia() ?></a></td>
      <td><?php echo $dia->getDia() ?></td>
      <td><?php echo $dia->getHoras() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>