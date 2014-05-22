<div class="panel panel-default panel-primary">
	<div class="panel-heading">Editar Inspector</div>
	<div class="panel-body">
		<?php include_partial('form', array('form' => $form)) ?>
		<input type="hidden" id="error" name="error" value="<?php print $error; ?>"/>	
		<div class="col-sm-offset-3 col-sm-10">
			<img src="<?php print $rutaImagenInspector; ?>" alt="Alumno" class="img-thumbnail">
		</div>
	</div>
</div>