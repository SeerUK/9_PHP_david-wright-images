<?php

/*
 * This file is part of the SeerUKDwrightGalleryBundle
 *
 * (c) Elliot Wright <wright.elliot@gmail.com> - 2013
 *
 * For full license information please visit
 * http://license.visualidiot.com/
 */

namespace SeerUK\DWright\GalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use SeerUK\DWright\GalleryBundle\Entity\GalleryRepository;

/**
 * Gallery Controller
 */
class GalleryController extends Controller
{
    /**
     * Shows a gallery, and the images within.
     *
     * @param  [integer] $galleryId [A gallery ID]
     * @return [object]             [Template data]
     */
    public function galleryAction($galleryId)
    {
        $galleryHelper = $this->get('seer_ukd_wright_gallery.gallery_helper');

        return $this->render('SeerUKDWrightGalleryBundle:Gallery:gallery.html.twig', array(
            'gallery' => $galleryHelper->getPaginatedGalleryView($galleryId)
        ));
    }


    /**
     * Shows a gallery category, the galleries within and the cover images
     * of said galleries.
     *
     * @param  [integer] $categoryId [A category ID]
     * @return [object]             [Template data]
     */
    public function galleryCategoryAction($categoryId)
    {
        $galleryHelper = $this->get('seer_ukd_wright_gallery.gallery_helper');

        // Redirect to 404 page if there isn't one ...
        if ( ! $category = $galleryHelper->getPaginatedCategoryView($categoryId)) {
            $response = $this->forward('', array());

        // Show category if there is one ...
        } else {
            $response = $this->render('SeerUKDWrightGalleryBundle:Gallery:category.html.twig', array(
                'category' => $category
            ));
        }

        return $response;
    }
}
