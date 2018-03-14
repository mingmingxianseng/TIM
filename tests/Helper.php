<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 14:40
 */

namespace tests;

use MMXS\TIM\Gateway;
use Psr\Log\NullLogger;
use tests\Cache\ArrayCacheItemPool;

class Helper
{
    /**
     * getGateway
     *
     * @author chenmingming
     * @return Gateway
     * @throws \MMXS\TIM\TimException
     * @throws \Psr\Cache\InvalidArgumentException
     */
    static public function getGateway()
    {
        static $gateway;

        if (null === $gateway) {
            $gateway = new Gateway(include_once 'config/config.php', new NullLogger(), new ArrayCacheItemPool());
        }

        return $gateway;
    }
}