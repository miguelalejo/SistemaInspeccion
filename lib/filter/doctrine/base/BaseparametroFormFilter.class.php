<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * parametro filter form base class.
 *
 * @package    filters
 * @subpackage parametro *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseparametroFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'Parametro'       => new sfWidgetFormFilterInput(),
      'TipoParametro'   => new sfWidgetFormFilterInput(),
      'ValorInt'        => new sfWidgetFormFilterInput(),
      'ValorString'     => new sfWidgetFormFilterInput(),
      'Imagen'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'Parametro'       => new sfValidatorPass(array('required' => false)),
      'TipoParametro'   => new sfValidatorPass(array('required' => false)),
      'ValorInt'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ValorString'     => new sfValidatorPass(array('required' => false)),
      'Imagen'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('parametro_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'parametro';
  }

  public function getFields()
  {
    return array(
      'CodigoParametro' => 'Number',
      'Parametro'       => 'Text',
      'TipoParametro'   => 'Text',
      'ValorInt'        => 'Number',
      'ValorString'     => 'Text',
      'Imagen'          => 'Text',
    );
  }
}