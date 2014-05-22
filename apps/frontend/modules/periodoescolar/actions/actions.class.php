<?php

/**
 * periodoescolar actions.
 *
 * @package    sistemacnpintag
 * @subpackage periodoescolar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class periodoescolarActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->error='';
	$this->periodoescolar = new periodoescolar();			
	$this->pager = new sfDoctrinePager('periodoescolar',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->periodoescolar->getActivePeriodosEscolaresQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
	$this->error ='';
    $this->periodoescolar = Doctrine::getTable('periodoescolar')->find(array($request->getParameter('codigo_periodo_escolar')));
    $this->forward404Unless($this->periodoescolar);
  }
  
  public function executePaginar(sfWebRequest $request)
  {	
	$this->error='';
	$this->periodoescolar = new periodoescolar();			
	$this->pager = new sfDoctrinePager('periodoescolar',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->periodoescolar->getActivePeriodosEscolaresQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
  }
  public function executeNew(sfWebRequest $request)
  {
	$this->error ='';
    $this->form = new periodoescolarForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new periodoescolarForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($periodoescolar = Doctrine::getTable('periodoescolar')->find(array($request->getParameter('codigo_periodo_escolar'))), sprintf('Object periodoescolar does not exist (%s).', $request->getParameter('codigo_periodo_escolar')));
    $this->form = new periodoescolarForm($periodoescolar);
  }

  public function executeUpdate(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($periodoescolar = Doctrine::getTable('periodoescolar')->find(array($request->getParameter('codigo_periodo_escolar'))), sprintf('Object periodoescolar does not exist (%s).', $request->getParameter('codigo_periodo_escolar')));
    $this->form = new periodoescolarForm($periodoescolar);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
	$this->error ='';
    $request->checkCSRFProtection();

    $this->forward404Unless($periodoescolar = Doctrine::getTable('periodoescolar')->find(array($request->getParameter('codigo_periodo_escolar'))), sprintf('Object periodoescolar does not exist (%s).', $request->getParameter('codigo_periodo_escolar')));
    $periodoescolar->delete();

    $this->redirect('periodoescolar/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$this->error ='';
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
		$this->coleccionperiodoescolar  = Doctrine::getTable('periodoescolar')
		->createQuery('p')
		->where('p.codigoperiodo = ? and  p.periodoescolar = ? ',array($request->getParameter('periodoescolar[CodigoPeriodo]'),$request->getParameter('periodoescolar[PeriodoEscolar]'))) 
		->execute();	  
	  $arreglo = $this->coleccionperiodoescolar->toArray();  
	  
	  if (empty($arreglo))
	  {
		$periodoescolar = $form->save();
		$this->redirect('periodoescolar/edit?codigo_periodo_escolar='.$periodoescolar->getCodigoPeriodoEscolar());
	  }
	  else
	  {
		  if ($request->isMethod('post'))
		  {		
				$this->error = 'El perido escolar ya esta registrado para el a&ntilde;o seleccionado';		
		  }
		  else
		  {
			$codigoperiodoescolar = $request->getParameter('periodoescolar[CodigoPeriodoEscolar]');
			if($codigoperiodoescolar == $this->coleccionperiodoescolar[0]['CodigoPeriodoEscolar'])
			{
				$periodoescolar = $form->save();
				$this->redirect('periodoescolar/edit?codigo_periodo_escolar='.$periodoescolar->getCodigoPeriodoEscolar());
			}
			else
			{
				$this->error = 'El perido escolar ya esta registrado para el a&ntilde;o seleccionado';		
			}	
		  }		
	  }	 
      
    }
  }
}
