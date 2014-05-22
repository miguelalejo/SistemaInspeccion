<?php

/**
 * diasemana form base class.
 *
 * @package    form
 * @subpackage diasemana
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasediasemanaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoDia' => new sfWidgetFormInputHidden(),
      'Dia'       => new sfWidgetFormInput(),
      'Horas'     => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'CodigoDia' => new sfValidatorDoctrineChoice(array('model' => 'diasemana', 'column' => 'codigodia', 'required' => false)),
      'Dia'       => new sfValidatorString(array('max_length' => 30)),
      'Horas'     => new sfValidatorInteger(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'diasemana', 'column' => array('dia')))
    );

    $this->widgetSchema->setNameFormat('diasemana[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'diasemana';
  }

}
