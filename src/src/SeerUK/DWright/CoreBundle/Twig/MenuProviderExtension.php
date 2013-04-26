<?php

/*
 * This file is part of the SeerUKDwrightCoreBundle
 *
 * (c) Elliot Wright <wright.elliot@gmail.com> - 2013
 *
 * For full license information please visit
 * http://license.visualidiot.com/
 */

namespace SeerUK\DWright\CoreBundle\Twig;

use SeerUK\DWright\CoreBundle\Menu\Configuration\LoaderFactory;

/**
 * Twig Menu Provider Extension
 */
class MenuProviderExtension extends \Twig_Extension
{
    /**
     * @var LoaderInterface
     */
    private $loader;


    /**
     * Constructor
     */
    public function __construct(LoaderFactory $loaderFactory)
    {
        $this->loader = $loaderFactory->build();
    }


    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'menu_data' => new \Twig_Function_Method($this, 'getMenuData'),
        );
    }


    /**
     * @return string The name of this extension
     */
    public function getName()
    {
        return 'menuprovider_extension';
    }


    /**
     * Returns the data for the currently configured menu ...
     *
     * @param  string $key
     * @return array
     */
    public function getMenuData($key)
    {
        return $this->loader->getConfig($key);
    }
}