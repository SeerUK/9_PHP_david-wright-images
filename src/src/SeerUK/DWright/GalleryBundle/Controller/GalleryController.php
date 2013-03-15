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
        try
        {
            $gallery = $this->getDoctrine()->getManager()
                ->getRepository('SeerUKDWrightGalleryBundle:Gallery')
                ->getById($galleryId);

            $galleryId          = $gallery->getId();
            $galleryName        = $gallery->getName();
            $galleryDesc        = $gallery->getDesc();
            $galleryPublishedOn = $gallery->getPublishedOn();

            return $this->render('SeerUKDWrightGalleryBundle:Gallery:gallery.html.twig', array(
                'galleryId'          => $galleryId,
                'galleryName'        => $galleryName,
                'galleryDesc'        => $galleryDesc,
                'galleryPublishedOn' => $galleryPublishedOn->format('Y-m-d H:i:s'),
            ));
        }
        catch (\Doctrine\ORM\NoResultException $e)
        {
            return new Response($e->getMessage(), 404);
        }
        catch (\Doctrine\ORM\NonUniqueResultException $e)
        {
            return new Response($e->getMessage(), 400);
        }
        catch (\Exception $e)
        {
            return new Response($e->getMessage(), 500);
        }
    }


    public function galleryCategoryAction($categoryId)
    {
        try
        {
            $category = $this->getDoctrine()->getManager()
                ->getRepository('SeerUKDWrightGalleryBundle:GalleryCategory')
                ->getById($categoryId);

            $categoryId   = $category->getId();
            $categoryName = $category->getName();
            $categoryDesc = $category->getDesc();

            $galleries = $this->getDoctrine()->getManager()
                ->getRepository('SeerUKDWrightGalleryBundle:Gallery')
                ->getByCategoryId($categoryId);

            return $this->render('SeerUKDWrightGalleryBundle:Gallery:category.html.twig', array(
                'categoryId'   => $categoryId,
                'categoryName' => $categoryName,
                'categoryDesc' => $categoryDesc,
                'galleries'    => $galleries
            ));
        }
        catch (\Doctrine\ORM\NoResultException $e)
        {
            return new Response($e->getMessage(), 404);
        }
        catch (\Doctrine\ORM\NonUniqueResultException $e)
        {
            return new Response($e->getMessage(), 400);
        }
        catch (\Exception $e)
        {
            return new Response($e->getMessage(), 500);
        }
    }
}
