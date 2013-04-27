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

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Config\Loader\FileLoader;
use SeerUK\DWright\CoreBundle\Menu\Configuration\LoaderInterface;

/**
 * Menu Yaml Configuration Loader
 */
class YamlLoader extends FileLoader implements LoaderInterface
{
    /**
     * @var FileLocator
     */
    protected $locator;


    /**
     * @var array
     */
    private $config;


    /**
     * @var string
     */
    private $path;


    /**
     * Get config
     *
     * @return array
     */
    public function getConfig($key = null)
    {
        if ( ! isset($this->config) || ! is_array($this->config)) {
            $this->config = $this->load($this->getPath());
        }

        // If there is no key set ...
        if ( ! isset($key)) {
            return $this->config;

        // If key is set, but the key doesn't exist in the configuration:
        } elseif ( ! isset($this->config[$key])) {
            throw new \InvalidArgumentException(sprintf(
                'The menu config key "%s" must exist in "%s".',
                $key,
                $this->getPath()
            ));

        // If there is a key set, and it exists ...
        } else {
            return $this->config[$key];
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
        $this->path = $path;

        return $this;
    }


    /**
     * Loads a YAML File
     *
     * @param  string $file
     * @param  string $type
     * @return array
     */
    public function load($file, $type = null)
    {
        $path   = $this->locator->locate($file);
        $config = Yaml::parse($path);

        // If file is empty ...
        if (null === $config) {
            $config = array();
        }

        // If it's not an array ...
        if ( ! is_array($config)) {
            throw new \InvalidArgumentException(sprintf('The file "%s" must contain a YAML array.', $file));
        }

        return $config;
    }

    /**
     * Returns true if this class supports the given resource.
     *
     * @param  mixed   $resource
     * @param  string  $type
     * @return boolean
     */
    public function supports($resource, $type = null)
    {
        return is_string($resource) && 'yml' === pathinfo($resource, PATHINFO_EXTENSION)
            && ( ! $type || 'yaml' === $type);
    }
}