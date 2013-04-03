<?php

/*
 * This file is part of the SeerUKDwrightGalleryBundle
 *
 * (c) Elliot Wright <wright.elliot@gmail.com> - 2013
 *
 * For full license information please visit
 * http://license.visualidiot.com/
 */

namespace SeerUK\DWright\GalleryBundle\DependencyInjection;

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
     * @param [object] $em [An entity manager]
     */
    public function __construct($em)
    {
        $this->em = $em;
    }


    /**
     * Returns a paginated category view page
     *
     * @param  [integer] $categoryId [A category ID]
     * @param  [integer] $page       [A page number]
     * @param  [integer] $perPage    [A number of items to show per page]
     * @return [object]              [Entity result set of category contents]
     */
    public function getPaginatedCategoryView($categoryId, $page = null, $perPage = null)
    {
        $category = $this->em->getRepository('SeerUKDWrightGalleryBundle:GalleryCategory')
            ->findGalleriesById($categoryId, $page, $perPage);

        return $category;
    }


    /**
     * Returns a paginated gallery view page
     *
     * @param  [integer] $galleryId [A gallery ID]
     * @param  [integer] $page      [A page number]
     * @param  [integer] $perPage   [A number of items to show per page]
     * @return [object]             [Entity result set of gallery contents]
     */
    public function getPaginatedGalleryView($galleryId, $page = null, $perPage = null)
    {
        $gallery = $this->em->getRepository('SeerUKDWrightGalleryBundle:Gallery')
            ->findGalleriesById($galleryId, $page, $perPage);

        return $gallery;
    }
}