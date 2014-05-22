<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * tiponovedad filter form base class.
 *
 * @package    filters
 * @subpackage tiponovedad *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasetiponovedadFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'Novedad'           => new sfWidgetFormFilterInput(),
      'Descripcion'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'Novedad'           => new sfValidatorPass(array('required' => false)),
      'Descripcion'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tiponovedad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'tiponovedad';
  }

  public function getFields()
  {
    return array(
      'CodigoTipoNovedad' => 'Number',
      'Novedad'           => 'Text',
      'Descripcion'       => 'Text',
    );
  }
}