<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('horario/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?codigo_horario='.$form->getObject()->getCodigoHorario() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal" role="form">
	<?php foreach ($form as $widgetId => $widget): ?>		
		<div class="form-group">
			<?php echo $widget->renderLabel(null, array('class' => 'col-sm-2 control-label'))?>
			<div class="col-sm-10">
				<?php echo $widget->render() ?>
			</div>
			<div class="col-sm-offset-2 col-sm-10">
				<div class="control-group error">
					<?php echo $widget->renderError()?>
				</div>
			</div>					
		</div>		
	<?php endforeach; ?>				
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">		
			<?php if (!$form->getObject()->isNew()): ?>
			<input type="hidden" name="sf_method" value="put" />
			<?php endif; ?>  
			<a href="<?php echo url_for('horario/index') ?>" class="btn btn-primary">Cancelar</a>
			<?php if (!$form->getObject()->isNew()): ?>
			<?php echo link_to('Eliminar', 'horario/delete?codigo_horario='.$form->getObject()->getCodigoHorario(), array('method' => 'delete', 'confirm' => 'Esta seguro?','class'=>'btn btn-primary')) ?>
			<?php endif; ?>
			<input type="submit" value="Guardar" class="btn btn-primary" />
		</div>
	</div>	
</form>
