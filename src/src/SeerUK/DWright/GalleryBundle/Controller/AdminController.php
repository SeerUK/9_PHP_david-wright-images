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

use SeerUK\DWright\GalleryBundle\Form\Model\CreateGallery;
use SeerUK\DWright\GalleryBundle\Form\Type\CreateGalleryType;
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
        $em      = $this->getDoctrine()->getEntityManager();
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

        return $this->render('SeerUKDWrightGalleryBundle:Admin:new-gallery.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
