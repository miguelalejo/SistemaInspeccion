<?php

/**
 * alumno actions.
 *
 * @package    sistemacnpintag
 * @subpackage alumno
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class alumnoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->error='';
	$this->alumno = new alumno();			
	$this->pager = new sfDoctrinePager('alumno',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->alumno->getActiveAlumnosQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
	$this->error='';
    $this->alumno = Doctrine::getTable('alumno')->find(array($request->getParameter('codigo_alumno')));
    $this->forward404Unless($this->alumno);  
  }
  
  public function executePaginar(sfWebRequest $request)
  {	
	$this->error='';
	$this->alumno = new alumno();	
	$this->pager = new sfDoctrinePager('alumno',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->alumno->getActiveAlumnosQuery());
	$this->pager->setPage($request->getParameter('page', $request->getParameter('page')));
	$this->pager->init();	
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->error='';
    $this->form = new alumnoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new alumnoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {	
	$this->error='';
    $this->forward404Unless($alumno = Doctrine::getTable('alumno')->find(array($request->getParameter('codigo_alumno'))), sprintf('Object alumno does not exist (%s).', $request->getParameter('codigo_alumno')));
	$this->rutaImagenAlumno=sfConfig::get('sf_upload_dir_name').'/uploads/alumnos/'.$alumno->getImagen();   
    $this->form = new alumnoForm($alumno);
  }

  public function executeUpdate(sfWebRequest $request)
  {
	$this->error='';
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($alumno = Doctrine::getTable('alumno')->find(array($request->getParameter('codigo_alumno'))), sprintf('Object alumno does not exist (%s).', $request->getParameter('codigo_alumno')));
    $this->rutaImagenAlumno=sfConfig::get('sf_upload_dir_name').'/uploads/alumnos/'.$alumno->getImagen();
	$this->form = new alumnoForm($alumno);	
    $this->processForm($request, $this->form);
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
	$this->error='';
    $request->checkCSRFProtection();

    $this->forward404Unless($alumno = Doctrine::getTable('alumno')->find(array($request->getParameter('codigo_alumno'))), sprintf('Object alumno does not exist (%s).', $request->getParameter('codigo_alumno')));
    $alumno->delete();

    $this->redirect('alumno/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
	$this->error='';
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {		
		if($this->validarCI($request->getParameter('alumno[Cedula]')))
		{
			if($this->validarCI($request->getParameter('alumno[CedulaRepresentante]')))
			{
			  $this->coleccionalumno = Doctrine::getTable('alumno')->findByCedula($request->getParameter('alumno[Cedula]'));     	  
			  if (!empty($this->coleccionalumno) and $request->isMethod('post'))
			  {		
				$arreglo = $this->coleccionalumno->toArray();
				if (empty($arreglo))
				{
					$alumno = $form->save();
					$this->redirect('alumno/edit?codigo_alumno='.$alumno->getCodigoAlumno());	
				}	
				
				$this->error= 'La cedula del alumno, ya esta registrada';		
			  }
			  else
			  {
				$this->coleccionalumno = Doctrine::getTable('alumno')->findByCedula($request->getParameter('alumno[Cedula]')); 
				$arreglo = $this->coleccionalumno->toArray();
				if (empty($arreglo))
				{
					$alumno = $form->save();
						$this->redirect('alumno/edit?codigo_alumno='.$alumno->getCodigoAlumno());
				}
				else
				{
					$codigoAlumno = $request->getParameter('alumno[CodigoAlumno]');
					if($codigoAlumno == $this->coleccionalumno[0]['CodigoAlumno'])
					{
						$alumno = $form->save();
						$this->redirect('alumno/edit?codigo_alumno='.$alumno->getCodigoAlumno());	
					}
					else
					{
						$this->error = 'La cedula del alumno, ya esta registrada';		
					}	
				}		
			  }
			}
			else
			{
				$this->error = 'Cedula del representante, no valida';	
			}
		}
		else{
			$this->error = 'Cedula del alumno, no valida';	
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
