<?php

namespace SeerUK\DWright\GalleryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * Gallery
 *
 * @ORM\Table(name="GalleryCategory")
 * @ORM\Entity(repositoryClass="SeerUK\DWright\GalleryBundle\Entity\GalleryCategoryRepository")
 */
class GalleryCategory
{
    /**
     * @ORM\Id
     * @ORM\Column(name="intGalleryCategoryId", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(name="strGalleryCategoryName", type="string", length=50)
     */
    protected $name;


    /**
     * @ORM\Column(name="strGalleryCategoryDesc", type="string", length=5000)
     */
    protected $desc;


    /**
     * @ORM\OneToMany(targetEntity="Gallery", mappedBy="galleryCategory")
     */
    protected $galleries;


    public function __construct()
    {
        $this->galleries = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return GalleryCategory
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
     * @return GalleryCategory
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }


    /**
     * Add galleries
     *
     * @param \SeerUK\DWright\GalleryBundle\Entity\Gallery $galleries
     * @return GalleryCategory
     */
    public function addGallerie(\SeerUK\DWright\GalleryBundle\Entity\Gallery $galleries)
    {
        $this->galleries[] = $galleries;

        return $this;
    }


    /**
     * Remove galleries
     *
     * @param \SeerUK\DWright\GalleryBundle\Entity\Gallery $galleries
     */
    public function removeGallerie(\SeerUK\DWright\GalleryBundle\Entity\Gallery $galleries)
    {
        $this->galleries->removeElement($galleries);
    }


    /**
     * Get galleries
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGalleries()
    {
        return $this->galleries;
    }


    public function getCoverAbsolutePath()
    {
        $covers = glob($this->getUploadRootDir() . '/cover.*');

        return empty($covers)
            ? null
            : $this->getUploadRootDir() . '/' . basename($covers[0]);
    }


    public function getCoverAbsoluteThumbPath()
    {
        $covers = glob($this->getUploadRootDir() . '/cover.*');

        return empty($covers)
            ? null
            : $this->getUploadRootDir() . '/thumb/' . basename($covers[0]);
    }


    public function getCoverWebPath()
    {
        $covers = glob($this->getUploadRootDir() . '/cover.*');

        return empty($covers)
            ? null
            : $this->getUploadDir() . '/' . basename($covers[0]);
    }


    public function getCoverWebThumbPath()
    {
        $covers = glob($this->getUploadRootDir() . '/cover.*');

        return empty($covers)
            ? null
            : $this->getUploadDir() . '/thumb/' . basename($covers[0]);
    }


    protected function getUploadRootDir()
    {
        return __DIR__ . '/../../../../../web/' . $this->getUploadDir();
    }


    protected function getUploadDir()
    {
        return 'bundles/seerukdwrightgallery/upload/category/' . $this->id;
    }
}