<?php

/*
 * This file is part of the SeerUKDwrightGalleryBundle
 *
 * (c) Elliot Wright <wright.elliot@gmail.com> - 2013
 *
 * For full license information please visit
 * http://license.visualidiot.com/
 */

namespace SeerUK\DWright\GalleryBundle\Helper;

use Doctrine\ORM\NoResultException;

/**
 * Provides more flexible, decoupled access to Gallery related repositories
 * and entities.
 */
class GalleryHelper
{
    /**
     * @var object
     */
    protected $em;


    /**
     * @param object $em
     */
    public function __construct($em)
    {
        $this->em = $em;
    }


    /**
     * Returns the paginated gallery overview page data
     *
     * @param  integer $page
     * @param  integer $perPage
     * @return object
     */
    public function getPaginatedHomeView($bolCache = true, $page = null, $perPage = null)
    {
        try {
            $galleries = $this->em->getRepository('SeerUKDWrightGalleryBundle:Gallery')
                ->findGalleries($bolCache, $page, $perPage);
        } catch (NoResultException $e) {
            return false;
        }

        return $galleries;
    }


    /**
     * Returns the paginated gallery view page data
     *
     * @param  integer $galleryId
     * @param  integer $page
     * @param  integer $perPage
     * @return object
     */
    public function getPaginatedGalleryView($galleryId, $bolCache = true, $page = null, $perPage = null)
    {
        $gallery = $this->em->getRepository('SeerUKDWrightGalleryBundle:Gallery')
            ->findGalleriesById($galleryId, $bolCache, $page, $perPage);

        return $gallery;
    }
}
