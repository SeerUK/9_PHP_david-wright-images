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
            $em = $this->getDoctrine()->getManager();

            $gallery = $em->getRepository('SeerUKDWrightGalleryBundle:Gallery')->findById($galleryId);

            return $this->render('SeerUKDWrightGalleryBundle:Gallery:gallery.html.twig', array(
                'gallery'          => $gallery
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


    /**
     * @todo Add pagination to this action...
     * @todo The gallery image retrieval should be placed somewhere other than
     *       in the controller.
     */
    public function galleryCategoryAction($categoryId)
    {
        try
        {
            $em = $this->getDoctrine()->getManager();

            $category  = $em->getRepository('SeerUKDWrightGalleryBundle:GalleryCategory')->findById($categoryId);
            $galleries = $em->getRepository('SeerUKDWrightGalleryBundle:Gallery')->findByCategoryId($categoryId);

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
