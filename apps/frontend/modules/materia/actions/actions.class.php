<?php

/**
 * materia actions.
 *
 * @package    sistemacnpintag
 * @subpackage materia
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class materiaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->error='';
	$this->materia = new materia();			
	$this->pager = new sfDoctrinePager('materia',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->materia->getActiveMateriasQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
	$this->error='';
    $this->materia = Doctrine::getTable('materia')->find(array($request->getParameter('codigo_materia')));
    $this->forward404Unless($this->materia);
  }

  public function executePaginar(sfWebRequest $request)
  {	
	$this->error='';
	$this->materia = new materia();			
	$this->pager = new sfDoctrinePager('materia',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->materia->getActiveMateriasQuery());
	$this->pager->setPage($request->getParameter('page', $request->getParameter('page')));
	$this->pager->init();	
  }
  public function executeNew(sfWebRequest $request)
  {
	$this->error='';
    $this->form = new materiaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new materiaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($materia = Doctrine::getTable('materia')->find(array($request->getParameter('codigo_materia'))), sprintf('Object materia does not exist (%s).', $request->getParameter('codigo_materia')));
    $this->rutaImagenMateria = sfConfig::get('sf_upload_dir_name').'/uploads/materias/'.$materia->getImagen();
	$this->form = new materiaForm($materia);
  }

  public function executeUpdate(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($materia = Doctrine::getTable('materia')->find(array($request->getParameter('codigo_materia'))), sprintf('Object materia does not exist (%s).', $request->getParameter('codigo_materia')));
    $this->rutaImagenMateria = sfConfig::get('sf_upload_dir_name').'/uploads/materias/'.$materia->getImagen();
	$this->form = new materiaForm($materia);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
	$this->error='';
    $request->checkCSRFProtection();

    $this->forward404Unless($materia = Doctrine::getTable('materia')->find(array($request->getParameter('codigo_materia'))), sprintf('Object materia does not exist (%s).', $request->getParameter('codigo_materia')));
    $materia->delete();

    $this->redirect('materia/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$this->error='';
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
	  $this->coleccionmateria = Doctrine::getTable('materia')
      ->createQuery('m')
	  ->where('m.materia = ? ',$request->getParameter('materia[Materia]')) 
      ->execute(); 	
	  $arreglo = $this->coleccionmateria->toArray();	  
	 
	  if (empty($arreglo))
	  {
		  $materia = $form->save();
		  $this->redirect('materia/edit?codigo_materia='.$materia->getCodigoMateria());
	  }
	  else
	  {
		  if ($request->isMethod('post'))
		  {		
				$this->error = 'La materia ya esta registrada';		
		  }
		  else
		  {
			$codigomateria = $request->getParameter('materia[CodigoMateria]');
			if($codigomateria == $this->coleccionmateria[0]['CodigoMateria'])
			{
				 $materia = $form->save();
				 $this->redirect('materia/edit?codigo_materia='.$materia->getCodigoMateria());
			}
			else
			{
				$this->error = 'La materia ya esta registrada';		
			}	
		  }		
	  }
     
    }
  }
}
