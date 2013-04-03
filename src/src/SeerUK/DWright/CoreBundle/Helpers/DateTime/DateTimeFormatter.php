<?php

/*
 * This file is part of the SeerUKDwrightCoreBundle
 *
 * (c) Elliot Wright <wright.elliot@gmail.com> - 2013
 *
 * For full license information please visit
 * http://license.visualidiot.com/
 */

namespace SeerUK\DWright\CoreBundle\Helpers\DateTime;

use SeerUK\DWright\CoreBundle\Exception\InvalidDateTimeException;

/**
 * Date & time formatter
 */
class DateTimeFormatter
{
    /**
     * Returns the relative time of a timestamp from now.
     *
     * @param  integer $timestamp A timestamp
     * @return string             A formatted time string
     */
    public function formatRelative($timestamp)
    {
        $timestamp = $this->getTimestamp($timestamp);

        $difference = time() - $timestamp;
        $periods    = ['second', 'minute', 'hour', 'day', 'week', 'month', 'year', 'decade'];
        $lengths    = ['60', '60', '24', '7', '4.35', '12', '10'];

        if ($difference > 0) {
            $timeSuffix = 'ago';
        } else {
            $difference = -$difference;
            $timeSuffix = 'to go';
        }

        for ($i = 0; $difference >= $lengths[$i]; $i++) {
            $difference/= $lengths[$i];
            $difference = round($difference);
        }

        if ($difference != 1) {
            $periods[$i].= 's';
        }

        return $difference . ' ' . $periods[$i] . ' ' . $timeSuffix;
    }

    /**
     * Checks to see if the given value is a valid unix timestamp.
     *
     * @param  integer $timestamp A timestamp
     * @return boolean            True if valid
     */
    public function isValidTimeStamp($timestamp)
    {
        return ((string) (int) $timestamp === $timestamp)
            && ($timestamp <= PHP_INT_MAX)
            && ($timestamp >= ~PHP_INT_MAX);
    }

    /**
     * Attempts to convert a date / time to a timestamp
     *
     * @param  string  $datetime A date / time to convert
     * @return integer           The timestamp, or false on failure
     * @throws InvalidDateTimeStringException
     */
    public function getTimestamp($dateTimeString)
    {
        // Don't waste CPU cycles if we can already get the timestamp:
        if ($dateTimeString instanceof \DateTime) {
            return $dateTimeString->getTimestamp();
        }

        // Don't waste CPU cycles if the value is already a timestamp:
        if ($this->isValidTimeStamp($dateTimeString)) {
            return $dateTimeString;
        }

        try {
            $dateTime = new \DateTime($dateTimeString);

            return $dateTime->getTimestamp();
        } catch (\Exception $e) {
            throw $this->createInvalidDateTimeException(
                __METHOD__ . ' couldn\'t convert the given value to a unix timestamp.'
            );
        }
    }

    /**
     * Creates a new createInvalidDateTimeException
     *
     * @param  string $message A message to store with the exception
     * @return object          The exception object
     */
    public function createInvalidDateTimeException($message)
    {
        return new InvalidDateTimeException($message);
    }
}
