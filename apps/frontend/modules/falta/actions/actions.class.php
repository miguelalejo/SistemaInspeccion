<?php

/**
 * falta actions.
 *
 * @package    sistemacnpintag
 * @subpackage falta
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class faltaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->error='';
	$this->falta = new falta();			
	$this->pager = new sfDoctrinePager('falta',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->falta->getActiveFaltasQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->falta = Doctrine::getTable('falta')->find(array($request->getParameter('codigo_falta')));
    $this->forward404Unless($this->falta);
  }
  
  public function executePaginar(sfWebRequest $request)
  {	
	$this->error='';
	$this->falta = new falta();			
	$this->pager = new sfDoctrinePager('falta',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->falta->getActiveFaltasQuery());
	$this->pager->setPage($request->getParameter('page', $request->getParameter('page')));
	$this->pager->init();		
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new faltaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new faltaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($falta = Doctrine::getTable('falta')->find(array($request->getParameter('codigo_falta'))), sprintf('Object falta does not exist (%s).', $request->getParameter('codigo_falta')));
    $this->form = new faltaForm($falta);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($falta = Doctrine::getTable('falta')->find(array($request->getParameter('codigo_falta'))), sprintf('Object falta does not exist (%s).', $request->getParameter('codigo_falta')));
    $this->form = new faltaForm($falta);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($falta = Doctrine::getTable('falta')->find(array($request->getParameter('codigo_falta'))), sprintf('Object falta does not exist (%s).', $request->getParameter('codigo_falta')));
    $falta->delete();

    $this->redirect('falta/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $falta = $form->save();

      $this->redirect('falta/edit?codigo_falta='.$falta->getCodigoFalta());
    }
  }
}
