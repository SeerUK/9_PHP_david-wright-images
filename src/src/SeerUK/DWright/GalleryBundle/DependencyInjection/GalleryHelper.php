<?php

namespace SeerUK\DWright\GalleryBundle\DependencyInjection;

class GalleryHelper
{
	/**
	 * @var object
	 */
	protected $em;


	public function __construct($em)
	{
		$this->em = $em;
	}


	public function getPaginatedCategoryView($categoryId, $page = null, $perPage = null)
	{
		$category = $this->em->getRepository('SeerUKDWrightGalleryBundle:GalleryCategory')
			->findGalleriesById($categoryId, $page, $perPage);

		return $category;
	}
}