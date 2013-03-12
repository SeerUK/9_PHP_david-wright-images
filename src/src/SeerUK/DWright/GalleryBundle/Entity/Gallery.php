<?php

namespace SeerUK\DWright\GalleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Gallery
 *
 * @ORM\Table(name="Gallery")
 * @ORM\Entity
 */
class Gallery
{
    /**
     * @ORM\Id
     * @ORM\Column(name="intGalleryId", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\Column(name="strGalleryName", type="string", length=50)
     */
    private $name;


    /**
     * @ORM\Column(name="strGalleryDesc", type="string", length=255)
     */
    private $desc;


    /**
     * @ORM\Column(name="dtmPublished", type="datetime")
     */
    private $publishedOn;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Get desc
     *
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
    }


    /**
     * Get publishedOn
     *
     * @return string
     */
    public function getPublishedOn()
    {
        return $this->publishedOn;
    }
}
