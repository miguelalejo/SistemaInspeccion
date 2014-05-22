<?php

/**
 * novedadcursomateriahorario form base class.
 *
 * @package    form
 * @subpackage novedadcursomateriahorario
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasenovedadcursomateriahorarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'CodigoNovedadCursoMateriaHorario' => new sfWidgetFormInputHidden(),
      'CodigoNovedad'                    => new sfWidgetFormDoctrineChoice(array('model' => 'novedad', 'add_empty' => false)),
      'CodigoCursoMateriaHorario'        => new sfWidgetFormDoctrineChoice(array('model' => 'cursomateriahorario', 'add_empty' => false)),
      'CodigoTipoNovedad'                => new sfWidgetFormDoctrineChoice(array('model' => 'tiponovedad', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'CodigoNovedadCursoMateriaHorario' => new sfValidatorDoctrineChoice(array('model' => 'novedadcursomateriahorario', 'column' => 'codigonovedadcursomateriahorario', 'required' => false)),
      'CodigoNovedad'                    => new sfValidatorDoctrineChoice(array('model' => 'novedad')),
      'CodigoCursoMateriaHorario'        => new sfValidatorDoctrineChoice(array('model' => 'cursomateriahorario')),
      'CodigoTipoNovedad'                => new sfValidatorDoctrineChoice(array('model' => 'tiponovedad')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'novedadcursomateriahorario', 'column' => array('codigonovedad', 'codigocursomateriahorario', 'codigotiponovedad')))
    );

    $this->widgetSchema->setNameFormat('novedadcursomateriahorario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'novedadcursomateriahorario';
  }

}
