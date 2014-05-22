<?php

/**
 * faltaalumnoparcial actions.
 *
 * @package    sistemacnpintag
 * @subpackage faltaalumnoparcial
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class faltaalumnoparcialActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->faltaalumnoparcial_list = Doctrine::getTable('faltaalumnoparcial')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->faltaalumnoparcial = Doctrine::getTable('faltaalumnoparcial')->find(array($request->getParameter('codigo_falta')));
    $this->forward404Unless($this->faltaalumnoparcial);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new faltaalumnoparcialForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new faltaalumnoparcialForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($faltaalumnoparcial = Doctrine::getTable('faltaalumnoparcial')->find(array($request->getParameter('codigo_falta'))), sprintf('Object faltaalumnoparcial does not exist (%s).', $request->getParameter('codigo_falta')));
    $this->form = new faltaalumnoparcialForm($faltaalumnoparcial);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($faltaalumnoparcial = Doctrine::getTable('faltaalumnoparcial')->find(array($request->getParameter('codigo_falta'))), sprintf('Object faltaalumnoparcial does not exist (%s).', $request->getParameter('codigo_falta')));
    $this->form = new faltaalumnoparcialForm($faltaalumnoparcial);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($faltaalumnoparcial = Doctrine::getTable('faltaalumnoparcial')->find(array($request->getParameter('codigo_falta'))), sprintf('Object faltaalumnoparcial does not exist (%s).', $request->getParameter('codigo_falta')));
    $faltaalumnoparcial->delete();

    $this->redirect('faltaalumnoparcial/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $faltaalumnoparcial = $form->save();

      $this->redirect('faltaalumnoparcial/edit?codigo_falta='.$faltaalumnoparcial->getCodigoFalta());
    }
  }
}
