<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * novedadalumnoparcial filter form base class.
 *
 * @package    filters
 * @subpackage novedadalumnoparcial *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasenovedadalumnoparcialFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoAlumno'                     => new sfWidgetFormFilterInput(),
      'CodigoParcial'                    => new sfWidgetFormFilterInput(),
      'Fecha'                            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'Apellido'                         => new sfWidgetFormFilterInput(),
      'Nombre'                           => new sfWidgetFormFilterInput(),
      'Novedad'                          => new sfWidgetFormFilterInput(),
      'Curso'                            => new sfWidgetFormFilterInput(),
      'Paralelo'                         => new sfWidgetFormFilterInput(),
      'Materia'                          => new sfWidgetFormFilterInput(),
      'Horario'                          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'CodigoAlumno'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'CodigoParcial'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Fecha'                            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'Apellido'                         => new sfValidatorPass(array('required' => false)),
      'Nombre'                           => new sfValidatorPass(array('required' => false)),
      'Novedad'                          => new sfValidatorPass(array('required' => false)),
      'Curso'                            => new sfValidatorPass(array('required' => false)),
      'Paralelo'                         => new sfValidatorPass(array('required' => false)),
      'Materia'                          => new sfValidatorPass(array('required' => false)),
      'Horario'                          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('novedadalumnoparcial_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'novedadalumnoparcial';
  }

  public function getFields()
  {
    return array(
      'CodigoNovedadCursoMateriaHorario' => 'Number',
      'CodigoAlumno'                     => 'Number',
      'CodigoParcial'                    => 'Number',
      'Fecha'                            => 'Date',
      'Apellido'                         => 'Text',
      'Nombre'                           => 'Text',
      'Novedad'                          => 'Text',
      'Curso'                            => 'Text',
      'Paralelo'                         => 'Text',
      'Materia'                          => 'Text',
      'Horario'                          => 'Text',
    );
  }
}