<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * diasemana filter form base class.
 *
 * @package    filters
 * @subpackage diasemana *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasediasemanaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'Dia'       => new sfWidgetFormFilterInput(),
      'Horas'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'Dia'       => new sfValidatorPass(array('required' => false)),
      'Horas'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('diasemana_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'diasemana';
  }

  public function getFields()
  {
    return array(
      'CodigoDia' => 'Number',
      'Dia'       => 'Text',
      'Horas'     => 'Number',
    );
  }
}