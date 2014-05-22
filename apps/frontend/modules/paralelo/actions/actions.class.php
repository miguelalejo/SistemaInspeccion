<?php

/**
 * paralelo actions.
 *
 * @package    sistemacnpintag
 * @subpackage paralelo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class paraleloActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->error='';
	$this->paralelo = new paralelo();			
	$this->pager = new sfDoctrinePager('paralelo',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->paralelo->getActiveParalelosQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();	
  }

  public function executeShow(sfWebRequest $request)
  {
	$this->error ='';
    $this->paralelo = Doctrine::getTable('paralelo')->find(array($request->getParameter('codigo_paralelo')));
    $this->forward404Unless($this->paralelo);
  }
  
  public function executePaginar(sfWebRequest $request)
  {	
	$this->error='';
	$this->paralelo = new paralelo();			
	$this->pager = new sfDoctrinePager('paralelo',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->dia->getActiveParalelosQuery());
	$this->pager->setPage($request->getParameter('page', $request->getParameter('page')));
	$this->pager->init();		
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->error ='';
    $this->form = new paraleloForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($request->isMethod('post'));
    $this->form = new paraleloForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($paralelo = Doctrine::getTable('paralelo')->find(array($request->getParameter('codigo_paralelo'))), sprintf('Object paralelo does not exist (%s).', $request->getParameter('codigo_paralelo')));
    $this->form = new paraleloForm($paralelo);
  }

  public function executeUpdate(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($paralelo = Doctrine::getTable('paralelo')->find(array($request->getParameter('codigo_paralelo'))), sprintf('Object paralelo does not exist (%s).', $request->getParameter('codigo_paralelo')));
    $this->form = new paraleloForm($paralelo);
    $this->processForm($request, $this->form);
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->error ='';
    $request->checkCSRFProtection();
    $this->forward404Unless($paralelo = Doctrine::getTable('paralelo')->find(array($request->getParameter('codigo_paralelo'))), sprintf('Object paralelo does not exist (%s).', $request->getParameter('codigo_paralelo')));
    $paralelo->delete();
    $this->redirect('paralelo/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$this->error ='';
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
	  $this->coleccionparalelo = Doctrine::getTable('paralelo')
      ->createQuery('p')
	  ->where('p.paralelo = ? ',$request->getParameter('paralelo[Paralelo]')) 
      ->execute(); 
	  $arreglo = $this->coleccionparalelo->toArray();
	  if (empty($arreglo))
	  {
		$paralelo = $form->save();
		$this->redirect('paralelo/edit?codigo_paralelo='.$paralelo->getCodigoParalelo());
	  }
	  else
	  {
		  if ($request->isMethod('post'))
		  {		
				$this->error = 'El paralelo, ya esta registrado';		
		  }
		  else
		  {
			$codigoparalelo = $request->getParameter('paralelo[CodigoParalelo]');
			if($codigoparalelo == $this->coleccionparalelo[0]['CodigoParalelo'])
			{
				$paralelo = $form->save();
				$this->redirect('paralelo/edit?codigo_paralelo='.$paralelo->getCodigoParalelo());
			}
			else
			{
				$this->error = 'El paralelo, ya esta registrado';			
			}	
		  }		
	  }
      
    }
  }
}
