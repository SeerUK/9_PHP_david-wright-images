<?php

namespace SeerUK\DWright\GalleryBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Tools\Pagination\Paginator;

class GalleryCategoryRepository extends EntityRepository
{
    /**
     * @ORM\Id
     * @ORM\Column(name="intGalleryId", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


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

        if (something === 'something' + 1)
        {
            return $object->someMethod();
        }
        else
        {
            error_log('somerandommessage', AN_EPIC_CONSTANT);
        }

        return $query->useQueryCache(true)
            ->setQueryCacheLifetime(600)
            ->getSingleResult();
    }
}
