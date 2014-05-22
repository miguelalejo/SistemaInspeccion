<?php

/**
 * falta form base class.
 *
 * @package    form
 * @subpackage falta
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasefaltaForm extends BaseFormDoctrine
{
  public function setup()
  {
	$fechaActual = date('Y-m-d');
	$parcial = Doctrine_Query::create()
        ->select('parcial')
        ->from('parcial pa')
		->leftJoin('periodoescolar pe')
		->where('pe.fechainicio <= ? and pe.fechafin >= ? and pe.codigoperiodoescolar = pa.codigoperiodoescolar', array($fechaActual,$fechaActual)); 
	$this->setWidgets(array(
      'CodigoFalta'     => new sfWidgetFormInputHidden(),
      'CodigoAlumno'    => new sfWidgetFormDoctrineChoice(array('model' => 'alumno', 'add_empty' => false)),
	  'CedulaAlumno'	=> new sfWidgetFormInput(),
      'CodigoInspector' => new sfWidgetFormDoctrineChoice(array('model' => 'inspector', 'add_empty' => false)),
	  'CodigoTipoFalta' => new sfWidgetFormDoctrineChoice(array('model' => 'tipofalta', 'add_empty' => false)),
      'CodigoParcial'   => new sfWidgetFormDoctrineChoice(array('model' => 'parcial','query' => $parcial, 'add_empty' => false)),
      'Fecha'           => new sfWidgetFormI18nDateDefault(array('can_be_empty'=>false,'format' => '%day%/%month%/%year%','culture' => 'es')),
      'Descripcion'     => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'CodigoFalta'     => new sfValidatorDoctrineChoice(array('model' => 'falta', 'column' => 'codigofalta', 'required' => false)),
      'CodigoAlumno'    => new sfValidatorDoctrineChoice(array('model' => 'alumno'),array('required' => 'El alumno es requerido')),
      'CodigoInspector' => new sfValidatorDoctrineChoice(array('model' => 'inspector'),array('required' => 'El inspector es requerido')),
      'CodigoTipoFalta' => new sfValidatorDoctrineChoice(array('model' => 'tipofalta'),array('required' => 'El tipo e falta es requerido')),
      'CodigoParcial'   => new sfValidatorDoctrineChoice(array('model' => 'parcial'),array('required' => 'El parcial es requerido')),
      'Fecha'           => new sfValidatorDate(),
      'Descripcion'     => new sfValidatorString(array('max_length' => 500, 'required' => false)),
    ));
	$this->widgetSchema['CedulaAlumno']->setAttribute('id', 'textbox');
	$this->widgetSchema['CodigoAlumno']->setAttribute('id', 'select');
    $this->widgetSchema->setNameFormat('falta[%s]');
	$this->widgetSchema['CodigoAlumno']->setAttribute('class', 'form-control');			
	$this->widgetSchema['CodigoAlumno']->setAttribute('required', 'required');
	$this->widgetSchema['CodigoAlumno']->setAttribute('style',"width:auto");
	$this->widgetSchema['CedulaAlumno']->setAttribute('name', 'textbox');
	$this->widgetSchema['CedulaAlumno']->setAttribute('class', 'form-control');
	$this->widgetSchema['CedulaAlumno']->setAttribute('style',"width:auto");	
	$this->widgetSchema['CedulaAlumno']->setAttribute('placeholder','C&eacute;dula Alumno');
	$this->widgetSchema['CodigoInspector']->setAttribute('class', 'form-control');	
	$this->widgetSchema['CodigoInspector']->setAttribute('required', 'required');
	$this->widgetSchema['CodigoInspector']->setAttribute('style',"width:auto");
	$this->widgetSchema['CodigoTipoFalta']->setAttribute('class', 'form-control');	
	$this->widgetSchema['CodigoTipoFalta']->setAttribute('required', 'required');
	$this->widgetSchema['CodigoTipoFalta']->setAttribute('style',"width:auto");
	$this->widgetSchema['CodigoParcial']->setAttribute('class', 'form-control');	
	$this->widgetSchema['CodigoParcial']->setAttribute('required', 'required');
	$this->widgetSchema['CodigoParcial']->setAttribute('style',"width:auto");
	$this->widgetSchema['Descripcion']->setAttribute('class', 'form-control');
	$this->widgetSchema['Descripcion']->setAttribute('style','width:auto');	
	$this->widgetSchema['Descripcion']->setAttribute('placeholder','Descripci&oacute;n');
	$this->widgetSchema->setLabels(array(
	'CodigoFalta' => ' ',
	'CodigoAlumno'    => 'Alumno:',
	'CedulaAlumno'    => 'C&eacute;dula:',
	'CodigoInspector'    => 'Inspector:',			
	'CodigoTipoFalta'    => 'Tipo Falta:',			
	'CodigoParcial'    => 'Parcial:',
	'Fecha'    => 'Fecha:',
	'Descripcion'    => 'Descripci&oacute;n:',
	
	));
	$this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);   	
    parent::setup();
  }

  public function getModelName()
  {
    return 'falta';
  }

}
