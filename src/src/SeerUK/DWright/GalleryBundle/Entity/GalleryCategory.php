<?php

namespace SeerUK\DWright\GalleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Gallery
 *
 * @ORM\Table(name="GalleryCategory")
 * @ORM\Entity
 */
class GalleryCategory
{
    /**
     * @ORM\Id
     * @ORM\Column(name="intGalleryCategoryId", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\Column(name="strGalleryCategoryName", type="string", length=50)
     */
    private $name;


    /**
     * @ORM\Column(name="strGalleryCategoryDesc", type="string", length=255)
     */
    private $desc;


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
}
