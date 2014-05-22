<?php

/**
 * cursomateriahorario actions.
 *
 * @package    sistemacnpintag
 * @subpackage cursomateriahorario
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class cursomateriahorarioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->error='';
	$this->cursomateriahorario = new cursomateriahorario();			
	$this->pager = new sfDoctrinePager('cursomateriahorario',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->cursomateriahorario->getActiveCursoMateriaHorarioQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
	$this->error='';
    $this->cursomateriahorario = Doctrine::getTable('cursomateriahorario')->find(array($request->getParameter('codigo_curso_materia_horario')));
    $this->forward404Unless($this->cursomateriahorario);
  }
	
  public function executePaginar(sfWebRequest $request)
  {	
	$this->error='';
	$this->cursomateriahorario = new cursomateriahorario();			
	$this->pager = new sfDoctrinePager('cursomateriahorario',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->cursomateriahorario->getActiveCursoMateriaHorarioQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();  
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->error='';
    $this->form = new cursomateriahorarioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new cursomateriahorarioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($cursomateriahorario = Doctrine::getTable('cursomateriahorario')->find(array($request->getParameter('codigo_curso_materia_horario'))), sprintf('Object cursomateriahorario does not exist (%s).', $request->getParameter('codigo_curso_materia_horario')));
    $this->form = new cursomateriahorarioForm($cursomateriahorario);
  }

  public function executeUpdate(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($cursomateriahorario = Doctrine::getTable('cursomateriahorario')->find(array($request->getParameter('codigo_curso_materia_horario'))), sprintf('Object cursomateriahorario does not exist (%s).', $request->getParameter('codigo_curso_materia_horario')));
    $this->form = new cursomateriahorarioForm($cursomateriahorario);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
	$this->error='';
    $request->checkCSRFProtection();

    $this->forward404Unless($cursomateriahorario = Doctrine::getTable('cursomateriahorario')->find(array($request->getParameter('codigo_curso_materia_horario'))), sprintf('Object cursomateriahorario does not exist (%s).', $request->getParameter('codigo_curso_materia_horario')));
    $cursomateriahorario->delete();

    $this->redirect('cursomateriahorario/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$this->error='';
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
	 $this->coleccioncursomateriahorario = Doctrine::getTable('cursomateriahorario')
      ->createQuery('c')
	  ->where('c.codigoperiodo = ? and c.codigocurso = ? and c.codigoparalelo = ? and c.codigohorario = ? and c.codigodia = ? and c.codigomateria = ? ',array($request->getParameter('cursomateriahorario[CodigoPeriodo]'),$request->getParameter('cursomateriahorario[CodigoCurso]'),$request->getParameter('cursomateriahorario[CodigoParalelo]'),$request->getParameter('cursomateriahorario[CodigoHorario]'),$request->getParameter('cursomateriahorario[CodigoDia]'),$request->getParameter('cursomateriahorario[CodigoMateria]'))) 
      ->execute(); 	
	  $arreglo = $this->coleccioncursomateriahorario->toArray();	  
	 
	  if (empty($arreglo))
	  {
		  $cursomateriahorario = $form->save();
		  $this->redirect('cursomateriahorario/edit?codigo_curso_materia_horario='.$cursomateriahorario->getCodigoCursoMateriaHorario());
	  }
	  else
	  {
		  if ($request->isMethod('post'))
		  {		
				$this->error = 'El curso, materia, dia  y el periodo seleccionados ya estan registrados';		
		  }
		  else
		  {
			$cursomateriahorario = $request->getParameter('cursomateriahorario[CodigoCursoMateriaHorario]');
			if($cursomateriahorario == $this->coleccioncursomateriahorario[0]['CodigoCursoMateriaHorario'])
			{
				$cursomateriahorario = $form->save();
				$this->redirect('cursomateriahorario/edit?codigo_curso_materia_horario='.$cursomateriahorario->getCodigoCursoMateriaHorario());
			}
			else
			{
				$this->error = 'El curso, materia, dia  y el periodo seleccionados ya estan registrados';		
			}	
		  }		
	  }     
    }
  }
}
