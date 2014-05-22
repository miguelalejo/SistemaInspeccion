<?php

/**
 * novedadalumnoparcial form base class.
 *
 * @package    form
 * @subpackage novedadalumnoparcial
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasenovedadalumnoparcialForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoNovedadCursoMateriaHorario' => new sfWidgetFormInputHidden(),
      'CodigoAlumno'                     => new sfWidgetFormInput(),
      'CodigoParcial'                    => new sfWidgetFormInput(),
      'Fecha'                            => new sfWidgetFormDate(),
      'Apellido'                         => new sfWidgetFormInput(),
      'Nombre'                           => new sfWidgetFormInput(),
      'Novedad'                          => new sfWidgetFormInput(),
      'Curso'                            => new sfWidgetFormInput(),
      'Paralelo'                         => new sfWidgetFormInput(),
      'Materia'                          => new sfWidgetFormInput(),
      'Horario'                          => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'CodigoNovedadCursoMateriaHorario' => new sfValidatorDoctrineChoice(array('model' => 'novedadalumnoparcial', 'column' => 'codigonovedadcursomateriahorario', 'required' => false)),
      'CodigoAlumno'                     => new sfValidatorInteger(array('required' => false)),
      'CodigoParcial'                    => new sfValidatorInteger(array('required' => false)),
      'Fecha'                            => new sfValidatorDate(array('required' => false)),
      'Apellido'                         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'Nombre'                           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'Novedad'                          => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'Curso'                            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'Paralelo'                         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'Materia'                          => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'Horario'                          => new sfValidatorString(array('max_length' => 30, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('novedadalumnoparcial[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'novedadalumnoparcial';
  }

}
