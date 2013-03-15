<?php

namespace SeerUK\DWright\GalleryBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

class GalleryCategoryRepository extends EntityRepository
{
	public function getById($id)
	{
		$query = $this->createQueryBuilder('gc')
			->where('gc.id = :id')
			->setParameter('id', $id)
			->getQuery();

		$category = $query->useQueryCache(true)
			->setQueryCacheLifetime(600)
			->getSingleResult();

		return $category;
	}
}