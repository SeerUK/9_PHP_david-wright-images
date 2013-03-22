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
            'gallery'          => $gallery
        ));
    }


    /**
     * @todo Add pagination to this action...
     * @todo The gallery image retrieval should be placed somewhere other than
     *       in the controller.
     */
    public function galleryCategoryAction($categoryId)
    {
        $em = $this->getDoctrine()->getManager();

        $category  = $em->getRepository('SeerUKDWrightGalleryBundle:GalleryCategory')->findById($categoryId);
        $galleries = $category->getGalleries();

        $galleryImages = [ ];
        foreach ($galleries as $i => $gallery)
        {
            $galleryImages[$gallery->getId()] = $em->getRepository('SeerUKDWrightGalleryBundle:GalleryImage')
                ->findOneByGalleryId($gallery->getId());
        }

        return $this->render('SeerUKDWrightGalleryBundle:Gallery:category.html.twig', array(
            'category'      => $category,
            'galleries'     => $galleries,
            'galleryImages' => $galleryImages
        ));
    }
}
