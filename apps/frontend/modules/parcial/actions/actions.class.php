<?php

/**
 * parcial actions.
 *
 * @package    sistemacnpintag
 * @subpackage parcial
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class parcialActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->error='';
	$this->parcial = new parcial();			
	$this->pager = new sfDoctrinePager('parcial',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->parcial->getActiveParcialesQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
	$this->error ='';
    $this->parcial = Doctrine::getTable('parcial')->find(array($request->getParameter('codigo_parcial')));
    $this->forward404Unless($this->parcial);
  }
  
  public function executePaginar(sfWebRequest $request)
  {	
	$this->error='';
	$this->parcial = new parcial();			
	$this->pager = new sfDoctrinePager('parcial',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->parcial->getActiveParcialesQuery());
	$this->pager->setPage($request->getParameter('page', $request->getParameter('page')));
	$this->pager->init();
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->error ='';
    $this->form = new parcialForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new parcialForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($parcial = Doctrine::getTable('parcial')->find(array($request->getParameter('codigo_parcial'))), sprintf('Object parcial does not exist (%s).', $request->getParameter('codigo_parcial')));
    $this->form = new parcialForm($parcial);
  }

  public function executeUpdate(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($parcial = Doctrine::getTable('parcial')->find(array($request->getParameter('codigo_parcial'))), sprintf('Object parcial does not exist (%s).', $request->getParameter('codigo_parcial')));
    $this->form = new parcialForm($parcial);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
	$this->error ='';
    $request->checkCSRFProtection();

    $this->forward404Unless($parcial = Doctrine::getTable('parcial')->find(array($request->getParameter('codigo_parcial'))), sprintf('Object parcial does not exist (%s).', $request->getParameter('codigo_parcial')));
    $parcial->delete();

    $this->redirect('parcial/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$this->error ='';
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
		$this->coleccionparcial  = Doctrine::getTable('parcial')
		->createQuery('p')
		->where('p.codigoperiodoescolar = ? and  p.parcial = ? ',array($request->getParameter('parcial[CodigoPeriodoEscolar]'),$request->getParameter('parcial[Parcial]'))) 
		->execute();	  
	  $arreglo = $this->coleccionparcial->toArray();  
	  
	  if (empty($arreglo))
	  {
		 $parcial = $form->save();
	     $this->redirect('parcial/edit?codigo_parcial='.$parcial->getCodigoParcial());
	  }
	  else
	  {
		  if ($request->isMethod('post'))
		  {		
				$this->error = 'El paracial ya esta registrado para este perido escolar';		
		  }
		  else
		  {
			$codigoparcial = $request->getParameter('parcial[CodigoParcial]');
			if($codigoparcial == $this->coleccionparcial[0]['CodigoParcial'])
			{
				$parcial = $form->save();
				$this->redirect('parcial/edit?codigo_parcial='.$parcial->getCodigoParcial());
			}
			else
			{
				$this->error = 'El paracial ya esta registrado para este perido escolar';		
			}	
		  }		
	  }
      
    }
  }
}
