<?php

namespace SeerUK\DWright\GalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use SeerUK\DWright\GalleryBundle\Entity\GalleryRepository;

class GalleryController extends Controller
{
    public function indexaction()
    {
        return new Response('Test', 200);
    }


    public function galleryAction($galleryId)
    {
        $em = $this->getDoctrine()->getManager();

        $gallery = $em->getRepository('SeerUKDWrightGalleryBundle:Gallery')->findById($galleryId);

        return $this->render('SeerUKDWrightGalleryBundle:Gallery:gallery.html.twig', array(
            'gallery' => $gallery
        ));
    }


    /**
     * @todo Add defaults to this for pagination
     */
    public function galleryCategoryAction($categoryId)
    {
        $galleryHelper = $this->get('seer_ukd_wright_gallery.gallery_helper');

        return $this->render('SeerUKDWrightGalleryBundle:Gallery:category.html.twig', array(
            'category' => $galleryHelper->getPaginatedCategoryView($categoryId)
        ));
    }
}
