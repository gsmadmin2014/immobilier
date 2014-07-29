<?php
namespace Repositories;

use Doctrine\ORM\EntityRepository;

class FileRepository extends EntityRepository
{
	
	public function getDefaultFile()
	{
		$sql = 'SELECT f FROM Entities\File f WHERE f.name=?1';
		$query = $this->_em->createQuery($sql);
		$query->setParameter(1, 'no-picture.jpg');
		return $query->getOneOrNullResult();
	}
}