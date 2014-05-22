<?php

/**
 * tiponovedad form base class.
 *
 * @package    form
 * @subpackage tiponovedad
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasetiponovedadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoTipoNovedad' => new sfWidgetFormInputHidden(),
      'Novedad'           => new sfWidgetFormInput(),
      'Descripcion'       => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'CodigoTipoNovedad' => new sfValidatorDoctrineChoice(array('model' => 'tiponovedad', 'column' => 'codigotiponovedad', 'required' => false)),
      'Novedad'           => new sfValidatorString(array('max_length' => 30),array('required' => 'El tipo novedad es requerido')),
      'Descripcion'       => new sfValidatorString(array('max_length' => 500, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'tiponovedad', 'column' => array('novedad')))
    );

    $this->widgetSchema->setNameFormat('tiponovedad[%s]');
	$this->widgetSchema['Novedad']->setAttribute('class', 'novedad form-control');
	$this->widgetSchema['Novedad']->setAttribute('required','required');
	$this->widgetSchema['Novedad']->setAttribute('style','width:auto');
	$this->widgetSchema['Novedad']->setAttribute('placeholder','Tipo Novedad');	
	$this->widgetSchema['Descripcion']->setAttribute('class', 'form-control');
	$this->widgetSchema['Descripcion']->setAttribute('style','width:auto');	
	$this->widgetSchema['Descripcion']->setAttribute('placeholder','Descripci&oacute;n');
	$this->widgetSchema->setLabels(array(
	'CodigoTipoNovedad' => ' ',
	'Novedad'    => 'Novedad:',
	'Descripcion'   => 'Descripci&oacute;n:',	
	));
	
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'tiponovedad';
  }

}
