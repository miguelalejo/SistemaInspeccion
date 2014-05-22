<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * alumno filter form base class.
 *
 * @package    filters
 * @subpackage alumno *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasealumnoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'Cedula'                         => new sfWidgetFormFilterInput(),
      'Nombre'                         => new sfWidgetFormFilterInput(),
      'Apellido'                       => new sfWidgetFormFilterInput(),
      'FechaNacimiento'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'Telefono'                       => new sfWidgetFormFilterInput(),
      'Celular'                        => new sfWidgetFormFilterInput(),
      'CorreoElectronico'              => new sfWidgetFormFilterInput(),
      'CedulaRepresentante'            => new sfWidgetFormFilterInput(),
      'NombreRepresentante'            => new sfWidgetFormFilterInput(),
      'ApellidoRepresentante'          => new sfWidgetFormFilterInput(),
      'TelefonoRepresentante'          => new sfWidgetFormFilterInput(),
      'CelularRepresentante'           => new sfWidgetFormFilterInput(),
      'CorreoElectronicoRepresentante' => new sfWidgetFormFilterInput(),
      'Imagen'                         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'Cedula'                         => new sfValidatorPass(array('required' => false)),
      'Nombre'                         => new sfValidatorPass(array('required' => false)),
      'Apellido'                       => new sfValidatorPass(array('required' => false)),
      'FechaNacimiento'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'Telefono'                       => new sfValidatorPass(array('required' => false)),
      'Celular'                        => new sfValidatorPass(array('required' => false)),
      'CorreoElectronico'              => new sfValidatorPass(array('required' => false)),
      'CedulaRepresentante'            => new sfValidatorPass(array('required' => false)),
      'NombreRepresentante'            => new sfValidatorPass(array('required' => false)),
      'ApellidoRepresentante'          => new sfValidatorPass(array('required' => false)),
      'TelefonoRepresentante'          => new sfValidatorPass(array('required' => false)),
      'CelularRepresentante'           => new sfValidatorPass(array('required' => false)),
      'CorreoElectronicoRepresentante' => new sfValidatorPass(array('required' => false)),
      'Imagen'                         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('alumno_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'alumno';
  }

  public function getFields()
  {
    return array(
      'CodigoAlumno'                   => 'Number',
      'Cedula'                         => 'Text',
      'Nombre'                         => 'Text',
      'Apellido'                       => 'Text',
      'FechaNacimiento'                => 'Date',
      'Telefono'                       => 'Text',
      'Celular'                        => 'Text',
      'CorreoElectronico'              => 'Text',
      'CedulaRepresentante'            => 'Text',
      'NombreRepresentante'            => 'Text',
      'ApellidoRepresentante'          => 'Text',
      'TelefonoRepresentante'          => 'Text',
      'CelularRepresentante'           => 'Text',
      'CorreoElectronicoRepresentante' => 'Text',
      'Imagen'                         => 'Text',
    );
  }
}