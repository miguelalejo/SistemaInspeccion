<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class periodoescolar extends Baseperiodoescolar
{
	public function __toString()
	{	
		$periodo = Doctrine::getTable('periodo')
		->createQuery('p')
		->where('p.codigoPeriodo = ? ',$this->getCodigoPeriodo()) 
		->execute(); 
		return sprintf('%s - Periodo: %s ', $this->getPeriodoEscolar(), $periodo[0]['Periodo']);
	}
	public function getActivePeriodosEscolaresQuery()
	{
	  $q = Doctrine_Query::create()->from('periodoescolar pe')->orderBy('pe.codigoperiodo');	 
	  return $q;
	}
	
	public function getActivePeriodosEscolares($max = 10)
	{
	  $q = $this->getActivePeriodosEscolaresQuery()->limit($max);	 
	  return $q->execute();
	}
	
	public function countActivePeriodosEscolares()
	{
	  return $this->getActivePeriodosEscolaresQuery()->count();
	}
	
	public function getPeriodo($codigoPeriodo)
	{
		$arregloPeriodo = Doctrine::getTable('periodo')
		->createQuery('p')
		->select('p.*')			   
		->where('p.codigoperiodo = ?', $codigoPeriodo)		   			   
		->execute();
		$periodo = $arregloPeriodo->getFirst();
		return $periodo->getPeriodo();
	}
}