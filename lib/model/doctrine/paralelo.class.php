<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class paralelo extends Baseparalelo
{
	public function __toString()
	{	
		return $this->getParalelo();
	}
	public function getActiveParalelosQuery()
	{
	  $q = Doctrine_Query::create()->from('paralelo p')->orderBy('p.paralelo');	 
	  return $q;
	}
	public function getActiveParalelos($max = 10)
	{
	  $q = $this->getActiveParalelos()->limit($max);	 
	  return $q->execute();
	}
	 
	public function countActiveParalelos()
	{
	  return $this->getgetActiveParalelosQuery()->count();
	}

}