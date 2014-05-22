<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * novedad filter form base class.
 *
 * @package    filters
 * @subpackage novedad *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasenovedadFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoAlumno'    => new sfWidgetFormDoctrineChoice(array('model' => 'alumno', 'add_empty' => true)),
      'CodigoInspector' => new sfWidgetFormDoctrineChoice(array('model' => 'inspector', 'add_empty' => true)),
      'CodigoParcial'   => new sfWidgetFormDoctrineChoice(array('model' => 'parcial', 'add_empty' => true)),
      'Fugas'           => new sfWidgetFormFilterInput(),
      'Atrasos'         => new sfWidgetFormFilterInput(),
      'Indisciplinas'   => new sfWidgetFormFilterInput(),
      'Fecha'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'Descripcion'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'CodigoAlumno'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'alumno', 'column' => 'CodigoAlumno')),
      'CodigoInspector' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'inspector', 'column' => 'CodigoInspector')),
      'CodigoParcial'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'parcial', 'column' => 'CodigoParcial')),
      'Fugas'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Atrasos'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Indisciplinas'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Fecha'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'Descripcion'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('novedad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'novedad';
  }

  public function getFields()
  {
    return array(
      'CodigoNovedad'   => 'Number',
      'CodigoAlumno'    => 'ForeignKey',
      'CodigoInspector' => 'ForeignKey',
      'CodigoParcial'   => 'ForeignKey',
      'Fugas'           => 'Number',
      'Atrasos'         => 'Number',
      'Indisciplinas'   => 'Number',
      'Fecha'           => 'Date',
      'Descripcion'     => 'Text',
    );
  }
}