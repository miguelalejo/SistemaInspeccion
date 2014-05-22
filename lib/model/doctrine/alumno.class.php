<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class alumno extends Basealumno
{
	public function __toString()
	{	
		return sprintf('%s %s - CI: %s ', $this->getApellido(), $this->getNombre(),$this->getCedula());
	}	
	public function getActiveAlumnosQuery()
	{
	  $q = Doctrine_Query::create()->from('alumno a')->orderBy('a.apellido,a.nombre');	 
	  return $q;
	}
	public function getActiveAlumnos($max = 10)
	{
	  $q = $this->getActiveAlumnosQuery()->limit($max);	 
	  return $q->execute();
	}
	 
	public function countActiveAlumnos()
	{
	  return $this->getActiveAlumnosQuery()->count();
	}
}