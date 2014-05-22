<?php

/**
 * curso actions.
 *
 * @package    sistemacnpintag
 * @subpackage curso
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class cursoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->error='';
	$this->curso = new curso();			
	$this->pager = new sfDoctrinePager('curso',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->curso->getActiveCursosQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
	$this->error='';
    $this->curso = Doctrine::getTable('curso')->find(array($request->getParameter('codigo_curso')));
    $this->forward404Unless($this->curso);
  }
  
  public function executePaginar(sfWebRequest $request)
  {	
	$this->error='';
	$this->curso = new curso();			
	$this->pager = new sfDoctrinePager('curso',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->curso->getActiveCursosQuery());
	$this->pager->setPage($request->getParameter('page', $request->getParameter('page')));
	$this->pager->init();	
  }
  
  public function executeNew(sfWebRequest $request)
  {
	$this->error='';
    $this->form = new cursoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new cursoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($curso = Doctrine::getTable('curso')->find(array($request->getParameter('codigo_curso'))), sprintf('Object curso does not exist (%s).', $request->getParameter('codigo_curso')));
    $this->form = new cursoForm($curso);
  }

  public function executeUpdate(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($curso = Doctrine::getTable('curso')->find(array($request->getParameter('codigo_curso'))), sprintf('Object curso does not exist (%s).', $request->getParameter('codigo_curso')));
    $this->form = new cursoForm($curso);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
	$this->error='';
    $request->checkCSRFProtection();

    $this->forward404Unless($curso = Doctrine::getTable('curso')->find(array($request->getParameter('codigo_curso'))), sprintf('Object curso does not exist (%s).', $request->getParameter('codigo_curso')));
    $curso->delete();

    $this->redirect('curso/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$this->error='';
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {	  
	  $this->coleccioncurso = Doctrine::getTable('curso')
      ->createQuery('c')
	  ->where('c.Curso = ? ',array($request->getParameter('curso[Curso]'))) 
      ->execute(); 	
	  $arreglo = $this->coleccioncurso->toArray();	  
	  if (empty($arreglo))
	  {
		  $curso = $form->save();
		  $this->redirect('curso/edit?codigo_curso='.$curso->getCodigoCurso());
	  }
	  else
	  {
		  if ($request->isMethod('post'))
		  {		
				$this->error = 'El curso, ya esta registrado';		
		  }
		  else
		  {
			$codigocurso = $request->getParameter('curso[CodigoCurso]');
			if($codigocurso == $this->coleccioncurso[0]['CodigoCurso'])
			{
				$curso = $form->save();
			    $this->redirect('curso/edit?codigo_curso='.$curso->getCodigoCurso());
			}
			else
			{
				$this->error = 'El curso, ya esta registrado';			
			}	
		  }		
	  }	 
	}    
  }
}
