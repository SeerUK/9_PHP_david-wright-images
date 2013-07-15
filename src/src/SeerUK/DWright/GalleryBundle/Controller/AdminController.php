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

use SeerUK\DWright\GalleryBundle\Entity\Gallery;
use SeerUK\DWright\GalleryBundle\Form\Model\CreateGallery;
use SeerUK\DWright\GalleryBundle\Form\Type\CreateGalleryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Gallery Admin Controller
 */
class AdminController extends Controller
{
    /**
     * Gallery Admin Home
     */
    public function adminHomeAction()
    {
        $galleryHelper = $this->get('seer_ukd_wright_gallery.gallery_helper');

        return $this->render('SeerUKDWrightGalleryBundle:Admin:home.html.twig', array(
            'galleries' => $galleryHelper->getPaginatedHomeView(false)
        ));
    }


    /**
     * Action for creating a gallery ...
     */
    public function newGalleryAction()
    {
        $em      = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $form    = $this->createForm(
            new CreateGalleryType(),
            new CreateGallery()
        );

        if ($request->getMethod() == 'POST') {
            $form->bind($this->getRequest());

            if ($form->isValid()) {
                $gallery = $form->getData()
                    ->getGallery();

                $em->persist($gallery);
                $em->flush();

                return new Response('Gallery ' . $gallery->getName() . ' successfully created.');
            }
        }

        return $this->render('SeerUKDWrightGalleryBundle:Admin:Portfolio/new_gallery.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * Action for deleting a gallery ...
     */
    public function deleteGalleryAction(Gallery $gallery)
    {
        if ( ! $gallery) {
            throw $this->createNotFoundException('That gallery doesn\'t exist.');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($gallery);
        $em->flush();

        return new Response('Gallery ' . $gallery->getName() . ' successfully deleted.');
    }
}
