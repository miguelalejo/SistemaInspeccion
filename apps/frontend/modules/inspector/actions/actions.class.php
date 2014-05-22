<?php

/**
 * inspector actions.
 *
 * @package    sistemacnpintag
 * @subpackage inspector
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class inspectorActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  	$this->error='';
	$this->inspector = new inspector();			
	$this->pager = new sfDoctrinePager('inspector',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->inspector->getActiveInspectoresQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
  	$this->error='';
    $this->inspector = Doctrine::getTable('inspector')->find(array($request->getParameter('codigo_inspector')));
    $this->forward404Unless($this->inspector);
  }
  
  public function executePaginar(sfWebRequest $request)
  {	
	$this->error='';
	$this->inspector = new inspector();			
	$this->pager = new sfDoctrinePager('inspector',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->inspector->getActiveInspectoresQuery());
	$this->pager->setPage($request->getParameter('page', $request->getParameter('page')));
	$this->pager->init();	
  }

  public function executeNew(sfWebRequest $request)
  {
  	$this->error='';
    $this->form = new inspectorForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
  	$this->error='';
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new inspectorForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
  	$this->error='';
    $this->forward404Unless($inspector = Doctrine::getTable('inspector')->find(array($request->getParameter('codigo_inspector'))), sprintf('Object inspector does not exist (%s).', $request->getParameter('codigo_inspector')));
    $this->rutaImagenInspector=sfConfig::get('sf_upload_dir_name').'/uploads/inspectores/'.$inspector->getImagen();
	$this->form = new inspectorForm($inspector);
  }

  public function executeUpdate(sfWebRequest $request)
  {
  	$this->error='';
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($inspector = Doctrine::getTable('inspector')->find(array($request->getParameter('codigo_inspector'))), sprintf('Object inspector does not exist (%s).', $request->getParameter('codigo_inspector')));
    $this->rutaImagenInspector=sfConfig::get('sf_upload_dir_name').'/uploads/inspectores/'.$inspector->getImagen();
	$this->form = new inspectorForm($inspector);
	$this->processForm($request, $this->form);	
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
  	$this->error='';
    $request->checkCSRFProtection();

    $this->forward404Unless($inspector = Doctrine::getTable('inspector')->find(array($request->getParameter('codigo_inspector'))), sprintf('Object inspector does not exist (%s).', $request->getParameter('codigo_inspector')));
    $inspector->delete();

    $this->redirect('inspector/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
  	$this->error='';
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
		if($this->validarCI($request->getParameter('inspector[Cedula]')))
		{
		  $this->coleccioninspector = Doctrine::getTable('inspector')
		  ->createQuery('i')
		  ->where('i.cedula = ? ',$request->getParameter('inspector[Cedula]')) 
		  ->execute(); 	
		  $arreglo = $this->coleccioninspector->toArray();	  
		  if (empty($arreglo))
		  {
			  $inspector = $form->save();
			  $this->redirect('inspector/edit?codigo_inspector='.$inspector->getCodigoInspector());
		  }
		  else
		  {
			  if ($request->isMethod('post'))
			  {		
					$this->error = 'La cedula del inspector, ya esta registrada';		
			  }
			  else
			  {
				$codigoinspector = $request->getParameter('inspector[CodigoInspector]');
				if($codigoinspector == $this->coleccioninspector[0]['CodigoInspector'])
				{
					$inspector = $form->save();
					$this->redirect('inspector/edit?codigo_inspector='.$inspector->getCodigoInspector());
				}
				else
				{
					$this->error = 'La cedula del inspector, ya esta registrada';			
				}	
			  }		
		  }
		}
		else{
			$this->error = 'Cedula del inspector, no valida';	
		}	
    }
  }
  public function validarCI($strCedula)
	{
	   $strCedula = str_replace("-", "",$strCedula);
	   $suma = 0;
	   $strOriginal = $strCedula;
	   $intProvincia = substr($strCedula,0,2);
	   $intTercero = $strCedula[2];
	   $intUltimo = $strCedula[9];
	   if (! settype($strCedula,"float")) return FALSE;
	   if ((int) $intProvincia < 1 || (int) $intProvincia > 23) return FALSE;
	   if ((int) $intTercero == 7 || (int) $intTercero == 8) return FALSE;
	   for($indice = 0; $indice < 9; $indice++) {
		 //echo $strOriginal[$indice],'</br>';
		 switch($indice) {
			case 0:
			case 2:
			case 4:
			case 6:
			case 8:
			   $arrProducto[$indice] = $strOriginal[$indice] * 2;
			   if ($arrProducto[$indice] >= 10) $arrProducto[$indice] -= 9;
			   //echo $arrProducto[$indice],'</br>';
			   break;
			case 1:
			case 3:
			case 5:
			case 7:
			   $arrProducto[$indice] = $strOriginal[$indice] * 1;
			   if ($arrProducto[$indice] >= 10) $arrProducto[$indice] -= 9;
			   //echo $arrProducto[$indice],'</br>';
			   break;
		 }
	   }
	   foreach($arrProducto as $indice => $producto) $suma += $producto;
	   $residuo = $suma % 10;
	   $intVerificador = $residuo==0 ? 0: 10 - $residuo;
	   return ($intVerificador == $intUltimo? TRUE: FALSE);
	}
}
