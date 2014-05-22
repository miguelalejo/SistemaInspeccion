<?php

/**
 * parametro form base class.
 *
 * @package    form
 * @subpackage parametro
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseparametroForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoParametro' => new sfWidgetFormInputHidden(),
      'Parametro'       => new sfWidgetFormInput(),
      'TipoParametro'   => new sfWidgetFormInput(),
      'ValorInt'        => new sfWidgetFormInput(),
      'ValorString'     => new sfWidgetFormInput(),
      'Imagen'          => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'CodigoParametro' => new sfValidatorDoctrineChoice(array('model' => 'parametro', 'column' => 'codigoparametro', 'required' => false)),
      'Parametro'       => new sfValidatorString(array('max_length' => 30)),
      'TipoParametro'   => new sfValidatorPass(),
      'ValorInt'        => new sfValidatorInteger(array('required' => false)),
      'ValorString'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'Imagen'          => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'parametro', 'column' => array('parametro')))
    );

    $this->widgetSchema->setNameFormat('parametro[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'parametro';
  }

}
