<?php

/**
 * novedadcursomateriahorario actions.
 *
 * @package    sistemacnpintag
 * @subpackage novedadcursomateriahorario
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class novedadcursomateriahorarioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->novedadcursomateriahorario_list = Doctrine::getTable('novedadcursomateriahorario')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->novedadcursomateriahorario = Doctrine::getTable('novedadcursomateriahorario')->find(array($request->getParameter('codigo_novedad_curso_materia_horario')));
    $this->forward404Unless($this->novedadcursomateriahorario);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new novedadcursomateriahorarioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new novedadcursomateriahorarioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($novedadcursomateriahorario = Doctrine::getTable('novedadcursomateriahorario')->find(array($request->getParameter('codigo_novedad_curso_materia_horario'))), sprintf('Object novedadcursomateriahorario does not exist (%s).', $request->getParameter('codigo_novedad_curso_materia_horario')));
    $this->form = new novedadcursomateriahorarioForm($novedadcursomateriahorario);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($novedadcursomateriahorario = Doctrine::getTable('novedadcursomateriahorario')->find(array($request->getParameter('codigo_novedad_curso_materia_horario'))), sprintf('Object novedadcursomateriahorario does not exist (%s).', $request->getParameter('codigo_novedad_curso_materia_horario')));
    $this->form = new novedadcursomateriahorarioForm($novedadcursomateriahorario);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($novedadcursomateriahorario = Doctrine::getTable('novedadcursomateriahorario')->find(array($request->getParameter('codigo_novedad_curso_materia_horario'))), sprintf('Object novedadcursomateriahorario does not exist (%s).', $request->getParameter('codigo_novedad_curso_materia_horario')));
    $novedadcursomateriahorario->delete();

    $this->redirect('novedadcursomateriahorario/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $novedadcursomateriahorario = $form->save();

      $this->redirect('novedadcursomateriahorario/edit?codigo_novedad_curso_materia_horario='.$novedadcursomateriahorario->getCodigoNovedadCursoMateriaHorario());
    }
  }
}
