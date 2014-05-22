<?php

/**
 * novedad actions.
 *
 * @package    sistemacnpintag
 * @subpackage novedad
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class novedadActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->error='';
	$this->novedad = new novedad();			
	$this->pager = new sfDoctrinePager('novedad',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->novedad->getActiveNovedadesQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->novedad = Doctrine::getTable('novedad')->find(array($request->getParameter('codigo_novedad')));
    $this->forward404Unless($this->novedad);
  }
  
  public function executePaginar(sfWebRequest $request)
  {	
	$this->error='';
	$this->novedad = new novedad();			
	$this->pager = new sfDoctrinePager('novedad',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->novedad->getActiveNovedadesQuery());
	$this->pager->setPage($request->getParameter('page', $request->getParameter('page')));
	$this->pager->init();	
  }

  public function executeNew(sfWebRequest $request)
  {	
	$this->form = new novedadForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
	
    $this->forward404Unless($request->isMethod('post'));
    $this->form = new novedadForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($novedad = Doctrine::getTable('novedad')->find(array($request->getParameter('codigo_novedad'))), sprintf('Object novedad does not exist (%s).', $request->getParameter('codigo_novedad')));
    $this->form = new novedadForm($novedad);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($novedad = Doctrine::getTable('novedad')->find(array($request->getParameter('codigo_novedad'))), sprintf('Object novedad does not exist (%s).', $request->getParameter('codigo_novedad')));
    $this->form = new novedadForm($novedad);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($novedad = Doctrine::getTable('novedad')->find(array($request->getParameter('codigo_novedad'))), sprintf('Object novedad does not exist (%s).', $request->getParameter('codigo_novedad')));
    $novedad->delete();

    $this->redirect('novedad/index');
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $novedad = $form->save();	  
	  $horarioFugasSeleccionado = $request->getParameter('selectfugas');
	  $horarioAtrasosSeleccionado = $request->getParameter('selectatrasos');	  
	  $codigoCurso = $this->buscarCodigoCurso($request->getParameter('novedad[CodigoAlumno]'),$request->getParameter('novedad[CodigoParcial]'));
	  $codigoDia = $this->buscarCodigoDia($this->getDiaSemana(date("l")));	  
	  $fugas = $request->getParameter('novedad[Fugas]');		  
	  $novedadcursomateriahorario = new novedadcursomateriahorario();	  
	  $novedadcursomateriahorario->borrarPorCodigoNovedad($novedad->getCodigoNovedad());	
	  $atrasos = $request->getParameter('novedad[Atrasos]');
	  if($fugas>0)
	  {
		  $listaFugasSeleccionadas=$this->getUser()->getAttribute('listaFugas', array());
	      $listaFugas = explode('-', $listaFugasSeleccionadas);		  
		  foreach($listaFugas as $indice => $codigoHorarioFugaSeleccionada) {	
				$novedadcursomateriahorario->registrarNovedad($novedad->getCodigoNovedad(),$codigoCurso,$codigoHorarioFugaSeleccionada,$codigoDia,"Fuga");
		  }
	  }
	  		  
	  if($atrasos >0)
	  {	
		  $listaAtrasosSeleccionados=$this->getUser()->getAttribute('listaAtrasos', array());
	      $listaAtrasos = explode('-', $listaAtrasosSeleccionados);
		  foreach($listaAtrasos as $indice => $codigoHorarioAtrasoSeleccionado) {				 				 
				 $novedadcursomateriahorario->registrarNovedad($novedad->getCodigoNovedad(),$codigoCurso,$codigoHorarioAtrasoSeleccionado,$codigoDia,"Atraso");
		  }
	 }
	 $this->getUser()->setAttribute('listaFugas', null);	
	 $this->getUser()->setAttribute('listaAtrasos', null);	
     $this->redirect('novedad/edit?codigo_novedad='.$novedad->getCodigoNovedad());
    }
  }
  public function executeRegistroFugasYAtrasos(sfWebRequest $request)
  {
	$this->getUser()->setAttribute('listaFugas', $request->getParameter('listaFugas'));	
	$this->getUser()->setAttribute('listaAtrasos', $request->getParameter('listaAtrasos'));	 
	$this->getResponse()->setHttpHeader("X-JSON", null);
    return sfView::HEADER_ONLY;	
  }
  
  public function buscarCodigoCurso($codigoAlumno,$codigoParcial)
  {
	$coleccionCurso = Doctrine_Query::create()
        ->select('curso')
        ->from('curso c')
		->leftJoin('cursoalumno ca')
		->where('ca.codigoalumno = ? and ca.codigoperiodo = ? and ca.codigocurso = c.codigocurso', array($codigoAlumno,$this->buscarCodigoPeriodoActual($codigoParcial)))
		->execute();
	return $coleccionCurso[0]['CodigoCurso'];
  }
  public function buscarCodigoDia($dia)
  {
	$coleccionDia = Doctrine_Query::create()
        ->select('dia')
        ->from('dia d')
		->where('d.dia = ?', $dia)
		->execute(); 
	return $coleccionDia[0]['CodigoDia'];
  }
  public function buscarCodigoPeriodoActual($codigoParcial)
  {
	$coleccionPeriodo = Doctrine_Query::create()
        ->select('periodo')
        ->from('periodo p,periodoescolar pe, parcial pa')
		->where('pa.codigoparcial = ? and p.codigoperiodo=pe.codigoperiodo and pa.codigoperiodoescolar = pe.codigoperiodoescolar',$codigoParcial)
		->execute(); 
	return $coleccionPeriodo[0]['CodigoPeriodo'];
  }
   public function getDiaSemana($dia)
  {
	switch ($dia) {
    case "Monday":
		return "Lunes";
	case "Tuesday":
		return "Martes";
    case "Wednesday":
		return "Miercoles";
    case "Thursday":
		return  "Jueves";
    case "Friday":
		return  "Viernes";
    case "Saturday":
		return  "Sabado";
    case "Sunday":
		return  "Domingo";
	}
  }
}
