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

/**
 * Gallery Controller
 */
class GalleryController extends Controller
{
    /**
     * Shows a gallery category, the galleries within and the cover images
     * of said galleries.
     *
     * @param  integer $categoryId
     * @return object
     */
    public function galleryHomeAction()
    {
        $galleryHelper = $this->get('seer_ukd_wright_gallery.gallery_helper');

        // Redirect to 404 page if there isn't one ...
        if ( ! $galleries = $galleryHelper->getPaginatedHomeView()) {
            // Needs to have something for when no galleries exist instead ...
            //throw $this->createNotFoundException('That category does not exist!');

        // Show category if there is one ...
        } else {
            return $this->render('SeerUKDWrightGalleryBundle:Gallery:home.html.twig', array(
                'galleries' => $galleries
            ));
        }
    }

    /**
     * Shows a gallery, and the images within.
     *
     * @param  integer $galleryId
     * @return object
     */
    public function galleryAction($galleryId)
    {
        $galleryHelper = $this->get('seer_ukd_wright_gallery.gallery_helper');

        return $this->render('SeerUKDWrightGalleryBundle:Gallery:gallery.html.twig', array(
            'gallery' => $galleryHelper->getPaginatedGalleryView($galleryId)
        ));
    }
}
