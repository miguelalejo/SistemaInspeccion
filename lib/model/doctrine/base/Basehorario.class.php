<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class Basehorario extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('horario');
        $this->hasColumn('CodigoHorario', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('Horario', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '50',
             ));
        $this->hasColumn('Descripcion', 'string', 500, array(
             'type' => 'string',
             'length' => '500',
             ));


        $this->index('HorarioIndex', array(
             'fields' => 
             array(
              'Horario' => 
              array(
              ),
             ),
             'type' => 'unique',
             ));
        $this->option('charset', 'latin1');
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasMany('cursomateriahorario as relhorario', array(
             'local' => 'CodigoHorario',
             'foreign' => 'CodigoHorario'));
    }
}