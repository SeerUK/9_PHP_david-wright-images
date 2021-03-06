<?php

namespace SeerUK\DWright\GalleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Gallery
 *
 * @ORM\Table(name="GalleryImage")
 * @ORM\Entity
 */
class GalleryImage
{
    /**
     * @ORM\Id
     * @ORM\Column(name="intGalleryImageId", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(name="strGalleryImageName", type="string", length=50)
     */
    protected $name;


    /**
     * @ORM\Column(name="strGalleryImageDesc", type="string", length=255)
     */
    protected $desc;


    /**
     * @ORM\Column(name="intGalleryId", type="integer")
     */
    protected $galleryId;


    /**
     * @ORM\Column(name="strPath", type="string")
     */
    protected $path;


    /**
     * @ORM\Column(name="dtmPublished", type="datetime")
     */
    protected $posted;


    /**
     * @ORM\ManyToOne(targetEntity="Gallery", inversedBy="galleryImages")
     * @ORM\JoinColumn(name="intGalleryId", referencedColumnName="intGalleryId")
     */
    protected $gallery;


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
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
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
     * Get galleryId
     *
     * @return integer
     */
    public function getGalleryId()
    {
        return $this->galleryId;
    }


    /**
     * Get gallery
     *
     * @return \SeerUK\DWright\GalleryBundle\Entity\Gallery
     */
    public function getGallery()
    {
        return $this->gallery;
    }


    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir() . '/' . $this->path;
    }


    public function getAbsoluteThumbPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir() . '/thumbs/' . $this->path;
    }


    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir() . '/' . $this->path;
    }


    public function getWebThumbPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir() . '/thumbs/' . $this->path;
    }


    protected function getUploadRootDir()
    {
        return __DIR__ . '/../../../../../web/' . $this->getUploadDir();
    }


    protected function getUploadDir()
    {
        return 'bundles/seerukdwrightgallery/upload/gallery/' . $this->galleryId;
    }


    /**
     * Set name
     *
     * @param string $name
     * @return GalleryImage
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
     * @return GalleryImage
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
     * @return GalleryImage
     */
    public function setPosted($posted)
    {
        $this->posted = $posted;

        return $this;
    }


    /**
     * Set galleryId
     *
     * @param integer $galleryId
     * @return GalleryImage
     */
    public function setGalleryId($galleryId)
    {
        $this->galleryId = $galleryId;

        return $this;
    }


    /**
     * Set path
     *
     * @param string $path
     * @return GalleryImage
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }


    /**
     * Set gallery
     *
     * @param \SeerUK\DWright\GalleryBundle\Entity\Gallery $gallery
     * @return GalleryImage
     */
    public function setGallery(\SeerUK\DWright\GalleryBundle\Entity\Gallery $gallery = null)
    {
        $this->gallery = $gallery;

        return $this;
    }
}