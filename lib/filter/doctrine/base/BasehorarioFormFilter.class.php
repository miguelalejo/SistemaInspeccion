<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * horario filter form base class.
 *
 * @package    filters
 * @subpackage horario *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasehorarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'Horario'       => new sfWidgetFormFilterInput(),
      'Descripcion'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'Horario'       => new sfValidatorPass(array('required' => false)),
      'Descripcion'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('horario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'horario';
  }

  public function getFields()
  {
    return array(
      'CodigoHorario' => 'Number',
      'Horario'       => 'Text',
      'Descripcion'   => 'Text',
    );
  }
}