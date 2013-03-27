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

use SeerUK\DWright\CoreBundle\Helpers\DateTime\DateTimeFormatter;

/**
 * Date & time formatter Twig extension
 */
class DateTimeFormatterExtension extends \Twig_Extension
{
    /**
     * @var object
     */
    protected $dateTimeFormatter;


    /**
     * Constructor
     */
    public function __construct(\SeerUK\DWright\CoreBundle\Helpers\DateTime\DateTimeFormatter $dateTimeFormatter)
    {
        $this->dateTimeFormatter = $dateTimeFormatter;
    }

    /**
     * @return array An array of filters within this extension
     */
    public function getFilters()
    {
        return array(
            'relativeDateTime' => new \Twig_Filter_Method($this, 'relativeFormat'),
        );
    }

    /**
     * @return string The name of this extension
     */
    public function getName()
    {
        return 'datetimeformatter_extension';
    }

    /**
     * Returns the relative time of a timestamp from now.
     *
     * @param  integer $timestamp A timestamp
     * @return string             A formatted time string
     *
     * @todo   Create date time formatter service!
     */
    public function relativeFormat($timestamp)
    {
        return $this->dateTimeFormatter->formatRelative($timestamp);
    }
}