<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class Basetipofalta extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tipofalta');
        $this->hasColumn('CodigoTipoFalta', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('Falta', 'string', 30, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '30',
             ));
        $this->hasColumn('Descripcion', 'string', 500, array(
             'type' => 'string',
             'length' => '500',
             ));


        $this->index('FaltaIndex', array(
             'fields' => 
             array(
              'Falta' => 
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
    $this->hasMany('falta as reltipofalta', array(
             'local' => 'CodigoTipoFalta',
             'foreign' => 'CodigoTipoFalta'));
    }
}