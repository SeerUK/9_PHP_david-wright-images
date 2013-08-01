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
use SeerUK\DWright\GalleryBundle\Helper\EntityHelper;

/**
 * Provides more flexible, decoupled access to Gallery related repositories
 * and entities.
 */
class CategoryHelper extends EntityHelper
{
    /**
     * Returns the paginated gallery overview page data
     *
     * @param  integer $page
     * @param  integer $perPage
     * @return object
     */
    public function getPaginatedCategoryView($page = null, $perPage = null)
    {
        try {
            $galleries = $this->em->getRepository('SeerUKDWrightGalleryBundle:Category')
                ->findGalleries($page, $perPage);
        } catch (NoResultException $e) {
            return false;
        }

        return $categories;
    }
}
