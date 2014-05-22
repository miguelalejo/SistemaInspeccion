<?php

/**
 * cursoalumno form base class.
 *
 * @package    form
 * @subpackage cursoalumno
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasecursoalumnoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoCursoAlumno' => new sfWidgetFormInputHidden(),
      'CodigoAlumno'      => new sfWidgetFormDoctrineChoice(array('model' => 'alumno', 'add_empty' => false)),
	  'Cedula' 			  => new sfWidgetFormInput(),
	  'CodigoPeriodo'       => new sfWidgetFormDoctrineChoice(array('model' => 'periodo','add_empty' => false)),
      'CodigoCurso'       => new sfWidgetFormDoctrineChoice(array('model' => 'curso','add_empty' => false)),
	  'CodigoParalelo'       => new sfWidgetFormDoctrineChoice(array('model' => 'paralelo','add_empty' => false)),
    ));

    $this->setValidators(array(
      'CodigoCursoAlumno' => new sfValidatorDoctrineChoice(array('model' => 'cursoalumno', 'column' => 'codigocursoalumno', 'required' => false)),
      'CodigoAlumno'      => new sfValidatorDoctrineChoice(array('model' => 'alumno'),array('required' => 'El alumno es requerido')),
      'CodigoPeriodo'       => new sfValidatorDoctrineChoice(array('model' => 'periodo'),array('required' => 'El periodo es requerido')),
	  'CodigoCurso'       => new sfValidatorDoctrineChoice(array('model' => 'curso'),array('required' => 'El curso es requerido')),
	  'CodigoParalelo'       => new sfValidatorDoctrineChoice(array('model' => 'paralelo'),array('required' => 'El paralelo es requerido')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'cursoalumno', 'column' => array('codigoalumno', 'codigocurso')))
    );
	$this->widgetSchema['Cedula']->setAttribute('id', 'textbox');
	$this->widgetSchema['Cedula']->setAttribute('name', 'textbox');
	$this->widgetSchema['Cedula']->setAttribute('class', 'form-control');
	$this->widgetSchema['Cedula']->setAttribute('style',"width:auto");	
	$this->widgetSchema['Cedula']->setAttribute('placeholder','C&eacute;dula Alumno');
    $this->widgetSchema->setNameFormat('cursoalumno[%s]');
	$this->widgetSchema['CodigoAlumno']->setAttribute('id', 'select');
	$this->widgetSchema['CodigoAlumno']->setAttribute('class', 'form-control');			
	$this->widgetSchema['CodigoAlumno']->setAttribute('required', 'required');
	$this->widgetSchema['CodigoAlumno']->setAttribute('style',"width:auto");		
	$this->widgetSchema['CodigoPeriodo']->setAttribute('class', 'form-control');			
	$this->widgetSchema['CodigoPeriodo']->setAttribute('required', 'required');
	$this->widgetSchema['CodigoPeriodo']->setAttribute('style',"width:auto");
	$this->widgetSchema['CodigoCurso']->setAttribute('class', 'form-control');			
	$this->widgetSchema['CodigoCurso']->setAttribute('required', 'required');
	$this->widgetSchema['CodigoCurso']->setAttribute('style',"width:auto");
	$this->widgetSchema['CodigoParalelo']->setAttribute('class', 'form-control');			
	$this->widgetSchema['CodigoParalelo']->setAttribute('required', 'required');
	$this->widgetSchema['CodigoParalelo']->setAttribute('style',"width:auto");
	$this->widgetSchema->setLabels(array(
	'CodigoCursoAlumno' => ' ',
	'CodigoAlumno'    => 'Alumno:',
	'Cedula'    => 'C&eacute;dula:',
	'CodigoPeriodo'    => 'Periodo:',		
	'CodigoCurso'    => 'Curso:',		
	'CodigoParalelo'    => 'Paralelo:',			
	));
    
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'cursoalumno';
  }

}
