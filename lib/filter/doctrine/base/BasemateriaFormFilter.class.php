<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * materia filter form base class.
 *
 * @package    filters
 * @subpackage materia *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasemateriaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'Materia'       => new sfWidgetFormFilterInput(),
      'Descripcion'   => new sfWidgetFormFilterInput(),
      'Imagen'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'Materia'       => new sfValidatorPass(array('required' => false)),
      'Descripcion'   => new sfValidatorPass(array('required' => false)),
      'Imagen'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('materia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'materia';
  }

  public function getFields()
  {
    return array(
      'CodigoMateria' => 'Number',
      'Materia'       => 'Text',
      'Descripcion'   => 'Text',
      'Imagen'        => 'Text',
    );
  }
}