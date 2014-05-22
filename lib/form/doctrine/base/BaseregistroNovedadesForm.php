<?php

/**
 * alumno form base class.
 *
 * @package    form
 * @subpackage alumno
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseregistroNovedadesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoAlumno'                   => new sfWidgetFormInputHidden(),      
      'Cedula'                         => new sfWidgetFormInput(),
      'Nombre'                         => new sfWidgetFormInput(),
      'Apellido'                       => new sfWidgetFormInput(),            
    ));

    $this->setValidators(array(
      'CodigoAlumno'                   => new sfValidatorDoctrineChoice(array('model' => 'alumno', 'column' => 'codigoalumno', 'required' => false)),
      'Cedula'                         => new sfValidatorString(array('max_length' => 10)),
      'Nombre'                         => new sfValidatorString(array('max_length' => 30)),
      'Apellido'                       => new sfValidatorString(array('max_length' => 30)),      
    ));    
  }

  public function getModelName()
  {
    return 'registronovedades';
  }

}
