<?php

namespace Zenstruck\RedirectBundle\Model;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
abstract class NotFound
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $fullUrl;

    /**
     * @var \DateTime
     */
    protected $timestamp;

    /**
     * @var string
     */
    protected $referer;

    /**
     * @param string      $path
     * @param string      $fullUrl
     * @param string|null $referer
     */
    public function __construct($path, $fullUrl, $referer = null, \DateTime $timestamp = null)
    {
        if (null === $timestamp) {
            $timestamp = new \DateTime('now');
        }

        $path = \trim($path);
        $path = !empty($path) ? $path : null;

        if (null !== $path) {
            $path = '/'.\ltrim(\parse_url($path, PHP_URL_PATH), '/');
        }

        $this->path = $path;
        $this->fullUrl = $fullUrl;
        $this->referer = $referer;
        $this->timestamp = $timestamp;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getFullUrl()
    {
        return $this->fullUrl;
    }

    /**
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @return string|null
     */
    public function getReferer()
    {
        return $this->referer;
    }
}
