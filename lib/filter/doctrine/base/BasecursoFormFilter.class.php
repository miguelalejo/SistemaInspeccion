<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * curso filter form base class.
 *
 * @package    filters
 * @subpackage curso *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasecursoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'Curso'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'Curso'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('curso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'curso';
  }

  public function getFields()
  {
    return array(
      'CodigoCurso' => 'Number',
      'Curso'       => 'Text',
    );
  }
}