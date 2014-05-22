<?php

/**
 * cursomateriahorario form base class.
 *
 * @package    form
 * @subpackage cursomateriahorario
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasecursomateriahorarioForm extends BaseFormDoctrine
{
  public function setup()
  {
	$this->setWidgets(array(
      'CodigoCursoMateriaHorario' => new sfWidgetFormInputHidden(),
	  'CodigoPeriodo'             => new sfWidgetFormDoctrineChoice(array('model' => 'periodo','add_empty' => false)),
      'CodigoCurso'               => new sfWidgetFormDoctrineChoice(array('model' => 'curso','add_empty' => false)),
	  'CodigoParalelo'            => new sfWidgetFormDoctrineChoice(array('model' => 'paralelo','add_empty' => false)),
      'CodigoHorario'             => new sfWidgetFormDoctrineChoice(array('model' => 'horario', 'add_empty' => false)),
      'CodigoDia'                 => new sfWidgetFormDoctrineChoice(array('model' => 'dia', 'add_empty' => false)),
      'CodigoMateria'             => new sfWidgetFormDoctrineChoice(array('model' => 'materia', 'add_empty' => false)),
      'Descripcion'               => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'CodigoCursoMateriaHorario' => new sfValidatorDoctrineChoice(array('model' => 'cursomateriahorario', 'column' => 'codigocursomateriahorario', 'required' => false)),
      'CodigoPeriodo'             => new sfValidatorDoctrineChoice(array('model' => 'periodo'),array('required' => 'El periodo es requerido')),
	  'CodigoCurso'               => new sfValidatorDoctrineChoice(array('model' => 'curso'),array('required' => 'El curso es requerido')),
	  'CodigoParalelo'            => new sfValidatorDoctrineChoice(array('model' => 'paralelo'),array('required' => 'El paralelo es requerido')),
      'CodigoHorario'             => new sfValidatorDoctrineChoice(array('model' => 'horario')),
      'CodigoDia'                 => new sfValidatorDoctrineChoice(array('model' => 'dia')),
      'CodigoMateria'             => new sfValidatorDoctrineChoice(array('model' => 'materia')),
      'Descripcion'               => new sfValidatorString(array('max_length' => 500, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'cursomateriahorario', 'column' => array('codigocurso', 'codigohorario', 'codigodia', 'codigomateria')))
    );

	$this->widgetSchema['CodigoCurso']->setAttribute('id', 'select');
    $this->widgetSchema->setNameFormat('cursomateriahorario[%s]');
	$this->widgetSchema['CodigoPeriodo']->setAttribute('class', 'form-control');
	$this->widgetSchema['CodigoPeriodo']->setAttribute('style',"width:auto");
	$this->widgetSchema['CodigoCurso']->setAttribute('class', 'form-control');
	$this->widgetSchema['CodigoCurso']->setAttribute('style',"width:auto");
	$this->widgetSchema['CodigoParalelo']->setAttribute('class', 'form-control');
	$this->widgetSchema['CodigoParalelo']->setAttribute('style',"width:auto");
	$this->widgetSchema['CodigoHorario']->setAttribute('class', 'form-control');
	$this->widgetSchema['CodigoHorario']->setAttribute('style',"width:auto");
	$this->widgetSchema['CodigoDia']->setAttribute('class', 'form-control');
	$this->widgetSchema['CodigoDia']->setAttribute('style',"width:auto");
	$this->widgetSchema['CodigoMateria']->setAttribute('class', 'form-control');
	$this->widgetSchema['CodigoMateria']->setAttribute('style',"width:auto");
	$this->widgetSchema['Descripcion']->setAttribute('class', 'form-control');
	$this->widgetSchema['Descripcion']->setAttribute('style','width:auto');	
	$this->widgetSchema['Descripcion']->setAttribute('placeholder','Descripci&oacute;n');
	$this->widgetSchema->setLabels(array(
	'CodigoCursoMateriaHorario' => ' ',
	'CodigoPeriodo'    => 'Periodo:',
	'CodigoCurso'    => 'Curso:',
	'CodigoParalelo'    => 'Paralelo:',
	'CodigoHorario'   => 'Horario:',		
	'CodigoDia'   => 'D&iacute;a:',
	'CodigoMateria'   => 'Materia:',
	'Descripcion'   => 'Descripci&oacute;n:',
	));
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'cursomateriahorario';
  }

}
