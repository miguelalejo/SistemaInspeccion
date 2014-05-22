<?php

/**
 * parcial form base class.
 *
 * @package    form
 * @subpackage parcial
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseparcialForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoParcial'        => new sfWidgetFormInputHidden(),
      'CodigoPeriodoEscolar' => new sfWidgetFormDoctrineChoice(array('model' => 'periodoescolar', 'add_empty' => false)),
      'Parcial'              => new sfWidgetFormInput(),
      'Descripcion'          => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'CodigoParcial'        => new sfValidatorDoctrineChoice(array('model' => 'parcial', 'column' => 'codigoparcial', 'required' => false)),
      'CodigoPeriodoEscolar' => new sfValidatorDoctrineChoice(array('model' => 'periodoescolar')),
      'Parcial'              => new sfValidatorString(array('max_length' => 50),array('required' => 'El parcial es requerido')),
      'Descripcion'          => new sfValidatorString(array('max_length' => 500, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'parcial', 'column' => array('codigoperiodoescolar', 'parcial')))
    );
	
    $this->widgetSchema->setNameFormat('parcial[%s]');
	$this->widgetSchema['CodigoPeriodoEscolar']->setAttribute('class', 'form-control');			
	$this->widgetSchema['CodigoPeriodoEscolar']->setAttribute('required', 'required');
	$this->widgetSchema['CodigoPeriodoEscolar']->setAttribute('style',"width:auto");
	$this->widgetSchema['Parcial']->setAttribute('class', 'parcial form-control');
	$this->widgetSchema['Parcial']->setAttribute('placeholder','Parcial');
	$this->widgetSchema['Parcial']->setAttribute('required', 'required');
	$this->widgetSchema['Parcial']->setAttribute('style',"width:auto");
    $this->widgetSchema['Descripcion']->setAttribute('class', 'form-control');
	$this->widgetSchema['Descripcion']->setAttribute('style','width:auto');	
	$this->widgetSchema['Descripcion']->setAttribute('placeholder','Descripci&oacute;n');
	$this->widgetSchema->setLabels(array(
	'CodigoParcial' => ' ',
	'CodigoPeriodoEscolar'    => 'Periodo Escolar:',
	'Parcial'    => 'Parcial:',
	'Descripcion'   => 'Descripci&oacute;n:',		
	));

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'parcial';
  }

}
