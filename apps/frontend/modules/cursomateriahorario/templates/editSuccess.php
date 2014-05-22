<div class="panel panel-default panel-primary">
	<div class="panel-heading">Editar Curso Materia Y Horario</div>
	<div class="panel-body">
		<?php include_partial('form', array('form' => $form)) ?>
		<input type="hidden" id="error" name="error" value="<?php print $error; ?>"/>		
	</div>
</div>