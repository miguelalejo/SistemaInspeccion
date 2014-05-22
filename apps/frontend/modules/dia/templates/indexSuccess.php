<h1>Lista de D&iacute;as</h1>
<?php include_partial('dia/list', array('listaDia' => $pager->getResults())) ?>
<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for('dia/paginar') ?>?page=1" style="text-decoration: none">
      <img src="/images/pagination/first.png" alt="First page" title="P&aacute;gina Inicial" />
    </a>
 
    <a href="<?php echo url_for('dia/paginar') ?>?page=<?php echo $pager->getPreviousPage() ?>" style="text-decoration: none">
      <img src="/images/pagination/previous.png" alt="Previous page" title="P&aacute;gina Anterior" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('dia/paginar') ?>?page=<?php echo $page ?>" class="btn btn-xs btn-info"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for('dia/paginar') ?>?page=<?php echo $pager->getNextPage() ?>" style="text-decoration: none">
      <img src="/images/pagination/next.png" alt="Next page" title="P&aacute;gina Siguiente" />
    </a>
 
    <a href="<?php echo url_for('dia/paginar') ?>?page=<?php echo $pager->getLastPage() ?>" style="text-decoration: none">
      <img src="/images/pagination/last.png" alt="Last page" title="P&aacute;gina Final" />
    </a>
  </div>
<?php endif; ?> 
<div class="pagination_desc">
  <strong><?php echo $pager->getNbResults() ?></strong> D&iacute;as registrados<?php if ($pager->haveToPaginate()): ?>
    - p&aacute;gina <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong> <?php endif; ?>
</div>
<br/>
<a href="<?php echo url_for('dia/new') ?>" class="btn btn-primary">Nuevo</a>
