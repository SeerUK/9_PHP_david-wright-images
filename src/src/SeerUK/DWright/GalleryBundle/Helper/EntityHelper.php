<?php

/**
 * Entity Helper
 *
 * Basic things needed for bridging entities with the controller in a
 * helpful way
 *
 * @package    DWright
 * @subpackage GalleryBundle
 */

namespace SeerUK\DWright\GalleryBundle\Helper;

use Doctrine\ORM\EntityManager;

/**
 * Entity Helper
 */
abstract class EntityHelper
{
    /**
     * @var CacheProvider
     */
    // protected $cache;


    /**
     * @var EntityManager
     */
    protected $em;


    /**
     * Constructor
     *
     * @param EntityManager $em
     * @param CacheProvider $cache
     */
    public function __construct(EntityManager $em/*, CacheProvider $cache */)
    {
        $this->em    = $em;
        // $this->cache = $cache;
    }
}
