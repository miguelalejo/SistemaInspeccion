<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * novedadcursomateriahorario filter form base class.
 *
 * @package    filters
 * @subpackage novedadcursomateriahorario *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasenovedadcursomateriahorarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoNovedad'                    => new sfWidgetFormDoctrineChoice(array('model' => 'novedad', 'add_empty' => true)),
      'CodigoCursoMateriaHorario'        => new sfWidgetFormDoctrineChoice(array('model' => 'cursomateriahorario', 'add_empty' => true)),
      'CodigoTipoNovedad'                => new sfWidgetFormDoctrineChoice(array('model' => 'tiponovedad', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'CodigoNovedad'                    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'novedad', 'column' => 'CodigoNovedad')),
      'CodigoCursoMateriaHorario'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'cursomateriahorario', 'column' => 'CodigoCursoMateriaHorario')),
      'CodigoTipoNovedad'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'tiponovedad', 'column' => 'CodigoTipoNovedad')),
    ));

    $this->widgetSchema->setNameFormat('novedadcursomateriahorario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'novedadcursomateriahorario';
  }

  public function getFields()
  {
    return array(
      'CodigoNovedadCursoMateriaHorario' => 'Number',
      'CodigoNovedad'                    => 'ForeignKey',
      'CodigoCursoMateriaHorario'        => 'ForeignKey',
      'CodigoTipoNovedad'                => 'ForeignKey',
    );
  }
}