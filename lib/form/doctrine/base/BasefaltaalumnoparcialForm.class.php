<?php

/**
 * faltaalumnoparcial form base class.
 *
 * @package    form
 * @subpackage faltaalumnoparcial
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasefaltaalumnoparcialForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoFalta'   => new sfWidgetFormInputHidden(),
      'CodigoAlumno'  => new sfWidgetFormInput(),
      'CodigoParcial' => new sfWidgetFormInput(),
      'Fecha'         => new sfWidgetFormDate(),
      'Apellido'      => new sfWidgetFormInput(),
      'Nombre'        => new sfWidgetFormInput(),
      'Falta'         => new sfWidgetFormInput(),
      'Descripcion'   => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'CodigoFalta'   => new sfValidatorDoctrineChoice(array('model' => 'faltaalumnoparcial', 'column' => 'codigofalta', 'required' => false)),
      'CodigoAlumno'  => new sfValidatorInteger(array('required' => false)),
      'CodigoParcial' => new sfValidatorInteger(array('required' => false)),
      'Fecha'         => new sfValidatorDate(array('required' => false)),
      'Apellido'      => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'Nombre'        => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'Falta'         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'Descripcion'   => new sfValidatorString(array('max_length' => 250, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faltaalumnoparcial[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'faltaalumnoparcial';
  }

}
