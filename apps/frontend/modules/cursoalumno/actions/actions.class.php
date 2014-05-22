<?php

/**
 * cursoalumno actions.
 *
 * @package    sistemacnpintag
 * @subpackage cursoalumno
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class cursoalumnoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->error='';
	$this->cursoalumno = new cursoalumno();			
	$this->pager = new sfDoctrinePager('cursoalumno',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->cursoalumno->getActiveCursoAlumnoQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
	$this->error ='';
    $this->cursoalumno = Doctrine::getTable('cursoalumno')->find(array($request->getParameter('curso_alumno')));
    $this->forward404Unless($this->cursoalumno);
  }
  
  public function executePaginar(sfWebRequest $request)
  {	
	$this->error='';
	$this->cursoalumno = new cursoalumno();			
	$this->pager = new sfDoctrinePager('cursoalumno',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->cursoalumno->getActiveCursoAlumnoQuery());
	$this->pager->setPage($request->getParameter('page', $request->getParameter('page')));
	$this->pager->init();	
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->error ='';
    $this->form = new cursoalumnoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new cursoalumnoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($cursoalumno = Doctrine::getTable('cursoalumno')->find(array($request->getParameter('curso_alumno'))), sprintf('Object cursoalumno does not exist (%s).', $request->getParameter('curso_alumno')));
    $this->form = new cursoalumnoForm($cursoalumno);
  }

  public function executeUpdate(sfWebRequest $request)
  {
	$this->error ='';
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($cursoalumno = Doctrine::getTable('cursoalumno')->find(array($request->getParameter('curso_alumno'))), sprintf('Object cursoalumno does not exist (%s).', $request->getParameter('curso_alumno')));
    $this->form = new cursoalumnoForm($cursoalumno);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
	$this->error ='';
    $request->checkCSRFProtection();

    $this->forward404Unless($cursoalumno = Doctrine::getTable('cursoalumno')->find(array($request->getParameter('curso_alumno'))), sprintf('Object cursoalumno does not exist (%s).', $request->getParameter('curso_alumno')));
    $cursoalumno->delete();

    $this->redirect('cursoalumno/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$this->error ='';
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
		$this->coleccioncursoalumno  = Doctrine::getTable('cursoalumno')
		->createQuery('c')
		->where('c.codigoalumno = ? and  c.codigoperiodo = ? and c.codigocurso = ? and c.codigoparalelo = ? ',array($request->getParameter('cursoalumno[CodigoAlumno]'),$request->getParameter('cursoalumno[CodigoPeriodo]'),$request->getParameter('cursoalumno[CodigoCurso]'),$request->getParameter('cursoalumno[CodigoParalelo]'))) 
		->execute();	  
	  $arreglo = $this->coleccioncursoalumno->toArray();  
	  
	  if (empty($arreglo))
	  {
		$cursoalumno = $form->save();
        $this->redirect('cursoalumno/edit?curso_alumno='.$cursoalumno->getCodigoCursoAlumno());
	  }
	  else
	  {
		  if ($request->isMethod('post'))
		  {		
				$this->error = 'El alumno ya esta registrado en este curso';		
		  }
		  else
		  {
			$codigocursoalumno = $request->getParameter('cursoalumno[CodigoCursoAlumno]');
			if($codigocursoalumno == $this->coleccioncursoalumno[0]['CodigoCursoAlumno'])
			{
				$cursoalumno = $form->save();
				$this->redirect('cursoalumno/edit?curso_alumno='.$cursoalumno->getCodigoCursoAlumno());
			}
			else
			{
				$this->error = 'El alumno ya esta registrado en este curso';		
			}	
		  }		
	  }	      
    }
  }
}
