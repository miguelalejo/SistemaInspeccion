<?php

/**
 * alumno form base class.
 *
 * @package    form
 * @subpackage alumno
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseenumbusquedaalumnoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'TipoBusqueda'                   => new sfWidgetFormChoice(array('choices' => array('Fabien Potencier', 'Fabian Lange'))),     
    ));     
  }
  public function getModelName()
  {
    return 'enumbusquedaalumno';
  }

}
