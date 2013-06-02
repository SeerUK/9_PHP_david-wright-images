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
 * Gallery Admin Controller
 */
class AdminController extends Controller
{
    public function adminHomeAction()
    {
        $galleryHelper = $this->get('seer_ukd_wright_gallery.gallery_helper');

        return $this->render('SeerUKDWrightGalleryBundle:Admin:home.html.twig', array(
            'galleries' => $galleryHelper->getPaginatedHomeView()
        ));
    }


    public function newGalleryAction()
    {
        return new Response('test');
    }
}
