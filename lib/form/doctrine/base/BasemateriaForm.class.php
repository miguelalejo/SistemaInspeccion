<?php

/**
 * materia form base class.
 *
 * @package    form
 * @subpackage materia
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasemateriaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoMateria' => new sfWidgetFormInputHidden(),
      'Materia'       => new sfWidgetFormInput(),
      'Descripcion'   => new sfWidgetFormTextarea(),
      'Imagen'        => new sfWidgetFormInputFile(),
    ));

    $this->setValidators(array(
      'CodigoMateria' => new sfValidatorDoctrineChoice(array('model' => 'materia', 'column' => 'codigomateria', 'required' => false)),
      'Materia'       => new sfValidatorString(array('max_length' => 30),array('required' => 'La materia es requerida')),
      'Descripcion'   => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'Imagen'            => new sfValidatorFileImage(array('required'   => false,'path'=> sfConfig::get('sf_upload_dir').'/materias','mime_types' => 'web_images','max_size' => '60000','max_height' => 300,'min_height' =>  200,'max_width' => 300, 'min_width' =>  200,))
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'materia', 'column' => array('materia')))
    );

    $this->widgetSchema->setNameFormat('materia[%s]');
	$this->widgetSchema['Materia']->setAttribute('class', 'materia form-control');
	$this->widgetSchema['Materia']->setAttribute('required','required');
	$this->widgetSchema['Materia']->setAttribute('style',"width:auto");
	$this->widgetSchema['Materia']->setAttribute('placeholder',"Materia");    
	$this->widgetSchema['Descripcion']->setAttribute('class', 'form-control');
	$this->widgetSchema['Descripcion']->setAttribute('style','width:auto');	
	$this->widgetSchema['Descripcion']->setAttribute('placeholder','Descripci&oacute;n');
	$this->widgetSchema['Imagen']->setAttribute('class', 'btn btn-info');
	$this->widgetSchema['Imagen']->setAttribute('style','width:auto');	
	$this->widgetSchema->setLabels(array(
	'CodigoMateria' => ' ',
	'Materia'    => 'Materia:',
	'Descripcion'   => 'Descripci&oacute;n:',	
	'Imagen'   => 'Im&aacute;gen:',
	));
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'materia';
  }

}
