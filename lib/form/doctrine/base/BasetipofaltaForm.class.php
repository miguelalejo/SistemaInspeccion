<?php

/**
 * tipofalta form base class.
 *
 * @package    form
 * @subpackage tipofalta
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasetipofaltaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoTipoFalta' => new sfWidgetFormInputHidden(),
      'Falta'           => new sfWidgetFormInput(),
      'Descripcion'     => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'CodigoTipoFalta' => new sfValidatorDoctrineChoice(array('model' => 'tipofalta', 'column' => 'codigotipofalta', 'required' => false)),
      'Falta'           => new sfValidatorString(array('max_length' => 30),array('required' => 'El tipo falta es requerido')),
      'Descripcion'     => new sfValidatorString(array('max_length' => 500, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'tipofalta', 'column' => array('falta')))
    );

    $this->widgetSchema->setNameFormat('tipofalta[%s]');	
	$this->widgetSchema['Falta']->setAttribute('class', 'falta form-control');
	$this->widgetSchema['Falta']->setAttribute('required','required');
	$this->widgetSchema['Falta']->setAttribute('style',"width:auto");
	$this->widgetSchema['Falta']->setAttribute('placeholder',"Tipo Falta");    
	$this->widgetSchema['Descripcion']->setAttribute('class', 'form-control');
	$this->widgetSchema['Descripcion']->setAttribute('style','width:auto');	
	$this->widgetSchema['Descripcion']->setAttribute('placeholder','Descripci&oacute;n');
	$this->widgetSchema->setLabels(array(
	'CodigoTipoFalta' => ' ',
	'Falta'    => 'Falta:',
	'Descripcion'   => 'Descripci&oacute;n:',	
	));
	$this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
    parent::setup();
  }

  public function getModelName()
  {
    return 'tipofalta';
  }

}
