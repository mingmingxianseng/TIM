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

class SignTest extends TestCase
{
    public function testSign()
    {
        $gateway = Helper::getGateway();

        $signer = $gateway->getSigner();
        $sign   = $signer->genSig('chenmingming');

        var_dump($sign);
        $this->assertTrue(is_string($sign));

        $rs = $signer->verifySig($sign, 'chenmingming', $initTime, $expireTime, $error);
        $this->assertTrue($rs);
        $this->assertSame($expireTime, "15552000");
        $this->assertSame($initTime, (string)time());
    }
}