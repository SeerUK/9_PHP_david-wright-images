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


    public function getPaginatedHomeView($page = null, $perPage = null)
    {
        try {
            $galleries = $this->em->getRepository('SeerUKDWrightGalleryBundle:Gallery')
                ->findGalleries($page, $perPage);
        } catch (NoResultException $e) {
            return false;
        }

        return $galleries;
    }


    /**
     * Returns a paginated category view page
     *
     * @param  integer $categoryId
     * @param  integer $page
     * @param  integer $perPage
     * @return object
     */
    public function getPaginatedCategoryView($categoryId, $page = null, $perPage = null)
    {
        try {
            $category = $this->em->getRepository('SeerUKDWrightGalleryBundle:GalleryCategory')
                ->findGalleriesById($categoryId, $page, $perPage);
        } catch (NoResultException $e) {
            return false;
        }

        return $category;
    }


    /**
     * Returns a paginated gallery view page
     *
     * @param  integer $galleryId
     * @param  integer $page
     * @param  integer $perPage
     * @return object
     */
    public function getPaginatedGalleryView($galleryId, $page = null, $perPage = null)
    {
        $gallery = $this->em->getRepository('SeerUKDWrightGalleryBundle:Gallery')
            ->findGalleriesById($galleryId, $page, $perPage);

        return $gallery;
    }
}