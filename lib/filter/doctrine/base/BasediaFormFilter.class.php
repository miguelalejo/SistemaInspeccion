<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * dia filter form base class.
 *
 * @package    filters
 * @subpackage dia *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasediaFormFilter extends BaseFormFilterDoctrine
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

    $this->widgetSchema->setNameFormat('dia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'dia';
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