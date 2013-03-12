<?php

namespace SeerUK\DWright\GalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use SeerUK\DWright\GalleryBundle\Entity\Gallery;
use SeerUK\DWright\GalleryBundle\Entity\GalleryImage;


class GalleryController extends Controller
{
    public function indexaction()
    {
        $galleries = $this->getDoctrine()
                ->getRepository('SeerUKDWrightGalleryBundle:Gallery')
                ->findAll();

        var_dump($galleries);

        return new Response('Test', 200);
    }

    public function galleryAction($galleryId)
    {
        try
        {
            $gallery = $this->getDoctrine()
                ->getRepository('SeerUKDWrightGalleryBundle:Gallery')
                ->find($galleryId);

            if (!$gallery) {
                throw $this->createNotFoundException('No gallery found for id ' . $galleryId);
            }

            $galleryId          = $gallery->getId();
            $galleryName        = $gallery->getName();
            $galleryDesc        = $gallery->getDesc();
            $galleryPublishedOn = $gallery->getPublishedOn();

            return $this->render('SeerUKDWrightGalleryBundle:Gallery:index.html.twig', array(
                'galleryId'          => $galleryId,
                'galleryName'        => $galleryName,
                'galleryDesc'        => $galleryDesc,
                'galleryPublishedOn' => $galleryPublishedOn->format('Y-m-d H:i:s'),
            ));
        }
        catch (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e)
        {
            return new Response($e->getMessage(), 404);
        }
    }
}
