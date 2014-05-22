<?php

require_once '/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    // for compatibility / remove and enable only the plugins you want
	$this->enablePlugins(array(
      'sfDoctrinePlugin', 
      'sfDoctrineGuardPlugin'
    ));
    $this->enableAllPluginsExcept(array('sfPropelPlugin', 'sfCompat10Plugin'));
	//sfConfig::set('sf_upload_dir', sfConfig::get('sf_root_dir').DIRECTORY_SEPARATOR.'web'.DIRECTORY_SEPARATOR.'uploads');
	//sfConfig::set('sf_upload_dir_name', 'http://localhost/SistemaInspeccion/web/');
  }
}
