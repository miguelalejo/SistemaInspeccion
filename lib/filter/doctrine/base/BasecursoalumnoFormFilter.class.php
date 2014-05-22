<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * cursoalumno filter form base class.
 *
 * @package    filters
 * @subpackage cursoalumno *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasecursoalumnoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoAlumno'      => new sfWidgetFormDoctrineChoice(array('model' => 'alumno', 'add_empty' => true)),
      'CodigoPeriodo'     => new sfWidgetFormDoctrineChoice(array('model' => 'periodo', 'add_empty' => true)),
      'CodigoCurso'       => new sfWidgetFormDoctrineChoice(array('model' => 'curso', 'add_empty' => true)),
      'CodigoParalelo'    => new sfWidgetFormDoctrineChoice(array('model' => 'paralelo', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'CodigoAlumno'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'alumno', 'column' => 'CodigoAlumno')),
      'CodigoPeriodo'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'periodo', 'column' => 'CodigoPeriodo')),
      'CodigoCurso'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'curso', 'column' => 'CodigoCurso')),
      'CodigoParalelo'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'paralelo', 'column' => 'CodigoParalelo')),
    ));

    $this->widgetSchema->setNameFormat('cursoalumno_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'cursoalumno';
  }

  public function getFields()
  {
    return array(
      'CodigoCursoAlumno' => 'Number',
      'CodigoAlumno'      => 'ForeignKey',
      'CodigoPeriodo'     => 'ForeignKey',
      'CodigoCurso'       => 'ForeignKey',
      'CodigoParalelo'    => 'ForeignKey',
    );
  }
}