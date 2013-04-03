<?php

/*
 * This file is part of the SeerUKDwrightGalleryBundle
 *
 * (c) Elliot Wright <wright.elliot@gmail.com> - 2013
 *
 * For full license information please visit
 * http://license.visualidiot.com/
 */

namespace SeerUK\DWright\GalleryBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Gallery Category Repository
 */
class GalleryCategoryRepository extends EntityRepository
{
    /**
     * Returns paginated category view data
     *
     * @param  [integer] $categoryId [A category ID]
     * @param  [integer] $page       [A page number]
     * @param  [integer] $perPage    [A number of items to show per page]
     * @return [object]              [Entity result set of category contents]
     */
    public function findGalleriesById($categoryId, $page, $perPage)
    {
        $query = $this->getEntityManager()
            ->createQuery(
                  'SELECT gc, g, gi
                     FROM SeerUKDWrightGalleryBundle:GalleryCategory AS gc
                LEFT JOIN gc.galleries AS g
                LEFT JOIN g.galleryImages AS gi WITH g.coverId = gi.id
                    WHERE gc.id = :categoryId'
            )->setParameter('categoryId', $categoryId);

        return $query->useResultCache(true, 600)
            ->getSingleResult();
    }
}
