<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * periodo filter form base class.
 *
 * @package    filters
 * @subpackage periodo *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseperiodoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'Periodo'       => new sfWidgetFormFilterInput(),
      'Descripcion'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'Periodo'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Descripcion'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('periodo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'periodo';
  }

  public function getFields()
  {
    return array(
      'CodigoPeriodo' => 'Number',
      'Periodo'       => 'Number',
      'Descripcion'   => 'Text',
    );
  }
}