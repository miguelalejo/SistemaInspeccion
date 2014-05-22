<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * periodoescolar filter form base class.
 *
 * @package    filters
 * @subpackage periodoescolar *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseperiodoescolarFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoPeriodo'        => new sfWidgetFormDoctrineChoice(array('model' => 'periodo', 'add_empty' => true)),
      'PeriodoEscolar'       => new sfWidgetFormFilterInput(),
      'Descripcion'          => new sfWidgetFormFilterInput(),
      'FechaInicio'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'FechaFin'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'CodigoPeriodo'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'periodo', 'column' => 'CodigoPeriodo')),
      'PeriodoEscolar'       => new sfValidatorPass(array('required' => false)),
      'Descripcion'          => new sfValidatorPass(array('required' => false)),
      'FechaInicio'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'FechaFin'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('periodoescolar_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'periodoescolar';
  }

  public function getFields()
  {
    return array(
      'CodigoPeriodoEscolar' => 'Number',
      'CodigoPeriodo'        => 'ForeignKey',
      'PeriodoEscolar'       => 'Text',
      'Descripcion'          => 'Text',
      'FechaInicio'          => 'Date',
      'FechaFin'             => 'Date',
    );
  }
}