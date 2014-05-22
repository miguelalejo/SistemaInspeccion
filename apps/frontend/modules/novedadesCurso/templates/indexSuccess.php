<h1>Reporte Alumnos</h1>
<form action="<?php echo url_for('novedadesAlumno/search') ?>" class="form-inline" role="form">
 
    <?php foreach ($form as $widgetId => $widget): ?>		
		<div class="form-group">
			<?php echo $widget->renderLabel(null, array('class' => 'col-sm-3 control-label'))?>
			<div class="col-sm-10">
				<?php echo $widget->render() ?>
			</div>
			<div class="col-sm-offset-3 col-sm-10">
				<div class="control-group error">
					<?php echo $widget->renderError()?>
				</div>
			</div>					
		</div>		
	<?php endforeach; ?>
	<div class="form-group">
	<button type="submit" class="col-sm-offset-2 btn btn-default">
		<span class="glyphicon glyphicon-search"></span> Buscar
	</button>
	</div>	


</form>

<?php include_partial('novedadesAlumno/list', array('listaNovedadesAlumno' => $pager->getResults())) ?>
<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for('novedadesAlumno/paginar') ?>?page=1" style="text-decoration: none">
      <img src="/images/pagination/first.png" alt="First page" title="P&aacute;gina Inicial" />
    </a>
 
    <a href="<?php echo url_for('novedadesAlumno/paginar') ?>?page=<?php echo $pager->getPreviousPage() ?>" style="text-decoration: none">
      <img src="/images/pagination/previous.png" alt="Previous page" title="P&aacute;gina Anterior" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('novedadesAlumno/paginar') ?>?page=<?php echo $page ?>" class="btn btn-xs btn-info"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for('novedadesAlumno/paginar') ?>?page=<?php echo $pager->getNextPage() ?>" style="text-decoration: none">
      <img src="/images/pagination/next.png" alt="Next page" title="P&aacute;gina Siguiente" />
    </a>
 
    <a href="<?php echo url_for('novedadesAlumno/paginar') ?>?page=<?php echo $pager->getLastPage() ?>" style="text-decoration: none">
      <img src="/images/pagination/last.png" alt="Last page" title="P&aacute;gina Final" />
    </a>
  </div>
<?php endif; ?> 
<div class="pagination_desc">
  <strong><?php echo $pager->getNbResults() ?></strong> Novedades Alumnos registradas<?php if ($pager->haveToPaginate()): ?>
    - p&aacute;gina <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong> <?php endif; ?>
</div>
<br/>

 
