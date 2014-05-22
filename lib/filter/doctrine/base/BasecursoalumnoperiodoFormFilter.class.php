<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * cursoalumnoperiodo filter form base class.
 *
 * @package    filters
 * @subpackage cursoalumnoperiodo *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasecursoalumnoperiodoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoAlumno'       => new sfWidgetFormDoctrineChoice(array('model' => 'alumno', 'add_empty' => true)),
      'CodigoCurso'        => new sfWidgetFormDoctrineChoice(array('model' => 'curso', 'add_empty' => true)),
      'CodigoPeriodo'      => new sfWidgetFormDoctrineChoice(array('model' => 'periodo', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'CodigoAlumno'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'alumno', 'column' => 'CodigoAlumno')),
      'CodigoCurso'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'curso', 'column' => 'CodigoCurso')),
      'CodigoPeriodo'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'periodo', 'column' => 'CodigoPeriodo')),
    ));

    $this->widgetSchema->setNameFormat('cursoalumnoperiodo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'cursoalumnoperiodo';
  }

  public function getFields()
  {
    return array(
      'CursoAlumnoPeriodo' => 'Number',
      'CodigoAlumno'       => 'ForeignKey',
      'CodigoCurso'        => 'ForeignKey',
      'CodigoPeriodo'      => 'ForeignKey',
    );
  }
}