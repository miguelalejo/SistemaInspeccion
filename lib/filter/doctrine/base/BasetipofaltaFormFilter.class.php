<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * tipofalta filter form base class.
 *
 * @package    filters
 * @subpackage tipofalta *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasetipofaltaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'Falta'           => new sfWidgetFormFilterInput(),
      'Descripcion'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'Falta'           => new sfValidatorPass(array('required' => false)),
      'Descripcion'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipofalta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'tipofalta';
  }

  public function getFields()
  {
    return array(
      'CodigoTipoFalta' => 'Number',
      'Falta'           => 'Text',
      'Descripcion'     => 'Text',
    );
  }
}