<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * parcial filter form base class.
 *
 * @package    filters
 * @subpackage parcial *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseparcialFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoPeriodoEscolar' => new sfWidgetFormDoctrineChoice(array('model' => 'periodoescolar', 'add_empty' => true)),
      'Parcial'              => new sfWidgetFormFilterInput(),
      'Descripcion'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'CodigoPeriodoEscolar' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'periodoescolar', 'column' => 'CodigoPeriodoEscolar')),
      'Parcial'              => new sfValidatorPass(array('required' => false)),
      'Descripcion'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('parcial_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'parcial';
  }

  public function getFields()
  {
    return array(
      'CodigoParcial'        => 'Number',
      'CodigoPeriodoEscolar' => 'ForeignKey',
      'Parcial'              => 'Text',
      'Descripcion'          => 'Text',
    );
  }
}