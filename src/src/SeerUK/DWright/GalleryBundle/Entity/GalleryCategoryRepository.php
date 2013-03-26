<?php

namespace SeerUK\DWright\GalleryBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Tools\Pagination\Paginator;

class GalleryCategoryRepository extends EntityRepository
{
    /**
     * Fetch galleries and gallery images for a given category
     *
     * @param  integer $categoryId
     * @param  integer $page
     * @param  integer $perPage
     * @return object
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

        return $query->useQueryCache(true)
            ->setQueryCacheLifetime(600)
            ->getSingleResult();
    }
}
