<?php

/**
 * registroNovedades actions.
 *
 * @package    sistemacnpintag
 * @subpackage registroNovedades
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class registroNovedadesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
     $this->alumno_list = Doctrine::getTable('alumno')
      ->createQuery('a')
      ->execute();	 
	  $this->form=new enumbusquedaalumnoForm();
	  /*$this->form = new sfForm();
	  $this->form->setWidgets(array(
		'Tipo Busqueda' => new sfWidgetFormChoice(array('choices' => array('Cedula', 'Nombres', 'Apellidos'))),		
	  ));*/
	 	  
  }
  public function executeContact($request)
  {
	  
	  
  }
   public function executeNew(sfWebRequest $request)
  {
    $this->form = new registroNovedadesActions();
  }
  public function executeShow(sfWebRequest $request)
  {
    $this->alumno = Doctrine::getTable('alumno')->find(array($request->getParameter('codigo_alumno')));
	$this->curso = Doctrine::getTable('curso')->find(array($request->getParameter('codigo_curso')));
    $this->forward404Unless($this->alumno, $this->curso );
  }
  
  public function executeSearch(sfWebRequest $request)
  {  
  $this->form=new enumbusquedaalumnoForm();
    $comodin = "%";
	$tipobusqueda = $request->getParameter('tipobusqueda');
	if ($tipobusqueda == 'c') {
		$this->alumno_list = Doctrine::getTable('alumno')
      ->createQuery('a')
	  ->where('a.cedula like ?',array($request->getParameter('cedula_alumno').$comodin)) 
      ->execute(); 
	}
	if ($tipobusqueda == 'n') {
		$this->alumno_list = Doctrine::getTable('alumno')
      ->createQuery('a')
	  ->where('a.nombre like ?',array($request->getParameter('cedula_alumno').$comodin)) 
      ->execute(); 
	}
	if ($tipobusqueda == 'a') {
		$this->alumno_list = Doctrine::getTable('alumno')
      ->createQuery('a')
	  ->where('a.apellido like ?',array($request->getParameter('cedula_alumno').$comodin)) 
      ->execute(); 
	}
  }
	public function executeProcesador(sfWebRequest $request)
	{
    //-- Aquí podríamos ejecutar lo necesario para trabajar con la base de datos,
    //   archivos, arrays, lógica de negocios, etc.
	echo 'hola';
    $respuesta = '<persona><nombre>John</nombre><apellido>Doe</apellido></persona>';
 
    $this->getResponse()->setContent($respuesta);
 
    return sfView::NONE;
   }
    public function executeTipoBusqueda(sfWebRequest $request)
	{
    //-- Aquí podríamos ejecutar lo necesario para trabajar con la base de datos,
    //   archivos, arrays, lógica de negocios, etc.
	echo 'hola';
	$tipobusqueda = $request->getParameter('tipobusqueda');
	echo $tipobusqueda;
	
    $this->getResponse()->setContent($tipobusqueda); 
    return sfView::NONE;
   }
}
