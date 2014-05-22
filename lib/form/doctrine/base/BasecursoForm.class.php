<?php

/**
 * curso form base class.
 *
 * @package    form
 * @subpackage curso
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasecursoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoCurso'   => new sfWidgetFormInputHidden(),
      'Curso'         => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'CodigoCurso'   => new sfValidatorDoctrineChoice(array('model' => 'curso', 'column' => 'codigocurso', 'required' => false)),
      'Curso'         => new sfValidatorString(array('max_length' => 15)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'curso', 'column' => array('curso', 'codigoperiodo')))
    );

    $this->widgetSchema->setNameFormat('curso[%s]');
	$this->widgetSchema['Curso']->setAttribute('class', 'curso form-control');
	$this->widgetSchema['Curso']->setAttribute('required','required');
	$this->widgetSchema['Curso']->setAttribute('style',"width:auto");
	$this->widgetSchema['Curso']->setAttribute('placeholder',"Curso");    
	$this->widgetSchema->setLabels(array(
	'CodigoCurso' => ' ',
	'Curso'   => 'Curso:',	
	));
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'curso';
  }

}
