<?php

/**
 * novedadesAlumno actions.
 *
 * @package    sistemacnpintag
 * @subpackage novedadesAlumno
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class novedadesCursoActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
	$this->form=new enumbusquedaalumnoForm(); 
    $this->error='';
	$this->alumno = new alumno();			
	$this->pager = new sfDoctrinePager('alumno',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->alumno->getActiveAlumnosQuery());
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();	 		  
  }
  
  public function executeSearch(sfWebRequest $request)
  {  
	$this->form=new enumbusquedaalumnoForm();
	$this->error='';	
	$this->alumno = new alumno();			
	$this->pager = new sfDoctrinePager('alumno',sfConfig::get('app_max_resultados_por_pagina'));	
    $comodin = "%";
	$tipobusqueda = $request->getParameter('tipobusqueda');
    $parametrobusqueda = rtrim($request->getParameter('parametroBusqueda')).$comodin;	
	$this->parametro = "&parametroBusqueda=".rtrim($request->getParameter('parametroBusqueda'))."&tipobusqueda=".$tipobusqueda;
	if ($tipobusqueda == 'c') {	  
	  $this->pager->setQuery($this->crearQueryAlumnoPorCedula($parametrobusqueda));
	}
	if ($tipobusqueda == 'n') {
	  $this->pager->setQuery($this->crearQueryAlumnoPorNombre($parametrobusqueda));     
	}
	if ($tipobusqueda == 'a') {
      $this->pager->setQuery($this->crearQueryAlumnoPorApellido($parametrobusqueda));
	}
	$this->pager->setPage($request->getParameter('page', 1));
	$this->pager->init();
  }
  public function executePaginar(sfWebRequest $request)
  {	
	$this->form=new enumbusquedaalumnoForm(); 
    $this->error='';
	$this->alumno = new alumno();			
	$this->pager = new sfDoctrinePager('alumno',sfConfig::get('app_max_resultados_por_pagina'));
	$this->pager->setQuery($this->alumno->getActiveAlumnosQuery());	
	$this->pager->setPage($request->getParameter('page', $request->getParameter('page')));
	$this->pager->init();	
  }
  public function executePaginarSearch(sfWebRequest $request)
  {	
	$this->form=new enumbusquedaalumnoForm();
	$this->error='';	
	$this->alumno = new alumno();			
	$this->pager = new sfDoctrinePager('alumno',sfConfig::get('app_max_resultados_por_pagina'));	
    $comodin = "%";
	$parametrobusqueda = rtrim($request->getParameter('parametroBusqueda')).$comodin;
	$tipobusqueda = $request->getParameter('tipobusqueda');	
	$this->parametro = "&parametroBusqueda=".rtrim($request->getParameter('parametroBusqueda'))."&tipobusqueda=".$tipobusqueda;
	if ($tipobusqueda == 'c') {	 
	  $this->pager->setQuery($this->crearQueryAlumnoPorCedula($parametrobusqueda));
	}
	if ($tipobusqueda == 'n') {
	  $this->pager->setQuery($this->crearQueryAlumnoPorNombre($parametrobusqueda));     
	}
	if ($tipobusqueda == 'a') {
      $this->pager->setQuery($this->crearQueryAlumnoPorApellido($parametrobusqueda));
	}
	$this->pager->setPage($request->getParameter('page', $request->getParameter('page')));
	$this->pager->init();	
  }
  private function crearQueryAlumnoPorCedula($parametrobusqueda)
  {
	return Doctrine::getTable('alumno')
      ->createQuery('a')
	  ->where('a.cedula like ?',array($parametrobusqueda))
	  ->orderBy('a.apellido,a.nombre');	  	  
  }
  private function crearQueryAlumnoPorNombre($parametrobusqueda)
  {
	return Doctrine::getTable('alumno')
      ->createQuery('a')
	  ->where('a.nombre like ?',array($parametrobusqueda))
	  ->orderBy('a.apellido,a.nombre');
  }
  private function crearQueryAlumnoPorApellido($parametrobusqueda)
  {
	return Doctrine::getTable('alumno')
      ->createQuery('a')
	  ->where('a.apellido like ?',array($parametrobusqueda)) 
	  ->orderBy('a.apellido,a.nombre');
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->alumno = Doctrine::getTable('alumno')->find(array($request->getParameter('codigo_alumno')));
	$this->listaCursosAlumno = $this->crearQueryCursosAlumno($this->alumno);
	$this->listaPeriodosAlumno = $this->crearQueryPeriodosAlumno($this->alumno);	
    $this->forward404Unless($this->alumno);
  }
  
  public function executeSeleccionarCursoAlumno(sfWebRequest $request)
  { 
	$this->listaPeriodosEscolares = $this->crearQueryPeriodosEscolares($request->getParameter('codigoPeriodo'));        	
	$listaJSONPeriodos ='';
	$formatosalida = '[%s]';
	foreach($this->listaPeriodosEscolares as $periodoEscolar)	
	{
		$this->listaParciales = $this->crearQueryParcialesPorPeriodoEscolar($periodoEscolar);
		$listaJSONParciales='';		
		foreach($this->listaParciales as $parcial)	
		{
			$formato = '{"codigoparcial":%d,"parcial":"%s"},';
			$cadenaParcial = sprintf($formato, $parcial->getCodigoParcial(), $parcial->getParcial());
			$listaJSONParciales .=  $cadenaParcial;
		}
		$listaJSONParciales =sprintf($formatosalida, trim($listaJSONParciales, ","));
		$formato = '{"codigoperiodoescolar":%d,"periodoescolar":"%s"}';
		$cadenaPerido = sprintf($formato, $periodoEscolar->getCodigoPeriodoEscolar(), $periodoEscolar->getPeriodoEscolar());
		$formatoPeriodosYParciales = '{ "Periodo": {"ListaParciales": %s, "PeriodoEscolar": %s} },';
		$cadenaListaPeridos =sprintf($formatoPeriodosYParciales, $listaJSONParciales, $cadenaPerido);
		$listaJSONPeriodos .=  $cadenaListaPeridos;		
	}	
	$listaJSONPeriodos =sprintf($formatosalida, trim($listaJSONPeriodos, ","));
    $this->getResponse()->setHttpHeader("X-JSON", $listaJSONPeriodos);
    return sfView::HEADER_ONLY;	
  }
  
  
  public function executeReport(sfWebRequest $request)
  {
	$codigoAlumno = $request->getParameter('codigoAlumno');
	$codigoParcial = $request->getParameter('codigoParcial');
	$codigoPeriodo = $request->getParameter('codigoPeriodo');
	$listaCursos= $this->crearQueryCursoPorAlumnoPeriodo($codigoAlumno,$codigoPeriodo);	
	$this->alumno = $this->crearQueryAlumnoPorCodigo($codigoAlumno);
	$this->cursoAlumno = $listaCursos[0];
	$this->parcial = $this->crearQueryParcialPorCodigo($codigoParcial);
	$this->periodo = $this->crearQueryPeriodoPorCodigo($codigoPeriodo);	
	$this->totalFaltasJustificadasAlumno = $this->crearQueryTotalFaltasAlumnoPorTipoFalta($codigoAlumno,$codigoParcial,"Justificada");
	$this->totalFaltasInjustificadasAlumno = $this->crearQueryTotalFaltasAlumnoPorTipoFalta($codigoAlumno,$codigoParcial,"Injustificada"); 
	$this->totalFugasAlumno = $this->crearQueryTotalNovedadesAlumnoPorTipoFalta($codigoAlumno,$codigoParcial,"Fuga%");
	$this->totalAtrasosAlumno = $this->crearQueryTotalNovedadesAlumnoPorTipoFalta($codigoAlumno,$codigoParcial,"Atraso%");
	$this->totalIndisciplinasAlumno = $this->crearQueryTotalIndisciplinasAlumno($codigoAlumno,$codigoParcial);
	$this->puntosFaltasInjustificadas=$this->calcularPuntosFaltasInjustificadas($this->totalFaltasInjustificadasAlumno[0]['total']);
	$this->puntosFugas=$this->calcularPuntosFugas($this->totalFugasAlumno[0]['total']);
	$this->puntosAtrasos=$this->calcularPuntosAtrasos($this->totalAtrasosAlumno[0]['total']);
	$this->puntosIndisciplinas = $this->totalIndisciplinasAlumno[0]['total'];
	$puntajeParcial= $this->puntosFaltasInjustificadas + $this->puntosFugas+$this->puntosAtrasos+$this->puntosIndisciplinas;
	if($puntajeParcial>=20)
	{
		$this->notaParcial=0;
	}
	else
	{
		$this->notaParcial=20 -	$puntajeParcial;
	}
	$this->listaFaltasAlumno = $this->crearQueryListaFaltasAlumno($codigoAlumno,$codigoParcial);
	$this->listaFugasAlumno = $this->crearQueryListaNovedadesAlumnoPorTipo($codigoAlumno,$codigoParcial,"Fuga%");
	$this->listaAtrasosAlumno = $this->crearQueryListaNovedadesAlumnoPorTipo($codigoAlumno,$codigoParcial,"Atraso%") ;	
	$this->cadenaTotalNotaDisciplina="NOTA FINAL DISCIPLINA : 20 - ".$puntajeParcial." = ".$this->notaParcial;
  }
  
 
  public function executeReportePdf(sfWebRequest $request)
  {
    $config = sfTCPDFPluginConfigHandler::loadConfig();    
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'ISO-8859-1', false);
	$pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Colegio Nacional Pintag');
    $pdf->SetTitle('Resumen Inspeccion');
    $pdf->SetSubject('Novedades Alumno');
    $pdf->SetKeywords('Novedad,Alumno');
	$pdf->SetFont('helvetica', '', 11, '', true);
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'COLEGIO NACIONAL PINTAG', 'RESUMEN NOTAS DISCIPLINA');
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    $pdf->setFontSubsetting(true);    
    $pdf->AddPage();
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));		
	$codigoAlumno = $request->getParameter('codigoAlumno');
	$codigoParcial = $request->getParameter('codigoParcial');
	$codigoPeriodo = $request->getParameter('codigoPeriodo');	
	$listaCursos= $this->crearQueryCursoPorAlumnoPeriodo($codigoAlumno,$codigoPeriodo);	
	$listaParalelos = $this->crearQueryParaleloPorAlumnoPeriodo($codigoAlumno,$codigoPeriodo);	
	$this->alumno = $this->crearQueryAlumnoPorCodigo($codigoAlumno);
	$this->cursoAlumno = $listaCursos[0];	
	$this->paraleloAlumno = $listaParalelos[0];	
	$this->parcial = $this->crearQueryParcialPorCodigo($codigoParcial);	
	$this->periodoEscolar = $this->crearQueryPeriodoEscolarPorCodigo($this->parcial->getCodigoPeriodoEscolar());
	$this->periodo = $this->crearQueryPeriodoPorCodigo($this->periodoEscolar->getCodigoPeriodo());	
	$this->totalFaltasJustificadasAlumno = $this->crearQueryTotalFaltasAlumnoPorTipoFalta($codigoAlumno,$codigoParcial,"Justificada");
	$this->totalFaltasInjustificadasAlumno = $this->crearQueryTotalFaltasAlumnoPorTipoFalta($codigoAlumno,$codigoParcial,"Injustificada"); 
	$this->totalFugasAlumno = $this->crearQueryTotalNovedadesAlumnoPorTipoFalta($codigoAlumno,$codigoParcial,"Fuga%");
	$this->totalAtrasosAlumno = $this->crearQueryTotalNovedadesAlumnoPorTipoFalta($codigoAlumno,$codigoParcial,"Atraso%");
	$this->totalIndisciplinasAlumno = $this->crearQueryTotalIndisciplinasAlumno($codigoAlumno,$codigoParcial);
	$this->puntosFaltasInjustificadas=$this->calcularPuntosFaltasInjustificadas($this->totalFaltasInjustificadasAlumno[0]['total']);
	$this->puntosFugas=$this->calcularPuntosFugas($this->totalFugasAlumno[0]['total']);
	$this->puntosAtrasos=$this->calcularPuntosAtrasos($this->totalAtrasosAlumno[0]['total']);
	$this->puntosIndisciplinas = $this->totalIndisciplinasAlumno[0]['total'];
	$puntajeParcial= $this->puntosFaltasInjustificadas + $this->puntosFugas+$this->puntosAtrasos+$this->puntosIndisciplinas;
	if($puntajeParcial>=20)
	{
		$this->notaParcial=0;
	}
	else
	{
		$this->notaParcial=20 -	$puntajeParcial;
	}
	$this->listaFaltasAlumno = $this->crearQueryListaFaltasAlumno($codigoAlumno,$codigoParcial);
	$this->listaFugasAlumno = $this->crearQueryListaNovedadesAlumnoPorTipo($codigoAlumno,$codigoParcial,"Fuga%");
	$this->listaAtrasosAlumno = $this->crearQueryListaNovedadesAlumnoPorTipo($codigoAlumno,$codigoParcial,"Atraso%");		
	$pdf->SetFillColor(221,238,255);
	$nombreAlumno=$this->alumno->getNombre()." ".$this->alumno->getApellido();
	$cedula=$this->alumno->getCedula();
	$cursoAlumno=$this->cursoAlumno->getCurso()." ".$this->paraleloAlumno->getParalelo();	
	$cadenaPeriodo = $this->periodo->getPeriodo();
	$cadenaPeridoEscolarParcial=$this->periodoEscolar->getPeriodoEscolar()." - ".$this->parcial->getParcial();	
	$html = "<h1>REPORTE DE NOTAS DE DISCIPLINA</h1>".
	sprintf("<h3>Alumno: %s</h3>",$this->convertirCarcteresEspeciales($nombreAlumno)).
	sprintf("<h3>C&eacute;dula: %s</h3>",$this->convertirCarcteresEspeciales($cedula)).
	sprintf("<h3>Curso: %s</h3>",$this->convertirCarcteresEspeciales($cursoAlumno)).
	sprintf("<h3>Periodo: %s</h3>",$this->convertirCarcteresEspeciales($cadenaPeriodo)).
	sprintf("<h3>Parcial: %s</h3>",$this->convertirCarcteresEspeciales($cadenaPeridoEscolarParcial));
	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);	
	$listaTitulosResumen=array('Faltas Justificadas','Faltas Injustificadas','Fugas','Atrasos','Indisciplinas');
	$listaTotalesResumen=array($this->totalFaltasJustificadasAlumno,$this->totalFaltasInjustificadasAlumno,$this->totalFugasAlumno,$this->totalAtrasosAlumno,$this->totalIndisciplinasAlumno);
	$listaPuntosResumen=array(0,$this->puntosFaltasInjustificadas,$this->puntosFugas,$this->puntosAtrasos,$this->puntosIndisciplinas);
	$tamanioPagina = $this->getTamanioPagina($pdf);
	$tamanioCelda=$tamanioPagina/3;
	$pdf->Ln(20);
	$this->imprimirResumenNovedadesFaltasAlumno($pdf,$tamanioCelda,$listaTitulosResumen,$listaTotalesResumen,$listaPuntosResumen);
	$pdf->Ln(20);
	$this->cadenaTotalNotaDisciplina="NOTA FINAL DISCIPLINA : 20 - ".$puntajeParcial." = ".$this->notaParcial;
	$this->imprimirCeldaTotales($pdf,$this->cadenaTotalNotaDisciplina);
	$listaTiposNovedad = array('Faltas', 'Fugas', 'Atrasos');
	$listaTamanioColumnasTiposNovedad = array(3, 5, 5);
	$tipoFila=0;	
	foreach($listaTiposNovedad as $tiponovedad) {
	    $tamanioColumna=$listaTamanioColumnasTiposNovedad[$tipoFila];
		$pdf->AddPage();
		$pdf->SetFont('helvetica', '', 16, '', true);
		$pdf->Cell(0, 10, $this->convertirCarcteresEspeciales($tiponovedad), 1, 1, 'C', true, '', 0, false, 'T', 'M');
		$tamanioPagina = $this->getTamanioPagina($pdf);
		$tamanioCelda=$tamanioPagina/$tamanioColumna;
		$this->imprimirCeldaTitulo($pdf,$tamanioCelda,'Fecha');
		$this->imprimirCeldaTitulo($pdf,$tamanioCelda,'Inspector');
		$this->imprimirCeldaTitulo($pdf,$tamanioCelda,'Tipo');		
		if($tiponovedad<>'Faltas')
		{	
			$this->imprimirCeldaTitulo($pdf,$tamanioCelda,'Materia');
			$this->imprimirCeldaTitulo($pdf,$tamanioCelda,'Horario');						
		}
		$pdf->Ln();
		if($tiponovedad=='Faltas')
		{
			$this->imprimirListaFaltasAlumno($pdf,$tamanioCelda,$this->listaFaltasAlumno);
		}
		if($tiponovedad=='Fugas')
		{
			$this->imprimirListaNovedadesAlumno($pdf,$tamanioCelda,$this->listaFugasAlumno);	
		}
		if($tiponovedad=='Atrasos')
		{
			$this->imprimirListaNovedadesAlumno($pdf,$tamanioCelda,$this->listaAtrasosAlumno);
		}				
		$tipoFila++;		
	}
    $pdf->Output('notasAlumno.pdf', 'I');
    throw new sfStopException();
  }
  private function getTamanioPagina($pdf)
  {
	return $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;	
  }
  private function imprimirListaFaltasAlumno($pdf,$tamanioCelda,$listaFaltasAlumno)
  {
		$pdf->SetFont('helvetica', '', 11, '', true);
		foreach ($listaFaltasAlumno as $faltaAlumno) {						
			$nombreInspector = $faltaAlumno->getApellido()." ".$faltaAlumno->getNombre();
			$this->imprimirCelda($pdf,$tamanioCelda,$faltaAlumno->getFecha());
			$this->imprimirCelda($pdf,$tamanioCelda,$nombreInspector);
			$this->imprimirCelda($pdf,$tamanioCelda,$faltaAlumno->getFalta());
			$pdf->Ln();
		}
	}
 
 private function imprimirResumenNovedadesFaltasAlumno($pdf,$tamanioCelda,$listaTitulos,$listaTotales,$listaPuntos)
  {
		$pdf->SetFont('helvetica', '', 16, '', true);
		$this->imprimirCeldaTitulo($pdf,$tamanioCelda,'Tipo');
		$this->imprimirCeldaTitulo($pdf,$tamanioCelda,'Totales');
		$this->imprimirCeldaTitulo($pdf,$tamanioCelda,'Puntos');		
		$pdf->Ln();
		for($i=0; $i< count($listaTitulos); $i++) {						
			$this->imprimirCelda($pdf,$tamanioCelda,$listaTitulos[$i]);
			$this->imprimirCelda($pdf,$tamanioCelda,$listaTotales[$i][0]['total']);
			$this->imprimirCelda($pdf,$tamanioCelda,$listaPuntos[$i]);
			$pdf->Ln();
		}
  }
  private function imprimirListaNovedadesAlumno($pdf,$tamanioCelda,$listaNovedades)
  {
		$pdf->SetFont('helvetica', '', 11, '', true);
		foreach ($listaNovedades as $novedadAlumno) {						
			$nombreInspector = $novedadAlumno->getApellido()." ".$novedadAlumno->getNombre();
			$this->imprimirCelda($pdf,$tamanioCelda,$novedadAlumno->getFecha());
			$this->imprimirCelda($pdf,$tamanioCelda,$nombreInspector);
			$this->imprimirCelda($pdf,$tamanioCelda,$novedadAlumno->getNovedad());
			$this->imprimirCelda($pdf,$tamanioCelda,$novedadAlumno->getMateria());
			$this->imprimirCelda($pdf,$tamanioCelda,$novedadAlumno->getHorario());
			$pdf->Ln();
		}
  }
  private function imprimirCelda($pdf,$tamanioCelda,$cadena)
  {
	return $pdf->Cell($tamanioCelda, 11.25, $this->convertirCarcteresEspeciales($cadena), 1, 0, 'C', false, '', 1, false, 'T', 'M');
  }
  private function imprimirCeldaTotales($pdf,$cadena)
  {
	return $pdf->Cell(0, 0, $this->convertirCarcteresEspeciales($cadena) , 0, 1, 'C', false, '', 0, false, 'T', 'M');
  }
  private function imprimirCeldaTitulo($pdf,$tamanioCelda,$cadena)
  {
	return $pdf->Cell($tamanioCelda, 11.25, $this->convertirCarcteresEspeciales($cadena), 1, 0, 'C', true, '', 0, false, 'T', 'M');
  }
  private function convertirCarcteresEspeciales($cadena)
  {
	return iconv('UTF-8', 'windows-1252',$cadena);
  }
  private function crearQueryAlumnoPorCodigo($codigoAlumno)
  {
	return Doctrine::getTable('alumno')->find(array($codigoAlumno));
  }  
   private function crearQueryCursoPorCodigo($codigoCurso)
  {
	return Doctrine::getTable('curso')->find(array($codigoCurso));
  }
 
  private function crearQueryParcialPorCodigo($codigoParcial)
  {
	return Doctrine::getTable('parcial')->find(array($codigoParcial));
  }
  private function crearQueryPeriodoEscolarPorCodigo($codigoPeriodoEscolar)
  {
	return Doctrine::getTable('periodoescolar')->find(array($codigoPeriodoEscolar));
  }
  private function crearQueryPeriodoPorCodigo($codigoPeriodo)
  {
	return Doctrine::getTable('periodo')->find(array($codigoPeriodo));
  }
   private function crearQueryCursoPorAlumnoPeriodo($codigoAlumno,$codigoPeriodo)
  {
	 return Doctrine_Query::create()
        ->select('c.*')
        ->from('curso c')		
        ->leftJoin('cursoalumno ca')
	    ->where('ca.codigocurso = c.codigocurso and ca.codigoalumno = ? and ca.codigoperiodo = ?',array($codigoAlumno,$codigoPeriodo)) 
        ->execute();
  }
   private function crearQueryParaleloPorAlumnoPeriodo($codigoAlumno,$codigoPeriodo)
  {
	 return Doctrine_Query::create()
        ->select('p.*')
        ->from('paralelo p')		
        ->leftJoin('cursoalumno ca')
	    ->where('ca.codigoparalelo = p.codigoparalelo and ca.codigoalumno = ? and ca.codigoperiodo = ?',array($codigoAlumno,$codigoPeriodo)) 
        ->execute();
  }
  
  private function crearQueryCursosAlumno($alumno)
  {
  	return Doctrine_Query::create()
        ->select('c.*')
        ->from('curso c')		
        ->leftJoin('cursoalumno ca')
	    ->where('ca.codigocurso = c.codigocurso and ca.codigoalumno = ? ',$alumno->getCodigoAlumno()) 
        ->execute();
  }
  private function crearQueryPeriodosEscolaresAlumno($alumno)
  {
	return Doctrine_Query::create()
        ->select('pe.*')
        ->from('periodoescolar pe')
		->leftJoin('cursoalumno ca')
		->where('ca.codigoperiodo = pe.codigoperiodo and ca.codigoalumno = ? ',$alumno->getCodigoAlumno())
		->orderBy('pe.codigoperiodoescolar')
		->execute(); 
  }
  
  private function crearQueryPeriodosAlumno($alumno)
  {
	return Doctrine_Query::create()
        ->select('p.*')
        ->from('periodo p')
		->leftJoin('cursoalumno ca')
		->where('ca.codigoperiodo = p.codigoperiodo and ca.codigoalumno = ? ',$alumno->getCodigoAlumno())
		->orderBy('p.periodo desc')
		->execute(); 
  }
  
  private function crearQueryPeriodosEscolares($codigoPeriodo)
  {
	return Doctrine_Query::create()
        ->select('pe.*')
        ->from('periodoescolar pe')
		->leftJoin('periodo p')
		->where('p.codigoperiodo = pe.codigoperiodo and p.codigoperiodo = ?', $codigoPeriodo)
		->orderBy('pe.codigoperiodoescolar')
		->execute(); 
  }
  private function crearQueryParcialesPorPeriodoEscolar($periodoEscolar)
  {
	return Doctrine_Query::create()
        ->select('pa.*')
        ->from('parcial pa')
		->leftJoin('periodoescolar pe')
		->where('pa.codigoperiodoescolar = pe.codigoperiodoescolar and pe.codigoperiodoescolar = ?', $periodoEscolar->getCodigoPeriodoEscolar())
		->execute();
  }
  
  private function createQueryPeriodoPorCurso($curso)
	{
		return Doctrine_Query::create()
        ->select('p.*')
        ->from('periodo p')		
	    ->where('p.codigoperiodo = ? ',$curso->getCodigoPeriodo()) 
        ->execute();
	}	
	private function crearQueryTotalFaltasAlumnoPorTipoFalta($codigoAlumno,$codigoParcial,$tipoFalta)
	{
		return Doctrine_Query::create()
        ->select('count(1) as total')
        ->from('faltaalumnoparcial f')		
	    ->where('f.codigoalumno = ? and f.codigoparcial = ? and f.falta like ?',array($codigoAlumno,$codigoParcial,$tipoFalta)) 
		->execute();	
	}
	
	private function crearQueryTotalNovedadesAlumnoPorTipoFalta($codigoAlumno,$codigoParcial,$tipoFalta)
	{
		return Doctrine_Query::create()
			->select('count(1) as total')
			->from('novedadalumnoparcial n')		
			->where('n.codigoalumno = ? and n.codigoparcial = ? and n.novedad like ?',array($codigoAlumno,$codigoParcial,$tipoFalta)) 
			->execute();
		
	}
	private function crearQueryTotalIndisciplinasAlumno($codigoAlumno,$codigoParcial)
	{
		return Doctrine_Query::create()
		->select('sum(indisciplinas) as total')
        ->from('novedad n')		
	    ->where('n.codigoalumno = ? and n.codigoparcial = ?',array($codigoAlumno,$codigoParcial)) 
        ->execute();
	}
	private function crearQueryListaFaltasAlumno($codigoAlumno,$codigoParcial)
	{
		return Doctrine_Query::create()
        ->select('f.*')
        ->from('faltaalumnoparcial f')		
	    ->where('f.codigoalumno = ? and f.codigoparcial = ?',array($codigoAlumno,$codigoParcial)) 
        ->execute();
	}

	private function crearQueryListaNovedadesAlumnoPorTipo($codigoAlumno,$codigoParcial,$tipoFalta)
	{
		return Doctrine_Query::create()
        ->select('n.*')
        ->from('novedadalumnoparcial n')		
	    ->where('n.codigoalumno = ? and n.codigoparcial = ? and n.novedad like ?',array($codigoAlumno,$codigoParcial,$tipoFalta)) 
        ->execute();
	}
  
  public function calcularPuntosFaltasInjustificadas($faltasJustificadas)
  {
	$totalFaltasJustificadas = $faltasJustificadas - $faltasJustificadas%2; 
	return $totalFaltasJustificadas/2;
  }
  public function calcularPuntosFugas($fugas)
  {	
	return $fugas*3;
  }
  public function calcularPuntosAtrasos($atrasos)
  {
	$totalAtrasos = $atrasos - $atrasos%3; 
	return $totalAtrasos/3;
  }
  
}
