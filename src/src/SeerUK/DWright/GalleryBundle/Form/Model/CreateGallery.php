<?php

/*
 * This file is part of the SeerUKDwrightGalleryBundle
 *
 * (c) Elliot Wright <wright.elliot@gmail.com> - 2013
 *
 * For full license information please visit
 * http://license.visualidiot.com/
 */

namespace SeerUK\DWright\GalleryBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;
use SeerUK\DWright\GalleryBundle\Entity\Gallery;

/**
 * Create Gallery Model
 */
class CreateGallery
{
    /**
     * @Assert\Type(type="SeerUK\DWright\GalleryBundle\Entity\Gallery")
     * @Assert\Valid()
     */
    protected $gallery;


    /**
     * Gets gallery ...
     *
     * @return Gallery
     */
    public function getGallery()
    {
        return $this->gallery;
    }


    /**
     * Sets gallery ...
     *
     * @param Gallery $gallery
     */
    public function setGallery(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }
}