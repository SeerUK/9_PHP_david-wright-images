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

/**
 * Menu Configuration Loader Interface
 */
interface LoaderInterface
{
    public function load($file, $type = null);
    public function supports($resource, $type = null);
}