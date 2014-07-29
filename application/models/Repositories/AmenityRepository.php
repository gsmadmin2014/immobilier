<?php
namespace Repositories;

use Doctrine\ORM\EntityRepository;

class AmenityRepository extends EntityRepository
{
	public function getAmenitiesByLibelle($libelle)
	{	
		$libelle = '%' . $libelle . '%';
		$query =  $this->_em->createQuery('SELECT a FROM Entities\Amenity a WHERE a.libelle LIKE ?1');
		$query->setParameter(1, $libelle);
		return $query->getResult();                         
	}
}
