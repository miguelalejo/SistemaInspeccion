<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * falta filter form base class.
 *
 * @package    filters
 * @subpackage falta *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasefaltaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoAlumno'    => new sfWidgetFormDoctrineChoice(array('model' => 'alumno', 'add_empty' => true)),
      'CodigoInspector' => new sfWidgetFormDoctrineChoice(array('model' => 'inspector', 'add_empty' => true)),
      'CodigoTipoFalta' => new sfWidgetFormDoctrineChoice(array('model' => 'tipofalta', 'add_empty' => true)),
      'CodigoParcial'   => new sfWidgetFormDoctrineChoice(array('model' => 'parcial', 'add_empty' => true)),
      'Fecha'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'Descripcion'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'CodigoAlumno'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'alumno', 'column' => 'CodigoAlumno')),
      'CodigoInspector' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'inspector', 'column' => 'CodigoInspector')),
      'CodigoTipoFalta' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'tipofalta', 'column' => 'CodigoTipoFalta')),
      'CodigoParcial'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'parcial', 'column' => 'CodigoParcial')),
      'Fecha'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'Descripcion'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('falta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'falta';
  }

  public function getFields()
  {
    return array(
      'CodigoFalta'     => 'Number',
      'CodigoAlumno'    => 'ForeignKey',
      'CodigoInspector' => 'ForeignKey',
      'CodigoTipoFalta' => 'ForeignKey',
      'CodigoParcial'   => 'ForeignKey',
      'Fecha'           => 'Date',
      'Descripcion'     => 'Text',
    );
  }
}