<?php

/**
 * periodo actions.
 *
 * @package    sistemacnpintag
 * @subpackage periodo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class periodoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->error='';
	$this->periodo = new periodo();			
	$this->pager = new sfDoctrinePager('periodo',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->periodo->getActivePeriodosQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
	$this->error = '';
    $this->periodo = Doctrine::getTable('periodo')->find(array($request->getParameter('codigo_periodo')));
    $this->forward404Unless($this->periodo);
  }

  public function executePaginar(sfWebRequest $request)
  {	
	$this->error='';
	$this->periodo = new periodo();			
	$this->pager = new sfDoctrinePager('periodo',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->periodo->getActivePeriodosQuery());
	$this->pager->setPage($request->getParameter('page', $request->getParameter('page')));
	$this->pager->init();
  }
  
  public function executeNew(sfWebRequest $request)
  {
	$this->error = '';
    $this->form = new periodoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
	$this->error = '';
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new periodoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
	$this->error = '';
    $this->forward404Unless($periodo = Doctrine::getTable('periodo')->find(array($request->getParameter('codigo_periodo'))), sprintf('Object periodo does not exist (%s).', $request->getParameter('codigo_periodo')));
    $this->form = new periodoForm($periodo);
  }

  public function executeUpdate(sfWebRequest $request)
  {
	$this->error = '';
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($periodo = Doctrine::getTable('periodo')->find(array($request->getParameter('codigo_periodo'))), sprintf('Object periodo does not exist (%s).', $request->getParameter('codigo_periodo')));
    $this->form = new periodoForm($periodo);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($periodo = Doctrine::getTable('periodo')->find(array($request->getParameter('codigo_periodo'))), sprintf('Object periodo does not exist (%s).', $request->getParameter('codigo_periodo')));
    $periodo->delete();

    $this->redirect('periodo/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$this->error = '';
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
	  $this->coleccionperiodo = Doctrine::getTable('periodo')->findByPeriodo($request->getParameter('periodo[Periodo]'));     	  
	  if (!empty($this->coleccionperiodo) and $request->isMethod('post'))
	  {		
		$arreglo = $this->coleccionperiodo->toArray();
		if (empty($arreglo))
		{
			$periodo = $form->save();
			$this->redirect('periodo/edit?codigo_periodo='.$periodo->getCodigoPeriodo());
		}
		else
		{		
			$this->error = 'Periodo no valido';		
		}
	  }
	  else
	  {
		$this->coleccionperiodo = Doctrine::getTable('periodo')->findByPeriodo($request->getParameter('periodo[Periodo]'));
		$arreglo = $this->coleccionperiodo->toArray();
		if (empty($arreglo))
		{
			$periodo = $form->save();
			$this->redirect('periodo/edit?codigo_periodo='.$periodo->getCodigoPeriodo());
		}
		else	
		{		
			$codigoPerido = $request->getParameter('periodo[CodigoPeriodo]');
			if($codigoPerido == $this->coleccionperiodo[0]['CodigoPeriodo'])
			{
				$periodo = $form->save();
				$this->redirect('periodo/edit?codigo_periodo='.$periodo->getCodigoPeriodo());
			}
			else
			{
				$this->error = 'Periodo no valido';		
			}			
		}	
	  }
      
    }
  }
}
