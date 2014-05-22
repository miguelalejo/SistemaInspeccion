<?php

/**
 * horario actions.
 *
 * @package    sistemacnpintag
 * @subpackage horario
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class horarioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->error='';
	$this->horario = new horario();			
	$this->pager = new sfDoctrinePager('horario',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->horario->getActiveHorariosQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();	
  }

  public function executeShow(sfWebRequest $request)
  {
	$this->error ='';
    $this->horario = Doctrine::getTable('horario')->find(array($request->getParameter('codigo_horario')));
    $this->forward404Unless($this->horario);
  }
  
  public function executePaginar(sfWebRequest $request)
  {	
	$this->error='';
	$this->horario = new horario();			
	$this->pager = new sfDoctrinePager('horario',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->horario->getActiveHorariosQuery());
	$this->pager->setPage($request->getParameter('page', $request->getParameter('page')));
	$this->pager->init();		
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->error ='';
    $this->form = new horarioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new horarioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($horario = Doctrine::getTable('horario')->find(array($request->getParameter('codigo_horario'))), sprintf('Object horario does not exist (%s).', $request->getParameter('codigo_horario')));
    $this->form = new horarioForm($horario);
  }

  public function executeUpdate(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($horario = Doctrine::getTable('horario')->find(array($request->getParameter('codigo_horario'))), sprintf('Object horario does not exist (%s).', $request->getParameter('codigo_horario')));
    $this->form = new horarioForm($horario);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
	$this->error ='';
    $request->checkCSRFProtection();

    $this->forward404Unless($horario = Doctrine::getTable('horario')->find(array($request->getParameter('codigo_horario'))), sprintf('Object horario does not exist (%s).', $request->getParameter('codigo_horario')));
    $horario->delete();

    $this->redirect('horario/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$this->error ='';
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
	  $this->coleccionhorario = Doctrine::getTable('horario')
      ->createQuery('h')
	  ->where('h.horario = ? ',$request->getParameter('horario[Horario]')) 
      ->execute(); 
	  $arreglo = $this->coleccionhorario->toArray();
	  if (empty($arreglo))
	  {
		  $horario = $form->save();
		  $this->redirect('horario/edit?codigo_horario='.$horario->getCodigoHorario());	  
	  }
	  else
	  {
		  if ($request->isMethod('post'))
		  {		
				$this->error = 'El horario, ya esta registrado';		
		  }
		  else
		  {
			$codigohorario = $request->getParameter('horario[CodigoHorario]');
			if($codigohorario == $this->coleccionhorario[0]['CodigoHorario'])
			{
				$horario = $form->save();
				$this->redirect('horario/edit?codigo_horario='.$horario->getCodigoHorario());
			}
			else
			{
				$this->error = 'El horario, ya esta registrado';			
			}	
		  }		
	  }

    }
  }
}
