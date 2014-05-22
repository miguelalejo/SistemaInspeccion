<h1>Reporte Alumnos</h1>
<?php include_partial('novedadesAlumno/list', array('listaNovedadesAlumno' => $pager->getResults())) ?>
<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for('novedadesAlumno/paginarSearch') ?>?page=1<?php echo $parametro ?>" style="text-decoration: none">
      <img src="/images/pagination/first.png" alt="First page" title="P&aacute;gina Inicial" />
    </a>
 
    <a href="<?php echo url_for('novedadesAlumno/paginarSearch') ?>?page=<?php echo $pager->getPreviousPage() ?><?php echo $parametro ?>" style="text-decoration: none">
      <img src="/images/pagination/previous.png" alt="Previous page" title="P&aacute;gina Anterior" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('novedadesAlumno/paginarSearch') ?>?page=<?php echo $page ?><?php echo $parametro ?>" class="btn btn-xs btn-info"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for('novedadesAlumno/paginarSearch') ?>?page=<?php echo $pager->getNextPage() ?><?php echo $parametro ?>" style="text-decoration: none">
      <img src="/images/pagination/next.png" alt="Next page" title="P&aacute;gina Siguiente" />
    </a>
 
    <a href="<?php echo url_for('novedadesAlumno/paginarSearch') ?>?page=<?php echo $pager->getLastPage() ?><?php echo $parametro ?>" style="text-decoration: none">
      <img src="/images/pagination/last.png" alt="Last page" title="P&aacute;gina Final" />
    </a>
  </div>
<?php endif; ?> 
<div class="pagination_desc">
  <strong><?php echo $pager->getNbResults() ?></strong> Novedades Alumnos registrados<?php if ($pager->haveToPaginate()): ?>
    - p&aacute;gina <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong> <?php endif; ?>
</div>
<hr />
<a href="<?php echo url_for('novedadesAlumno/index') ?>" class="btn btn-primary" >Lista</a> 
