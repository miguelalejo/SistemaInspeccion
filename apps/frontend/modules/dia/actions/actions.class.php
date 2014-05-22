<?php

/**
 * dia actions.
 *
 * @package    sistemacnpintag
 * @subpackage dia
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class diaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->error='';
	$this->dia = new dia();			
	$this->pager = new sfDoctrinePager('dia',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->dia->getActiveDiasQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();	
  }

  public function executeShow(sfWebRequest $request)
  {
	$this->error ='';
    $this->dia = Doctrine::getTable('dia')->find(array($request->getParameter('codigo_dia')));
    $this->forward404Unless($this->dia);
  }
  
  public function executePaginar(sfWebRequest $request)
  {	
	$this->error='';
	$this->dia = new dia();			
	$this->pager = new sfDoctrinePager('dia',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->dia->getActiveDiasQuery());
	$this->pager->setPage($request->getParameter('page', $request->getParameter('page')));
	$this->pager->init();		
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->error ='';
    $this->form = new diaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new diaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($dia = Doctrine::getTable('dia')->find(array($request->getParameter('codigo_dia'))), sprintf('Object dia does not exist (%s).', $request->getParameter('codigo_dia')));
    $this->form = new diaForm($dia);
  }

  public function executeUpdate(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($dia = Doctrine::getTable('dia')->find(array($request->getParameter('codigo_dia'))), sprintf('Object dia does not exist (%s).', $request->getParameter('codigo_dia')));
    $this->form = new diaForm($dia);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
	$this->error ='';
    $request->checkCSRFProtection();

    $this->forward404Unless($dia = Doctrine::getTable('dia')->find(array($request->getParameter('codigo_dia'))), sprintf('Object dia does not exist (%s).', $request->getParameter('codigo_dia')));
    $dia->delete();

    $this->redirect('dia/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$this->error ='';
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
	  $this->colecciondia = Doctrine::getTable('dia')
      ->createQuery('d')
	  ->where('d.dia = ? ',$request->getParameter('dia[Dia]')) 
      ->execute(); 
	  $arreglo = $this->colecciondia->toArray();
	  if (empty($arreglo))
	  {
		 $dia = $form->save();
		 $this->redirect('dia/edit?codigo_dia='.$dia->getCodigoDia());
	  }
	  else
	  {
		  if ($request->isMethod('post'))
		  {		
				$this->error = 'El dia de la semana, ya esta registrado';		
		  }
		  else
		  {
			$codigodia = $request->getParameter('dia[CodigoDia]');
			if($codigodia == $this->colecciondia[0]['CodigoDia'])
			{
				$dia = $form->save();
				$this->redirect('dia/edit?codigo_dia='.$dia->getCodigoDia());
			}
			else
			{
				$this->error = 'El dia de la semana, ya esta registrado';			
			}	
		  }		
	  }
      
    }
  }
}
