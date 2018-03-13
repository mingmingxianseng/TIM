<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/3/13
 * Time: 13:23
 */

namespace tests;

use MMXS\TIM\TLS\TLSSig;
use PHPUnit\Framework\TestCase;

class TestSign extends TestCase
{
    public function testSign()
    {
        $config = require_once "config/config.php";
        $signer = new TLSSig($config['app_id'], $config['private_key'], $config['public_key']);

        $sign = $signer->genSig('chenmingming');

        var_dump($sign);
        $this->assertTrue(is_string($sign));

        $rs = $signer->verifySig($sign, 'chenmingming', $initTime, $expireTime, $error);
        $this->assertTrue($rs);
        $this->assertSame($expireTime, "15552000");
        $this->assertSame($initTime, (string)time());
    }
}