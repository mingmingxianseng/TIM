<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/14
 * Time: 17:31
 */

namespace tests\Cache;

use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;

class ArrayCacheItemPool implements CacheItemPoolInterface
{
    public function getItem($key)
    {
        return new ArrayCacheItem($key);
    }

    public function getItems(array $keys = array())
    {
        // TODO: Implement getItems() method.
    }

    public function hasItem($key)
    {
        // TODO: Implement hasItem() method.
    }

    public function clear()
    {
        // TODO: Implement clear() method.
    }

    public function deleteItem($key)
    {
        // TODO: Implement deleteItem() method.
    }

    public function deleteItems(array $keys)
    {
        // TODO: Implement deleteItems() method.
    }

    public function save(CacheItemInterface $item)
    {
    }

    public function saveDeferred(CacheItemInterface $item)
    {
    }

    public function commit()
    {
    }

}