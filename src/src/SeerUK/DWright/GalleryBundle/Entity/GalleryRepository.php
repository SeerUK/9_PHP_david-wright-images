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
use SeerUK\DWright\GalleryBundle\Entity\GalleryImage;

/**
 * Gallery Repository
 */
class GalleryRepository extends EntityRepository
{
    /**
     * Returns paginated gallery view data
     *
     * @param  [integer] $galleryId [A gallery ID]
     * @param  [integer] $page      [A page number]
     * @param  [integer] $perPage   [A number of items to show per page]
     * @return [object]             [Entity result set of gallery contents]
     */
    public function findGalleriesById($galleryId, $page, $perPage)
    {
        $query = $this->getEntityManager()
            ->createQuery(
                  'SELECT g, gi
                     FROM SeerUKDWrightGalleryBundle:Gallery AS g
                LEFT JOIN g.galleryImages AS gi
                    WHERE g.id = :galleryId'
            )->setParameter('galleryId', $galleryId);

        return $query->useResultCache(true, 600)
            ->getSingleResult();
    }

    public function findGalleries($page, $perPage)
    {
        $query = $this->getEntityManager()
            ->createQuery(
                  'SELECT g, gi
                     FROM SeerUKDWrightGalleryBundle:Gallery AS g
                LEFT JOIN g.galleryImages AS gi'
            );

        return $query->useResultCache(true, 600)
            ->getResult();
    }
}