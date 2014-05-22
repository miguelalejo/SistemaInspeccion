<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * inspector filter form base class.
 *
 * @package    filters
 * @subpackage inspector *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseinspectorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'Cedula'            => new sfWidgetFormFilterInput(),
      'Nombre'            => new sfWidgetFormFilterInput(),
      'Apellido'          => new sfWidgetFormFilterInput(),
      'Telefono'          => new sfWidgetFormFilterInput(),
      'Celular'           => new sfWidgetFormFilterInput(),
      'CorreoElectronico' => new sfWidgetFormFilterInput(),
      'Imagen'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'Cedula'            => new sfValidatorPass(array('required' => false)),
      'Nombre'            => new sfValidatorPass(array('required' => false)),
      'Apellido'          => new sfValidatorPass(array('required' => false)),
      'Telefono'          => new sfValidatorPass(array('required' => false)),
      'Celular'           => new sfValidatorPass(array('required' => false)),
      'CorreoElectronico' => new sfValidatorPass(array('required' => false)),
      'Imagen'            => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('inspector_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'inspector';
  }

  public function getFields()
  {
    return array(
      'CodigoInspector'   => 'Number',
      'Cedula'            => 'Text',
      'Nombre'            => 'Text',
      'Apellido'          => 'Text',
      'Telefono'          => 'Text',
      'Celular'           => 'Text',
      'CorreoElectronico' => 'Text',
      'Imagen'            => 'Text',
    );
  }
}