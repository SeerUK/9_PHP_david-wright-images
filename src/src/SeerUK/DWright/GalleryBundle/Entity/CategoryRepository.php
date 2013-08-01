<?php

/**
 * Category Repository
 *
 * Acts as a gateway and storage for categories
 *
 * @package    DWright
 * @subpackage GalleryBundle
 */

namespace SeerUK\DWright\GalleryBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * Category Repository
 */
class CategoryRepository extends EntityRepository
{
    /**
     * Returns paginated category view data for the given category
     *
     * @param  integer $categoryId
     * @param  integer $limit
     * @param  integer $offset
     * @return object
     */
    public function findCategoryById($categoryId, $limit, $offset)
    {
        $query = $this->getEntityManager()
            ->createQuery('
                SELECT
                    c
                FROM
                    SeerUKDWrightGalleryBundle:Category AS c
                WHERE
                    c.id = :categoryId
            ')->setParameter('categoryId', $categoryId);

        return $query->getSingleResult();
    }


    /**
     * Returns paginated category view data
     *
     * @param  integer $limit
     * @param  integer $offset
     * @return object
     */
    public function findCategories($limit, $offset)
    {
        $query = $this->getEntityManager()
            ->createQuery('
                SELECT
                    c
                FROM
                    SeerUKDWrightGalleryBundle:Category AS c
            ');

        return $query->getResult();
    }
}
