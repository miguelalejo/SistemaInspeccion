<?php

/**
 * tiponovedad actions.
 *
 * @package    sistemacnpintag
 * @subpackage tiponovedad
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class tiponovedadActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->error='';
	$this->tiponovedad = new tiponovedad();			
	$this->pager = new sfDoctrinePager('tiponovedad',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->tiponovedad->getActiveNovedadesQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
	$this->error='';
    $this->tiponovedad = Doctrine::getTable('tiponovedad')->find(array($request->getParameter('codigo_tipo_novedad')));
    $this->forward404Unless($this->tiponovedad);
  }
  
  public function executePaginar(sfWebRequest $request)
  {	
	$this->error='';
	$this->tiponovedad = new tiponovedad();	
	$this->pager = new sfDoctrinePager('tiponovedad',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->tiponovedad->getActiveNovedadesQuery());
	$this->pager->setPage($request->getParameter('page', $request->getParameter('page')));
	$this->pager->init();
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->error='';
    $this->form = new tiponovedadForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new tiponovedadForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($tiponovedad = Doctrine::getTable('tiponovedad')->find(array($request->getParameter('codigo_tipo_novedad'))), sprintf('Object tiponovedad does not exist (%s).', $request->getParameter('codigo_tipo_novedad')));
    $this->form = new tiponovedadForm($tiponovedad);
  }

  public function executeUpdate(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($tiponovedad = Doctrine::getTable('tiponovedad')->find(array($request->getParameter('codigo_tipo_novedad'))), sprintf('Object tiponovedad does not exist (%s).', $request->getParameter('codigo_tipo_novedad')));
    $this->form = new tiponovedadForm($tiponovedad);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
	$this->error='';
    $request->checkCSRFProtection();

    $this->forward404Unless($tiponovedad = Doctrine::getTable('tiponovedad')->find(array($request->getParameter('codigo_tipo_novedad'))), sprintf('Object tiponovedad does not exist (%s).', $request->getParameter('codigo_tipo_novedad')));
    $tiponovedad->delete();

    $this->redirect('tiponovedad/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$this->error='';
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
	  $this->colecciontiponovedad = Doctrine::getTable('tiponovedad')
      ->createQuery('n')
	  ->where('n.novedad = ? ',$request->getParameter('tiponovedad[Novedad]')) 
      ->execute(); 	
	  $arreglo = $this->colecciontiponovedad->toArray();	  
	  if (empty($arreglo))
	  {
		$tiponovedad = $form->save();
		$this->redirect('tiponovedad/edit?codigo_tipo_novedad='.$tiponovedad->getCodigoTipoNovedad());
	  }
	  else
	  {
		  if ($request->isMethod('post'))
		  {		
				$this->error = 'Este tipo de novedad, ya esta registrada';		
		  }
		  else
		  {
			$codigotiponovedad = $request->getParameter('tiponovedad[CodigoTipoNovedad]');
			if($codigotiponovedad == $this->colecciontiponovedad[0]['CodigoTipoNovedad'])
			{
				$tiponovedad = $form->save();
				$this->redirect('tiponovedad/edit?codigo_tipo_novedad='.$tiponovedad->getCodigoTipoNovedad());
			}
			else
			{
				$this->error = 'Este tipo de novedad, ya esta registrada';			
			}	
		  }		
	  }      
    }
  }
}
