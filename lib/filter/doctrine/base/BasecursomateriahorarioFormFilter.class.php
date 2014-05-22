<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * cursomateriahorario filter form base class.
 *
 * @package    filters
 * @subpackage cursomateriahorario *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasecursomateriahorarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoPeriodo'             => new sfWidgetFormDoctrineChoice(array('model' => 'periodo', 'add_empty' => true)),
      'CodigoCurso'               => new sfWidgetFormDoctrineChoice(array('model' => 'curso', 'add_empty' => true)),
      'CodigoParalelo'            => new sfWidgetFormDoctrineChoice(array('model' => 'paralelo', 'add_empty' => true)),
      'CodigoHorario'             => new sfWidgetFormDoctrineChoice(array('model' => 'horario', 'add_empty' => true)),
      'CodigoDia'                 => new sfWidgetFormDoctrineChoice(array('model' => 'dia', 'add_empty' => true)),
      'CodigoMateria'             => new sfWidgetFormDoctrineChoice(array('model' => 'materia', 'add_empty' => true)),
      'Descripcion'               => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'CodigoPeriodo'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'periodo', 'column' => 'CodigoPeriodo')),
      'CodigoCurso'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'curso', 'column' => 'CodigoCurso')),
      'CodigoParalelo'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'paralelo', 'column' => 'CodigoParalelo')),
      'CodigoHorario'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'horario', 'column' => 'CodigoHorario')),
      'CodigoDia'                 => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'dia', 'column' => 'CodigoDia')),
      'CodigoMateria'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'materia', 'column' => 'CodigoMateria')),
      'Descripcion'               => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cursomateriahorario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'cursomateriahorario';
  }

  public function getFields()
  {
    return array(
      'CodigoCursoMateriaHorario' => 'Number',
      'CodigoPeriodo'             => 'ForeignKey',
      'CodigoCurso'               => 'ForeignKey',
      'CodigoParalelo'            => 'ForeignKey',
      'CodigoHorario'             => 'ForeignKey',
      'CodigoDia'                 => 'ForeignKey',
      'CodigoMateria'             => 'ForeignKey',
      'Descripcion'               => 'Text',
    );
  }
}