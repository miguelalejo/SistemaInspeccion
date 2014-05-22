<?php include(sfConfig::get('sf_app_template_dir').'/layoutlogin.php') ?>
<?php use_helper('I18N') ?>
<div class="container">
	<form class="form-signin" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
	  <table>
		<?php echo $form ?>		
	  </table>
	  <input class="btn btn-lg btn-primary btn-block" type="submit" value="<?php echo __('Acceder') ?>" />	  
	</form>
</div>