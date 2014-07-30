<?php
namespace Repositories;

use Doctrine\ORM\EntityRepository;

class MessageRepository extends EntityRepository
{
	
	public function listMessageByUser($userId)
	{
		$sql = 'SELECT m FROM Entities\Message m JOIN m.agent a WHERE a.id = ?1 AND m.deleted = 0
		 ORDER BY m.created DESC';
		$query = $this->_em->createQuery($sql);
		$query->setParameter(1, $userId);
		return $query->getResult();
	}
	
}