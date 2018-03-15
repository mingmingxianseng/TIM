<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/14
 * Time: 17:32
 */

namespace tests\Cache;

use Psr\Cache\CacheItemInterface;

class ArrayCacheItem implements CacheItemInterface
{
    private $key;
    private $value;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function get()
    {
        return $this->value;
    }

    public function isHit()
    {
        return false;
    }

    public function set($value)
    {
        $this->value = $value;

        return $this;
    }

    public function expiresAt($expiration)
    {

    }

    public function expiresAfter($time)
    {
    }

}