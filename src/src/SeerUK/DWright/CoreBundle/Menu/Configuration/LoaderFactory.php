<?php

/*
 * This file is part of the SeerUKDwrightCoreBundle
 *
 * (c) Elliot Wright <wright.elliot@gmail.com> - 2013
 *
 * For full license information please visit
 * http://license.visualidiot.com/
 */

namespace SeerUK\DWright\CoreBundle\Menu\Configuration;

use Symfony\Component\Config\FileLocator;

/**
 * Menu Config Loader Factory
 */
class LoaderFactory
{
    /**
     * @var string
     */
    private $path;


    /**
     * Set config location
     *
     * @param string $path
     */
    public function __construct($path)
    {
        $this->setPath($path);
    }


    /**
     * Build config loader based on config file type
     *
     * @return object
     */
    public function build()
    {
        $extension = strtolower(pathinfo($this->path, PATHINFO_EXTENSION));
        $classMap  = array(
            'yml' => 'SeerUK\DWright\CoreBundle\Menu\Configuration\YamlLoader',
        );

        if ( ! isset($classMap[$extension])) {
            throw new \InvalidArgumentException(sprintf('The config file "%s" is not a valid config file type.', $this->getPath()));
        } else {
            // Instantiate appropriate config loader ...
            $loader = new $classMap[$extension](
                new FileLocator
            );

            // Give it the config file path ...
            $loader->setPath($this->getPath());

            // Return the configured object ...
            return $loader;
        }
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
     * Set path
     *
     * @param  string        $path
     * @return LoaderFactory
     */
    public function setPath($path)
    {
        if ( ! file_exists($path)) {
            throw new \InvalidArgumentException(sprintf('The config file "%s" does not exist.', $path));
        } else {
            $this->path = $path;
        }

        return $this;
    }
}