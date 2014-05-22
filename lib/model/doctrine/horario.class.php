<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class horario extends Basehorario
{
	public function __toString()
	{
		return sprintf('%s', $this->getHorario());
	}
	public function getActiveHorariosQuery()
	{
	  $q = Doctrine_Query::create()->from('horario h')->orderBy('h.codigohorario');	 
	  return $q;
	}
	public function getActiveHorarios($max = 10)
	{
	  $q = $this->getActiveHorarios()->limit($max);	 
	  return $q->execute();
	}
	 
	public function countActiveHorarios()
	{
	  return $this->getActiveHorariosQuery()->count();
	}
}