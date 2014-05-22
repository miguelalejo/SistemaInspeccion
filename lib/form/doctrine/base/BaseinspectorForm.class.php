<?php

/**
 * inspector form base class.
 *
 * @package    form
 * @subpackage inspector
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseinspectorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoInspector'   => new sfWidgetFormInputHidden(),
      'Cedula'            => new sfWidgetFormInput(),
      'Nombre'            => new sfWidgetFormInput(),
      'Apellido'          => new sfWidgetFormInput(),
      'Telefono'          => new sfWidgetFormInput(),
      'Celular'           => new sfWidgetFormInput(),
      'CorreoElectronico' => new sfWidgetFormInput(),
      'Imagen'            => new sfWidgetFormInputFile(),
    ));

    $this->setValidators(array(
      'CodigoInspector'   => new sfValidatorDoctrineChoice(array('model' => 'inspector', 'column' => 'codigoinspector', 'required' => false)),
      'Cedula'            => new sfValidatorString(array('max_length' => 11,'min_length' => 11),array('required' => 'La c&eacute;dula es requerida')),
      'Nombre'            => new sfValidatorString(array('max_length' => 30),array('required' => 'El nombre es requerido')),
      'Apellido'          => new sfValidatorString(array('max_length' => 30),array('required' => 'El apellido es requerido')),
      'Telefono'          => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'Celular'           => new sfValidatorString(array('max_length' => 13, 'required' => false)),
      'CorreoElectronico' => new sfValidatorEmail(),
      'Imagen'            => new sfValidatorFileImage(array('required'   => false,'path'=> sfConfig::get('sf_upload_dir').'/inspectores','mime_types' => 'web_images','max_size' => '60000','max_height' => 300,'min_height' =>  200,'max_width' => 300, 'min_width' =>  200,))
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'inspector', 'column' => array('cedula')))
    );

    $this->widgetSchema->setNameFormat('inspector[%s]');
	$this->widgetSchema['Cedula']->setAttribute('class', 'cedula form-control');	
	$this->widgetSchema['Cedula']->setAttribute('style',"width:auto");
	$this->widgetSchema['Cedula']->setAttribute('placeholder',"C&eacute;dula Inspector");
	$this->widgetSchema['Cedula']->setAttribute('required', 'required');
	$this->widgetSchema['Nombre']->setAttribute('class', 'nombre form-control');
	$this->widgetSchema['Nombre']->setAttribute('style',"width:auto");
	$this->widgetSchema['Nombre']->setAttribute('placeholder',"Nombre Inspector");
	$this->widgetSchema['Nombre']->setAttribute('required', 'required');
	$this->widgetSchema['Apellido']->setAttribute('class', 'nombre form-control');
	$this->widgetSchema['Apellido']->setAttribute('style',"width:auto");
	$this->widgetSchema['Apellido']->setAttribute('placeholder',"Apellido Inspector");
	$this->widgetSchema['Apellido']->setAttribute('required', 'required');
	$this->widgetSchema['Telefono']->setAttribute('class', 'telefono form-control');
	$this->widgetSchema['Telefono']->setAttribute('style',"width:auto");
	$this->widgetSchema['Telefono']->setAttribute('placeholder',"Tel&eacute;fono Inspector");
	$this->widgetSchema['Celular']->setAttribute('class', 'celular form-control');
	$this->widgetSchema['Celular']->setAttribute('style',"width:auto");
	$this->widgetSchema['Celular']->setAttribute('placeholder',"Celular Inspector");	
	$this->widgetSchema['CorreoElectronico']->setAttribute('class', 'form-control');
	$this->widgetSchema['CorreoElectronico']->setAttribute('style',"width:auto");
	$this->widgetSchema['CorreoElectronico']->setAttribute('placeholder',"Correo Electr&oacute;nico");
	$this->widgetSchema['Imagen']->setAttribute('class', 'btn btn-info');
	$this->widgetSchema['Imagen']->setAttribute('style','width:auto');	
	$this->widgetSchema->setLabels(array(
	'CodigoInspector' => ' ',
	'Cedula'    => 'C&eacute;dula:',
	'Nombre'    => 'Nombre:',
	'Apellido'   => 'Apellido:',	
	'Telefono'   => 'Tel&eacute;fono:',	
	'Celular'   => 'Celular:',	
	'CorreoElectronico'   => 'Correo Electr&oacute;nico',		
	));
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'inspector';
  }

}
