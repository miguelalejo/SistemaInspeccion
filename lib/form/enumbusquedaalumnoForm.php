<?php

/**
 * inspector form.
 *
 * @package    form
 * @subpackage inspector
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class enumbusquedaalumnoForm extends sfForm
{
  public function configure()
  {
	$tipobusqueda = new sfWidgetFormChoice(array('choices' => array('c' => 'Cedula','n' => 'Nombres','a' => 'Apellidos')));
	$tipobusqueda->setAttribute('class', 'foo');	
	$tipobusqueda->render('name', 'value', array('class' => 'foo'));
	$this->setWidgets(array(
		'tipobusqueda'  => new sfWidgetFormChoice(array('choices' => array('c' => 'Cedula','n' => 'Nombres','a' => 'Apellidos'))) ,		
		'parametroBusqueda' => new sfWidgetFormInput(),
	  ));
	 $this->validatorSchema = new sfValidatorChoice(array(
     'choices' => array('Cedula', 'Nombres', 'Apellidos')));

	$this->widgetSchema->setLabel('tipobusqueda','Tipo Busqueda:');
	$this->widgetSchema->setLabel('parametroBusqueda','Cedula:');
	$this->widgetSchema['tipobusqueda']->setAttribute('class', 'form-control');    
	$this->widgetSchema['tipobusqueda']->setAttribute('style',"width:auto");
	$this->widgetSchema['parametroBusqueda']->setAttribute('class', 'form-control');
	$this->widgetSchema['parametroBusqueda']->setAttribute('placeholder',"Cedula");
	$this->widgetSchema['parametroBusqueda']->setAttribute('style',"width:auto");
	$this->widgetSchema['parametroBusqueda']->setAttribute('id',"parametroBusqueda");
		
  }
}