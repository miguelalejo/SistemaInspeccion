<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class cursoalumno extends Basecursoalumno
{
	public function getActiveCursoAlumnoQuery()
	{
	  $q = Doctrine_Query::create()->select('ca.*')->from('cursoalumno ca, curso c, periodo p')->where('ca.codigocurso=c.codigocurso and ca.codigoperiodo = p.codigoperiodo')->orderBy('p.periodo,c.curso');	 
	  return $q;
	}
	public function getActiveCursoAlumno($max = 10)
	{
	  $q = $this->getActiveCursoAlumnoQuery()->limit($max);	 
	  return $q->execute();
	}
	 
	public function countActiveCursoAlumno()
	{
	  return $this->getActiveCursosQuery()->count();
	}
	public function getNombreCompletoAlumno($codigoAlumno)
	{
		$arregloAlumno = Doctrine::getTable('alumno')
		->createQuery('a')
		->select('a.*')			   
		->where('a.codigoAlumno = ?', $codigoAlumno)		   			   
		->execute();
		$alumno = $arregloAlumno->getFirst();
		return sprintf('%s %s',$alumno->getApellido(),$alumno->getNombre());
	}
	public function getCedulaAlumno($codigoAlumno)
	{
		$arregloAlumno = Doctrine::getTable('alumno')
		->createQuery('a')
		->select('a.*')			   
		->where('a.codigoAlumno = ?', $codigoAlumno)		   			   
		->execute();
		$alumno = $arregloAlumno->getFirst();
		return sprintf('%s',$alumno->getCedula());
	}
	public function getPeriodo($codigoPeriodo)
	{
		$arregloPeriodo = Doctrine::getTable('periodo')
		->createQuery('p')
		->select('p.*')			   
		->where('p.codigoperiodo = ?', $codigoPeriodo)	
		->execute();
		return $arregloPeriodo->getFirst();
	}
	
	public function getCurso($codigoCurso)
	{
		$arregloCurso = Doctrine::getTable('curso')
		->createQuery('c')
		->select('c.*')			   
		->where('c.codigocurso = ?', $codigoCurso)	
		->execute();
		return $arregloCurso->getFirst();
	}
	public function getParalelo($codigoParalelo)
	{
		$arregloParalelo = Doctrine::getTable('paralelo')
		->createQuery('p')
		->select('p.*')			   
		->where('p.codigoparalelo= ?', $codigoParalelo)	
		->execute();
		return $arregloParalelo->getFirst();
	}

}