<?php

/**
 * alumno form base class.
 *
 * @package    form
 * @subpackage alumno
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasealumnoForm extends BaseFormDoctrine
{
  public function setup()
  {
	$curYear = date('Y');
	$max_edad_alumno=sfConfig::get('app_max_edad_alumno');
    $years = range($curYear-$max_edad_alumno,$curYear );	
    $this->setWidgets(array(
      'CodigoAlumno'                   => new sfWidgetFormInputHidden(),
      'Cedula'                         => new sfWidgetFormInput(),
      'Nombre'                         => new sfWidgetFormInput(),
      'Apellido'                       => new sfWidgetFormInput(),
      'FechaNacimiento'                => new sfWidgetFormI18nDateDefault(array('years' => array_combine($years, $years),'format' => '%day%/%month%/%year%','culture' => 'es')),
      'Telefono'                       => new sfWidgetFormInput(),
      'Celular'                        => new sfWidgetFormInput(),
      'CorreoElectronico'              => new sfWidgetFormInput(),
      'CedulaRepresentante'            => new sfWidgetFormInput(),
      'NombreRepresentante'            => new sfWidgetFormInput(),
      'ApellidoRepresentante'          => new sfWidgetFormInput(),
      'TelefonoRepresentante'          => new sfWidgetFormInput(),
      'CelularRepresentante'           => new sfWidgetFormInput(),
      'CorreoElectronicoRepresentante' => new sfWidgetFormInput(),
      'Imagen'                         => new sfWidgetFormInputFile(),
    ));

    $this->setValidators(array(
      'CodigoAlumno'                   => new sfValidatorDoctrineChoice(array('model' => 'alumno', 'column' => 'codigoalumno', 'required' => false)),
      'Cedula'                         => new sfValidatorString(array('max_length' => 11,'min_length' => 11),array('required' => 'La cedula es requerida')),
      'Nombre'                         => new sfValidatorString(array('max_length' => 30),array('required' => 'El nombre es requerido')),
      'Apellido'                       => new sfValidatorString(array('max_length' => 30),array('required' => 'El apellido es requerido')),
      'FechaNacimiento'                => new sfValidatorDate(),
      'Telefono'                       => new sfValidatorString(array('max_length' => 12,'min_length' => 11, 'required' => false)),
      'Celular'                        => new sfValidatorString(array('max_length' => 13,'min_length' => 13, 'required' => false)),
      'CorreoElectronico'              => new sfValidatorEmail(),
      'CedulaRepresentante'            => new sfValidatorString(array('max_length' => 11,'min_length' => 11),array('required' => 'La cedula es requerida')),
      'NombreRepresentante'            => new sfValidatorString(array('max_length' => 30),array('required' => 'El nombre es requerido')),
      'ApellidoRepresentante'          => new sfValidatorString(array('max_length' => 30),array('required' => 'El apellido es requerido')),
      'TelefonoRepresentante'          => new sfValidatorString(array('max_length' => 12,'min_length' => 12, 'required' => false)),
      'CelularRepresentante'           => new sfValidatorString(array('max_length' => 13,'min_length' => 13, 'required' => false)),
      'CorreoElectronicoRepresentante' => new sfValidatorEmail(),
      'Imagen'                         => new sfValidatorFileImage(array('required'   => false,'path'=> sfConfig::get('sf_upload_dir').'/alumnos','mime_types' => 'web_images','max_size' => '60000','max_height' => 300,'min_height' =>  200,'max_width' => 300, 'min_width' =>  200,))
    ));
	$this->widgetSchema->setNameFormat('alumno[%s]');	
	$this->widgetSchema['Cedula']->setAttribute('class', 'cedula form-control');	
	$this->widgetSchema['Cedula']->setAttribute('style',"width:auto");
	$this->widgetSchema['Cedula']->setAttribute('placeholder',"C&eacute;dula Alumno");
	$this->widgetSchema['Cedula']->setAttribute('required', 'required');
	$this->widgetSchema['Nombre']->setAttribute('class', 'nombre form-control');
	$this->widgetSchema['Nombre']->setAttribute('style',"width:auto");
	$this->widgetSchema['Nombre']->setAttribute('placeholder',"Nombre Alumno");
	$this->widgetSchema['Nombre']->setAttribute('required', 'required');
	$this->widgetSchema['Apellido']->setAttribute('class', 'nombre form-control');
	$this->widgetSchema['Apellido']->setAttribute('style',"width:auto");
	$this->widgetSchema['Apellido']->setAttribute('placeholder',"Apellido Alumno");
	$this->widgetSchema['Apellido']->setAttribute('required', 'required');
	$this->widgetSchema['Telefono']->setAttribute('class', 'telefono form-control');
	$this->widgetSchema['Telefono']->setAttribute('style',"width:auto");
	$this->widgetSchema['Telefono']->setAttribute('placeholder',"Tel&eacute;fono Alumno");
	$this->widgetSchema['Celular']->setAttribute('class', 'celular form-control');
	$this->widgetSchema['Celular']->setAttribute('style',"width:auto");
	$this->widgetSchema['Celular']->setAttribute('placeholder',"Celular Alumno");	
	$this->widgetSchema['CorreoElectronico']->setAttribute('class', 'form-control');
	$this->widgetSchema['CorreoElectronico']->setAttribute('style',"width:auto");
	$this->widgetSchema['CorreoElectronico']->setAttribute('placeholder',"Correo Electr&oacute;nico");
	$this->widgetSchema['CedulaRepresentante']->setAttribute('class', 'cedula form-control');
	$this->widgetSchema['CedulaRepresentante']->setAttribute('style',"width:auto");
	$this->widgetSchema['CedulaRepresentante']->setAttribute('placeholder',"C&eacute;dula Representante");
	$this->widgetSchema['CedulaRepresentante']->setAttribute('required', 'required');
	$this->widgetSchema['NombreRepresentante']->setAttribute('class', 'nombre form-control');
	$this->widgetSchema['NombreRepresentante']->setAttribute('style',"width:auto");
	$this->widgetSchema['NombreRepresentante']->setAttribute('placeholder',"Nombre Representante");
	$this->widgetSchema['NombreRepresentante']->setAttribute('required', 'required');
	$this->widgetSchema['ApellidoRepresentante']->setAttribute('class', 'nombre form-control');
	$this->widgetSchema['ApellidoRepresentante']->setAttribute('style',"width:auto");
	$this->widgetSchema['ApellidoRepresentante']->setAttribute('placeholder',"Apellido Representante");
	$this->widgetSchema['ApellidoRepresentante']->setAttribute('required', 'required');
	$this->widgetSchema['TelefonoRepresentante']->setAttribute('class', 'telefono form-control');
	$this->widgetSchema['TelefonoRepresentante']->setAttribute('style',"width:auto");
	$this->widgetSchema['TelefonoRepresentante']->setAttribute('placeholder',"Tel&eacute;fono Representante");
	$this->widgetSchema['CelularRepresentante']->setAttribute('class', 'celular form-control');	
	$this->widgetSchema['CelularRepresentante']->setAttribute('style',"width:auto");
	$this->widgetSchema['CelularRepresentante']->setAttribute('placeholder',"Celular Representante");	
	$this->widgetSchema['CorreoElectronicoRepresentante']->setAttribute('class', 'form-control');
	$this->widgetSchema['CorreoElectronicoRepresentante']->setAttribute('style',"width:auto");
	$this->widgetSchema['CorreoElectronicoRepresentante']->setAttribute('placeholder',"Correo Electr&oacute;nico");
	$this->widgetSchema['Imagen']->setAttribute('class', 'btn btn-info');
	$this->widgetSchema['Imagen']->setAttribute('style','width:auto');	
	$this->widgetSchema->setLabels(array(
	'CodigoAlumno' => ' ',
	'Cedula'    => 'C&eacute;dula:',
	'Nombre'    => 'Nombres:',
	'Apellido'   => 'Apellidos:',		
	'FechaNacimiento'   => 'Fecha Nacimiento:',	
	'Telefono'   => 'Tel&eacute;fono:',	
	'Celular'   => 'Celular:',	
	'CorreoElectronico'   => 'Correo Electr&oacute;nico',	
	'CedulaRepresentante'   => 'C&eacute;dula Rep:',	
	'NombreRepresentante'    => 'Nombre Rep:',
	'ApellidoRepresentante'   => 'Apellido Rep:',		
	'TelefonoRepresentante'   => 'Tel&eacute;fono Rep:',	
	'CelularRepresentante'   => 'Celular Rep:',	
	'CorreoElectronicoRepresentante'   => 'Correo Electr&oacute;nico Rep:',	
	));
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'alumno';
  }

}
