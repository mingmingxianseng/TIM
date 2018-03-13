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

class Helper
{
    static public function getGateway()
    {
        static $gateway;

        if (null === $gateway) {
            $gateway = new Gateway(include_once 'config/config.php', new NullLogger());
        }

        return $gateway;
    }
}