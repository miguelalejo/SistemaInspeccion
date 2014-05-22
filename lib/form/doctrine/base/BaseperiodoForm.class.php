<?php

/**
 * periodo form base class.
 *
 * @package    form
 * @subpackage periodo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseperiodoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoPeriodo' => new sfWidgetFormInputHidden(),
      'Periodo'       => new sfWidgetFormInput(),
      'Descripcion'   => new sfWidgetFormTextarea(),
    ));
	$curYear = date('Y');
    $this->setValidators(array(
      'CodigoPeriodo' => new sfValidatorDoctrineChoice(array('model' => 'periodo', 'column' => 'codigoperiodo', 'required' => false)),
      'Periodo'       => new sfValidatorInteger(array("min" => 2000, "max" => $curYear+1),array('required' => 'El periodo es requerido')),
      'Descripcion'   => new sfValidatorString(array('max_length' => 500, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'periodo', 'column' => array('periodo')))
    );
	$this->widgetSchema->setNameFormat('periodo[%s]');
	$this->widgetSchema['Periodo']->setAttribute('class', 'anio form-control');		
	$this->widgetSchema['Periodo']->setAttribute('placeholder','Periodo');
	$this->widgetSchema['Periodo']->setAttribute('required', 'required');
	$this->widgetSchema['Periodo']->setAttribute('style',"width:auto");
    $this->widgetSchema['Descripcion']->setAttribute('class', 'form-control');
	$this->widgetSchema['Descripcion']->setAttribute('style','width:auto');	
	$this->widgetSchema['Descripcion']->setAttribute('placeholder','Descripci&oacute;n');
	$this->widgetSchema->setLabels(array(
	'CodigoPeriodo' => ' ',
	'Periodo'    => 'Periodo:',
	'Descripcion'   => 'Descripci&oacute;n:',	
	));
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'periodo';
  }

}
