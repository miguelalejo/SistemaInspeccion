<?php

/**
 * horario form base class.
 *
 * @package    form
 * @subpackage horario
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasehorarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoHorario' => new sfWidgetFormInputHidden(),
      'Horario'       => new sfWidgetFormInput(),
      'Descripcion'   => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'CodigoHorario' => new sfValidatorDoctrineChoice(array('model' => 'horario', 'column' => 'codigohorario', 'required' => false)),
      'Horario'       => new sfValidatorString(array('max_length' => 50),array('required' => 'El horario es requerido')),
      'Descripcion'   => new sfValidatorString(array('max_length' => 500, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'horario', 'column' => array('horario')))
    );

    $this->widgetSchema->setNameFormat('horario[%s]');
	$this->widgetSchema['Horario']->setAttribute('class', 'horario form-control');
	$this->widgetSchema['Horario']->setAttribute('required','required');
	$this->widgetSchema['Horario']->setAttribute('style',"width:auto");
	$this->widgetSchema['Horario']->setAttribute('placeholder',"Horario");    
	$this->widgetSchema['Descripcion']->setAttribute('class', 'form-control');
	$this->widgetSchema['Descripcion']->setAttribute('style','width:auto');	
	$this->widgetSchema['Descripcion']->setAttribute('placeholder','Descripci&oacute;n');
	$this->widgetSchema->setLabels(array(
	'CodigoHorario' => ' ',
	'Horario'    => 'Horario:',
	'Descripcion'   => 'Descripci&oacute;n:',	
	));
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'horario';
  }

}
