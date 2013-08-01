<?php

/**
 * Gallery Entity
 *
 * Acts as a container for a single gallery
 *
 * @package    DWright
 * @subpackage GalleryBundle
 */

namespace SeerUK\DWright\GalleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Gallery
 *
 * @ORM\Table(name="Gallery")
 * @ORM\Entity(repositoryClass="SeerUK\DWright\GalleryBundle\Entity\GalleryRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @Assert\NotBlank()
     * @ORM\Column(name="strGalleryName", type="string", length=50)
     */
    protected $name;


    /**
     * @Assert\NotBlank()
     * @ORM\Column(name="strGalleryDesc", type="string", length=5000)
     */
    protected $desc;


    /**
     * @ORM\Column(name="dtmPublished", type="datetime")
     */
    protected $posted;


    /**
     * @ORM\OneToMany(targetEntity="GalleryImage", mappedBy="gallery")
     */
    protected $galleryImages;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->galleryImages = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Get posted
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
     * Set posted
     *
     * @param \DateTime $posted
     * @return Gallery
     */
    public function setPosted(\DateTime $posted)
    {
        $this->posted = $posted;

        return $this;
    }


    /**
     * @ORM\PrePersist
     */
    public function setPostedOnCreation()
    {
        $this->posted = new \DateTime();

        return $this;
    }


    /**
     * Add galleryImages
     *
     * @param \SeerUK\DWright\GalleryBundle\Entity\GalleryImage $galleryImages
     * @return Gallery
     */
    public function addGalleryImage(\SeerUK\DWright\GalleryBundle\Entity\GalleryImage $galleryImages)
    {
        $this->galleryImages[] = $galleryImages;

        return $this;
    }


    /**
     * Remove galleryImages
     *
     * @param \SeerUK\DWright\GalleryBundle\Entity\GalleryImage $galleryImages
     */
    public function removeGalleryImage(\SeerUK\DWright\GalleryBundle\Entity\GalleryImage $galleryImages)
    {
        $this->galleryImages->removeElement($galleryImages);
    }


    /**
     * Get galleryImages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGalleryImages()
    {
        return $this->galleryImages;
    }
}