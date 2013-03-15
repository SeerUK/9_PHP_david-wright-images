<?php

namespace SeerUK\DWright\GalleryBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

class GalleryRepository extends EntityRepository
{
	public function getById($id)
	{
		$query = $this->createQueryBuilder('g')
			->where('g.id = :id')
			->setParameter('id', $id)
			->getQuery();

		$gallery = $query->useQueryCache(true)
			->setQueryCacheLifetime(600)
			->getSingleResult();

		return $gallery;
	}

	public function getByCategoryId($categoryId)
	{
		$query = $this->createQueryBuilder('g')
			->where('g.categoryId = :categoryId')
			->setParameter('categoryId', $categoryId)
			->getQuery();

		$galleries = $query->useQueryCache(true)
			->setQueryCacheLifetime(600)
			->getResult();

		return $galleries;
	}
}