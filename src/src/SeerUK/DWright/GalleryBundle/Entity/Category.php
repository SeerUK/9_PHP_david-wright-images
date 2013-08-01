<?php

/**
 * Category Entity
 *
 * Acts as a container for a single category
 *
 * @package    DWright
 * @subpackage GalleryBundle
 */

namespace SeerUK\DWright\GalleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Category
 *
 * @ORM\Table(name="Category")
 * @ORM\Entity(repositoryClass="SeerUK\DWright\GalleryBundle\Entity\CategoryRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\Column(name="intCategoryId", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @Assert\NotBlank()
     * @ORM\Column(name="strCategoryName", type="string", length=50)
     */
    protected $name;


    /**
     * @ORM\Column(name="bolIsActive", type="boolean")
     */
    protected $isActive;


    /**
     * @ORM\Column(name="stmTimestamp", type="timestamp")
     */
    protected $modified;


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
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }


    /**
     * Gets modified
     *
     * @return timestamp
     */
    public function getModified()
    {
        return $this->modified;
    }


    /**
     * Set name
     *
     * @param  string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * Set isActive
     *
     * @param  boolean $isActive
     * @return Category
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }
}
