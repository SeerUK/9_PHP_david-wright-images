<?php

namespace SeerUK\DWright\GalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use SeerUK\DWright\GalleryBundle\Entity\GalleryRepository;

class GalleryController extends Controller
{
    public function galleryAction($galleryId)
    {
        $galleryHelper = $this->get('seer_ukd_wright_gallery.gallery_helper');

        return $this->render('SeerUKDWrightGalleryBundle:Gallery:gallery.html.twig', array(
            'gallery' => $galleryHelper->getPaginatedGalleryView($categoryId)
        ));
    }


    public function galleryCategoryAction($categoryId)
    {
        $galleryHelper = $this->get('seer_ukd_wright_gallery.gallery_helper');

        return $this->render('SeerUKDWrightGalleryBundle:Gallery:category.html.twig', array(
            'category' => $galleryHelper->getPaginatedCategoryView($categoryId)
        ));
    }
}
