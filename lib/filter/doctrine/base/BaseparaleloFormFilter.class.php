<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * paralelo filter form base class.
 *
 * @package    filters
 * @subpackage paralelo *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseparaleloFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'Paralelo'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'Paralelo'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('paralelo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'paralelo';
  }

  public function getFields()
  {
    return array(
      'CodigoParalelo' => 'Number',
      'Paralelo'       => 'Text',
    );
  }
}