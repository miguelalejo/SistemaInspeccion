<?php

/**
 * periodoescolar form base class.
 *
 * @package    form
 * @subpackage periodoescolar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseperiodoescolarForm extends BaseFormDoctrine
{
  public function setup()
  {
	$this->setWidgets(array(
      'CodigoPeriodoEscolar' => new sfWidgetFormInputHidden(),
      'CodigoPeriodo'        => new sfWidgetFormDoctrineChoice(array('model' => 'periodo', 'add_empty' => false)),
      'PeriodoEscolar'       => new sfWidgetFormInput(),
      'Descripcion'          => new sfWidgetFormTextarea(),
      'FechaInicio'          => new sfWidgetFormI18nDateDefault(array('format' => '%day%/%month%/%year%','culture' => 'es')),
      'FechaFin'             => new sfWidgetFormI18nDateDefault(array('format' => '%day%/%month%/%year%','culture' => 'es')),
    ));

    $this->setValidators(array(
      'CodigoPeriodoEscolar' => new sfValidatorDoctrineChoice(array('model' => 'periodoescolar', 'column' => 'codigoperiodoescolar', 'required' => false)),
      'CodigoPeriodo'        => new sfValidatorDoctrineChoice(array('model' => 'periodo'),array('required' => 'El periodo escolar es requerido')),
      'PeriodoEscolar'       => new sfValidatorString(array('max_length' => 50)),
      'Descripcion'          => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'FechaInicio'          => new sfValidatorDate(),
      'FechaFin'             => new sfValidatorDate(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'periodoescolar', 'column' => array('codigoperiodo', 'periodoescolar')))
    );	
    $this->widgetSchema->setNameFormat('periodoescolar[%s]');
	$this->widgetSchema['CodigoPeriodo']->setAttribute('class', 'form-control');			
	$this->widgetSchema['CodigoPeriodo']->setAttribute('required', 'required');
	$this->widgetSchema['CodigoPeriodo']->setAttribute('style',"width:auto");
	$this->widgetSchema['PeriodoEscolar']->setAttribute('class', 'periodoescolar form-control');
	$this->widgetSchema['PeriodoEscolar']->setAttribute('placeholder','Periodo Escolar');
	$this->widgetSchema['PeriodoEscolar']->setAttribute('required', 'required');
	$this->widgetSchema['PeriodoEscolar']->setAttribute('style',"width:auto");
    $this->widgetSchema['Descripcion']->setAttribute('class', 'form-control');
	$this->widgetSchema['Descripcion']->setAttribute('style','width:auto');	
	$this->widgetSchema['Descripcion']->setAttribute('placeholder','Descripci&oacute;n');
	$this->widgetSchema->setLabels(array(
	'CodigoPeriodoEscolar' => ' ',
	'CodigoPeriodo'    => 'Periodo:',
	'PeriodoEscolar'    => 'Periodo Escolar:',
	'Descripcion'   => 'Descripci&oacute;n:',	
	'FechaInicio'   => 'Fecha Inicio:',
	'FechaFin'   => 'Fecha Fin:',
	));
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'periodoescolar';
  }

}
