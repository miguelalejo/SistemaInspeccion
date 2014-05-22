<?php

/**
 * novedad form base class.
 *
 * @package    form
 * @subpackage novedad
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasenovedadForm extends BaseFormDoctrine
{
  public function setup()
  {	
	$fechaActual = date('Y-m-d');
	$parcial = Doctrine_Query::create()
        ->select('parcial')
        ->from('parcial pa')
		->leftJoin('periodoescolar pe')
		->where('pe.fechainicio <= ? and pe.fechafin >= ? and pe.codigoperiodoescolar = pa.codigoperiodoescolar', array($fechaActual,$fechaActual)); 
	$curYear = date('Y');
	$max_rango_anios=sfConfig::get('app_max_rango_anios');
    $years = range($curYear-$max_rango_anios,$curYear );	
	
	$this->setWidgets(array(
      'CodigoNovedad'   => new sfWidgetFormInputHidden(),
      'CodigoAlumno'    => new sfWidgetFormDoctrineChoice(array('model' => 'alumno', 'add_empty' => false)),
	  'CedulaAlumno'	=> new sfWidgetFormInput(),
      'CodigoInspector' => new sfWidgetFormDoctrineChoice(array('model' => 'inspector', 'add_empty' => false)),
      'CodigoParcial'   => new sfWidgetFormDoctrineChoice(array('model' => 'parcial','query' => $parcial, 'add_empty' => false)),
      'Fugas'           => new sfWidgetFormInput(),
	  'FugasHorario'    => new sfWidgetFormDoctrineChoice(array('model' => 'horario', 'add_empty' => false,'multiple' => true)),
      'Atrasos'         => new sfWidgetFormInput(),
	  'AtrasosHorario'  => new sfWidgetFormDoctrineChoice(array('model' => 'horario', 'add_empty' => false,'multiple' => true)),
      'Indisciplinas'   => new sfWidgetFormInput(),
      'Fecha'           => new sfWidgetFormI18nDateDefault(array('years' => array_combine($years, $years),'format' => '%day%/%month%/%year%','culture' => 'es')),
      'Descripcion'     => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'CodigoNovedad'   => new sfValidatorDoctrineChoice(array('model' => 'novedad', 'column' => 'codigonovedad', 'required' => false)),
      'CodigoAlumno'    => new sfValidatorDoctrineChoice(array('model' => 'alumno')),
      'CodigoInspector' => new sfValidatorDoctrineChoice(array('model' => 'inspector')),
      'CodigoParcial'   => new sfValidatorDoctrineChoice(array('model' => 'parcial')),
      'Fugas'           => new sfValidatorInteger(),
      'Atrasos'         => new sfValidatorInteger(),
      'Indisciplinas'   => new sfValidatorInteger(),
      'Fecha'           => new sfValidatorDate(),
      'Descripcion'     => new sfValidatorString(array('max_length' => 500, 'required' => false)),
    ));
	$this->widgetSchema['CedulaAlumno']->setAttribute('id', 'textbox');
	$this->widgetSchema['CodigoAlumno']->setAttribute('id', 'select');
    $this->widgetSchema->setNameFormat('novedad[%s]');	
	$codigoNovedad  = $this->getObject()->getCodigoNovedad();
	if(!empty($codigoNovedad))
	{
		$codigoTipoNovedadFuga = $this->getCodigoTipoNovedad("Fuga");
		$codigoTipoNovedadAtraso = $this->getCodigoTipoNovedad("Atraso");		
		$listaCodigoHorariosFugas = $this->getListaCodigosHorario($this->getListaHorarioPorNovedadYTipoNovedad($codigoNovedad,$codigoTipoNovedadFuga));
		$listaCodigoHorariosAtrasos = $this->getListaCodigosHorario($this->getListaHorarioPorNovedadYTipoNovedad($codigoNovedad,$codigoTipoNovedadAtraso));
		$this->widgetSchema['FugasHorario']->setDefault($listaCodigoHorariosFugas);
		$this->widgetSchema['AtrasosHorario']->setDefault($listaCodigoHorariosAtrasos);
	}
	else
	{
		$this->widgetSchema['Fugas']->setAttribute('value', 0);
		$this->widgetSchema['Atrasos']->setAttribute('value', 0);
		$this->widgetSchema['Indisciplinas']->setAttribute('value', 0);
	}
	$this->widgetSchema['CodigoAlumno']->setAttribute('class', 'form-control');			
	$this->widgetSchema['CodigoAlumno']->setAttribute('required', 'required');
	$this->widgetSchema['CodigoAlumno']->setAttribute('style',"width:auto");	
	$this->widgetSchema['CedulaAlumno']->setAttribute('name', 'textbox');
	$this->widgetSchema['CedulaAlumno']->setAttribute('class', 'form-control');
	$this->widgetSchema['CedulaAlumno']->setAttribute('style',"width:auto");	
	$this->widgetSchema['CedulaAlumno']->setAttribute('placeholder','C&eacute;dula Alumno');
	$this->widgetSchema['CodigoInspector']->setAttribute('class', 'form-control');	
	$this->widgetSchema['CodigoInspector']->setAttribute('required', 'required');
	$this->widgetSchema['CodigoInspector']->setAttribute('style',"width:auto");
	$this->widgetSchema['CodigoParcial']->setAttribute('class', 'form-control');	
	$this->widgetSchema['CodigoParcial']->setAttribute('required', 'required');
	$this->widgetSchema['CodigoParcial']->setAttribute('style',"width:auto");	
	$this->widgetSchema['Fugas']->setAttribute('class', 'inputfugas form-control');
	$this->widgetSchema['Fugas']->setAttribute('readonly', 'readonly');	
	$this->widgetSchema['Fugas']->setAttribute('style',"width:auto");
	$this->widgetSchema['Atrasos']->setAttribute('class', 'inputatrasos form-control');
	$this->widgetSchema['Atrasos']->setAttribute('readonly', 'readonly');	
	$this->widgetSchema['Atrasos']->setAttribute('style',"width:auto");
	$this->widgetSchema['Indisciplinas']->setAttribute('class', 'numero form-control');
	$this->widgetSchema['Indisciplinas']->setAttribute('style',"width:auto");	
	$this->widgetSchema['FugasHorario']->setAttribute('name', 'selectfugas');
	$this->widgetSchema['FugasHorario']->setAttribute('class', 'selectfugas form-control');
	$this->widgetSchema['FugasHorario']->setAttribute('onchange','contarFugas()');	
	$this->widgetSchema['FugasHorario']->setAttribute('style',"width:auto");
	$this->widgetSchema['AtrasosHorario']->setAttribute('name', 'selectatrasos');
	$this->widgetSchema['AtrasosHorario']->setAttribute('class', 'selectatrasos  form-control');
	$this->widgetSchema['AtrasosHorario']->setAttribute('onchange','contarAtrasos()');		
	$this->widgetSchema['AtrasosHorario']->setAttribute('style',"width:auto");
	$this->widgetSchema['Descripcion']->setAttribute('class', 'form-control');
	$this->widgetSchema['Descripcion']->setAttribute('style','width:auto');	
	$this->widgetSchema['Descripcion']->setAttribute('placeholder','Descripci&oacute;n');
	
	$this->widgetSchema->setLabels(array(
	'CodigoNovedad' => ' ',
	'CodigoAlumno'    => 'Alumno:',
	'CedulaAlumno'    => 'C&eacute;dula:',
	'CodigoInspector'    => 'Inspector:',						
	'CodigoParcial'    => 'Parcial:',
	'Fugas' => 'Fugas:',
	'FugasHorario'  => 'Horario:',
	'Atrasos' => 'Atrasos:',
	'AtrasosHorario'  => 'Horario:',
	'Indisciplinas' => 'Indisciplinas:',	
	'Fecha'    => 'Fecha:',
	'Descripcion'    => 'Descripci&oacute;n:',	
	));
	
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'novedad';
  }
  public function getCodigoTipoNovedad($tipoNovedad)
  {
	$coleccionTipoNovedad = Doctrine::getTable('tiponovedad')
		->createQuery('n')
		->where('n.novedad like ? ',$tipoNovedad."%") 
		->execute(); 
	return $coleccionTipoNovedad[0]['CodigoTipoNovedad'];
  }
  public function getListaHorarioPorNovedadYTipoNovedad($codigonovedad,$codigoTipoNovedad)
  {
	$listaHorariosFugas = Doctrine_Query::create()
        ->select('c.codigohorario')
        ->from('cursomateriahorario c')
		->leftJoin('novedadcursomateriahorario n')
		->where('n.codigonovedad = ? and n.codigotiponovedad = ? and c.codigocursomateriahorario = n.codigocursomateriahorario', array($codigonovedad,$codigoTipoNovedad))
		->execute(); 
	return $listaHorariosFugas;
  }
  public function getListaCodigosHorario($listaHorariosFugas)
  {
	$listaCodigosHorariosFugas = array();
	foreach($listaHorariosFugas as $indice => $horarioFugas) {             		 
			array_push($listaCodigosHorariosFugas, $horarioFugas['CodigoHorario']);			 
    }	
	return $listaCodigosHorariosFugas;
  }
 
}
