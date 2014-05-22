<?php

/**
 * novedadalumnoparcial actions.
 *
 * @package    sistemacnpintag
 * @subpackage novedadalumnoparcial
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class novedadalumnoparcialActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->novedadalumnoparcial_list = Doctrine::getTable('novedadalumnoparcial')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->novedadalumnoparcial = Doctrine::getTable('novedadalumnoparcial')->find(array($request->getParameter('codigo_novedad_curso_materia_horario')));
    $this->forward404Unless($this->novedadalumnoparcial);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new novedadalumnoparcialForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new novedadalumnoparcialForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($novedadalumnoparcial = Doctrine::getTable('novedadalumnoparcial')->find(array($request->getParameter('codigo_novedad_curso_materia_horario'))), sprintf('Object novedadalumnoparcial does not exist (%s).', $request->getParameter('codigo_novedad_curso_materia_horario')));
    $this->form = new novedadalumnoparcialForm($novedadalumnoparcial);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($novedadalumnoparcial = Doctrine::getTable('novedadalumnoparcial')->find(array($request->getParameter('codigo_novedad_curso_materia_horario'))), sprintf('Object novedadalumnoparcial does not exist (%s).', $request->getParameter('codigo_novedad_curso_materia_horario')));
    $this->form = new novedadalumnoparcialForm($novedadalumnoparcial);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($novedadalumnoparcial = Doctrine::getTable('novedadalumnoparcial')->find(array($request->getParameter('codigo_novedad_curso_materia_horario'))), sprintf('Object novedadalumnoparcial does not exist (%s).', $request->getParameter('codigo_novedad_curso_materia_horario')));
    $novedadalumnoparcial->delete();

    $this->redirect('novedadalumnoparcial/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $novedadalumnoparcial = $form->save();

      $this->redirect('novedadalumnoparcial/edit?codigo_novedad_curso_materia_horario='.$novedadalumnoparcial->getCodigoNovedadCursoMateriaHorario());
    }
  }
}
