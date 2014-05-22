<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * faltaalumnoparcial filter form base class.
 *
 * @package    filters
 * @subpackage faltaalumnoparcial *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasefaltaalumnoparcialFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoAlumno'  => new sfWidgetFormFilterInput(),
      'CodigoParcial' => new sfWidgetFormFilterInput(),
      'Fecha'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'Apellido'      => new sfWidgetFormFilterInput(),
      'Nombre'        => new sfWidgetFormFilterInput(),
      'Falta'         => new sfWidgetFormFilterInput(),
      'Descripcion'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'CodigoAlumno'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'CodigoParcial' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Fecha'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'Apellido'      => new sfValidatorPass(array('required' => false)),
      'Nombre'        => new sfValidatorPass(array('required' => false)),
      'Falta'         => new sfValidatorPass(array('required' => false)),
      'Descripcion'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faltaalumnoparcial_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'faltaalumnoparcial';
  }

  public function getFields()
  {
    return array(
      'CodigoFalta'   => 'Number',
      'CodigoAlumno'  => 'Number',
      'CodigoParcial' => 'Number',
      'Fecha'         => 'Date',
      'Apellido'      => 'Text',
      'Nombre'        => 'Text',
      'Falta'         => 'Text',
      'Descripcion'   => 'Text',
    );
  }
}