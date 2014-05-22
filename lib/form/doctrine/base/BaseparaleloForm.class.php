<?php

/**
 * paralelo form base class.
 *
 * @package    form
 * @subpackage paralelo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseparaleloForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoParalelo' => new sfWidgetFormInputHidden(),
      'Paralelo'       => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'CodigoParalelo' => new sfValidatorDoctrineChoice(array('model' => 'paralelo', 'column' => 'codigoparalelo', 'required' => false)),
      'Paralelo'       => new sfValidatorString(array('max_length' => 15)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'paralelo', 'column' => array('codigocurso', 'paralelo')))
    );

    $this->widgetSchema->setNameFormat('paralelo[%s]');
	$this->widgetSchema['Paralelo']->setAttribute('class', 'paralelo form-control');
	$this->widgetSchema['Paralelo']->setAttribute('placeholder','Paralelo');
	$this->widgetSchema['Paralelo']->setAttribute('required', 'required');
	$this->widgetSchema['Paralelo']->setAttribute('style',"width:auto");
	$this->widgetSchema->setLabels(array(
	'CodigoParalelo' => ' ',
	'CodigoCurso'    => 'Curso:',
	'Paralelo'    => 'Paralelo:',
	));
	

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'paralelo';
  }

}
