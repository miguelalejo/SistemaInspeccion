<?php

/**
 * tipofalta actions.
 *
 * @package    sistemacnpintag
 * @subpackage tipofalta
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class tipofaltaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->error='';
	$this->tipofalta = new tipofalta();			
	$this->pager = new sfDoctrinePager('tipofalta',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->tipofalta->getActiveFaltasQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
	$this->error='';
    $this->tipofalta = Doctrine::getTable('tipofalta')->find(array($request->getParameter('codigo_tipo_falta')));
    $this->forward404Unless($this->tipofalta);
  }
  
  public function executePaginar(sfWebRequest $request)
  {	
	$this->error='';
	$this->tipofalta = new tipofalta();	
	$this->pager = new sfDoctrinePager('tipofalta',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->tipofalta->getActiveFaltasQuery());
	$this->pager->setPage($request->getParameter('page', $request->getParameter('page')));
	$this->pager->init();
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->error='';
    $this->form = new tipofaltaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new tipofaltaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($tipofalta = Doctrine::getTable('tipofalta')->find(array($request->getParameter('codigo_tipo_falta'))), sprintf('Object tipofalta does not exist (%s).', $request->getParameter('codigo_tipo_falta')));
    $this->form = new tipofaltaForm($tipofalta);
  }

  public function executeUpdate(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($tipofalta = Doctrine::getTable('tipofalta')->find(array($request->getParameter('codigo_tipo_falta'))), sprintf('Object tipofalta does not exist (%s).', $request->getParameter('codigo_tipo_falta')));
    $this->form = new tipofaltaForm($tipofalta);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
	$this->error='';
    $request->checkCSRFProtection();

    $this->forward404Unless($tipofalta = Doctrine::getTable('tipofalta')->find(array($request->getParameter('codigo_tipo_falta'))), sprintf('Object tipofalta does not exist (%s).', $request->getParameter('codigo_tipo_falta')));
    $tipofalta->delete();

    $this->redirect('tipofalta/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$this->error='';
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
	  $this->colecciontipofalta = Doctrine::getTable('tipofalta')
      ->createQuery('f')
	  ->where('f.falta = ? ',$request->getParameter('tipofalta[Falta]')) 
      ->execute(); 	
	  $arreglo = $this->colecciontipofalta->toArray();	  
	  if (empty($arreglo))
	  {
		  $tipofalta = $form->save();
	      $this->redirect('tipofalta/edit?codigo_tipo_falta='.$tipofalta->getCodigoTipoFalta());
	  }
	  else
	  {
		  if ($request->isMethod('post'))
		  {		
				$this->error = 'Este tipo de falta, ya esta registrada';		
		  }
		  else
		  {
			$codigotipofalta = $request->getParameter('tipofalta[CodigoTipoFalta]');
			if($codigotipofalta == $this->colecciontipofalta[0]['CodigoTipoFalta'])
			{
				$tipofalta = $form->save();
				$this->redirect('tipofalta/edit?codigo_tipo_falta='.$tipofalta->getCodigoTipoFalta());
			}
			else
			{
				$this->error = 'Este tipo de falta, ya esta registrada';			
			}	
		  }		
	  }      
    }
  }
}
