<?php

namespace SeerUK\DWright\GalleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Gallery
 *
 * @ORM\Table(name="Gallery")
 * @ORM\Entity(repositoryClass="SeerUK\DWright\GalleryBundle\Entity\GalleryRepository")
 */
class Gallery
{
    /**
     * @ORM\Id
     * @ORM\Column(name="intGalleryId", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(name="strGalleryName", type="string", length=50)
     */
    protected $name;


    /**
     * @ORM\Column(name="strGalleryDesc", type="string", length=255)
     */
    protected $desc;


    /**
     * @ORM\Column(name="dtmPublished", type="datetime")
     */
    protected $posted;


    /**
     * @ORM\Column(name="intGalleryCategoryId", type="integer")
     */
    protected $categoryId;


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
     * Get categoryId
     *
     * @return string
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }


    /**
     * Get publishedOn
     *
     * @return string
     */
    public function getPosted()
    {
        return $this->posted;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Gallery
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set desc
     *
     * @param string $desc
     * @return Gallery
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Set publishedOn
     *
     * @param \DateTime $publishedOn
     * @return Gallery
     */
    public function setPublishedOn($publishedOn)
    {
        $this->publishedOn = $publishedOn;

        return $this;
    }

    /**
     * Set categoryId
     *
     * @param integer $categoryId
     * @return Gallery
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Set posted
     *
     * @param \DateTime $posted
     * @return Gallery
     */
    public function setPosted($posted)
    {
        $this->posted = $posted;

        return $this;
    }
}